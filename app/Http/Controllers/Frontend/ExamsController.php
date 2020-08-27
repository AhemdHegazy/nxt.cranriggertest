<?php

namespace App\Http\Controllers\Frontend;

use App\Answer;
use App\Grade;
use App\Guideline;
use App\Http\Controllers\Controller;
use App\Option;
use App\Order;
use App\Payment;
use PDF;
use Carbon\Carbon;
use DB;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class ExamsController extends Controller
{
    public function start($orderId){
        $order = Order::find($orderId);
        $guidelines = Guideline::all();
        return view('frontend.assessment.exam-info',compact('order','guidelines'));
    }

    public function begin($orderId){
        $order = Order::find($orderId);
        date_default_timezone_set('Europe/London');
        $products = Question::where('subject_id',$order->package->subject_id)->with(['options' => function ($q) {
            $q->inRandomOrder();
        }])->limit($order->package->questions)->inRandomOrder()->get();
        $collection = collect($products);
        // $collection->forPage($_GET['page'], 5)
        $payment = Payment::where(['order_id' => $order->id,'user_id' => auth()->user()->id])->get()->first();
        if($payment->start_date == null){
            $payment->start_date = Carbon::now()->addMinutes($order->hours+59);
            $payment->save();
        }

        $questions = $this->paginate($collection);
        return view('frontend.assessment.questions',compact('questions','payment','order'));
    }

    public function store(Request $request){

        $questions = Question::all();
        $order = Order::find($request->order_id);
        $payment = Payment::find($request->payment_id);

        if($payment->status == 0){
            $payment->status = 1;
            $payment->save();
        }
        if($order->status == 1){
            $order->status = 2;
            $order->save();
        }

        foreach ($questions as $mcq):
            if($request->input($mcq->id)) {
                $count = Answer::where([
                    'question_id' => $mcq->id,
                    'value' => Option::find($request->input($mcq->id))->true,
                    'user_id' => $request->user_id,
                    'payment_id' => $request->payment_id,
                    'order_id' => $request->order_id,
                    'option_id' => $request->input($mcq->id),
                ])->count();
                if ($count == 0) {
                    Answer::create([
                        'question_id' => $mcq->id,
                        'value' => Option::find($request->input($mcq->id))->true,
                        'user_id' => $request->user_id,
                        'payment_id' => $request->payment_id,
                        'order_id' => $request->order_id,
                        'option_id' => $request->input($mcq->id),
                    ]);
                }
            }
        endforeach;
        if($request->has('nextpage')) {
            return redirect($request->nextpage);
        }else{


            return redirect(route('exam.grades',$request->payment_id));
        }
    }
    public function grades($paymentId){
        $payment = Payment::find($paymentId);
        $order = Order::find($payment->order_id);

       $answers = Answer::where([
          'user_id' => $payment->user_id,
          'order_id' => $payment->order_id,
           'value'   => 1
       ])->get();
       $grade = number_format(($answers->count()/$order->package->questions)*100,0);

        $InsertedGrade = Grade::where([
           'order_id'       =>$order->id,
           'payment_id'     =>$paymentId,
           'user_id'        =>auth()->user()->id,
       ])->get()->first();

       if($InsertedGrade == null){
           $InsertedGrade = Grade::create([
               'order_id'       =>$order->id,
               'payment_id'     =>$paymentId,
               'user_id'        =>auth()->user()->id,
               'percentage'     =>$grade
           ]);
       }
       return view('frontend.assessment.grade',compact('InsertedGrade','paymentId'));
    }
    public function paginate($items, $perPage = 1, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function certification($paymentId){
        $grade = Grade::where('payment_id',$paymentId)->first();

        $data=[
            'grade'    => $grade
        ];

        $pdf = PDF::loadView('frontend.certifications.index',$data);
        $pdf->autoScriptToLang = true;
        $pdf->baseScript = 1;
        $pdf->autoVietnamese = true;
        $pdf->autoArabic = true;
        $pdf->autoLangToFont = true;
        $pdf->img_dpi = 96;
        $pdf->showImageErrors = true;
        return $pdf->stream('certifications.pdf');
    }
}
