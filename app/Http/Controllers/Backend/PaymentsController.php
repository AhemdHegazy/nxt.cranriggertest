<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Order;
use App\Package;
use App\Subject;
use DB;
use App\Payment;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    public function queryGet(){
        return view('admin.payments.index');
    }

    public function queryPost(Request $request){

        if($request->subject_id > 0){
            $packages = Package::where('subject_id',$request->subject_id)->pluck('id')->toArray();
            $orders = Order::whereIn('package_id',$packages)->pluck('id')->toArray();
            if($orders != null){
                $payments = Payment::whereIn('order_id',$orders)
                    ->whereMonth('created_at',$request->month)
                    ->whereYear('created_at',$request->year)->get();


            }
        }else{
            $payments = Payment::whereMonth('created_at',$request->month)
                ->whereYear('created_at',$request->year)->get();
        }
        $sum = $payments->sum('amount');
        $months = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July ',
            'August',
            'September',
            'October',
            'November',
            'December',
        ];
        $month = $months[$request->month-1];

        $year = $request->year;
        $mySub = Subject::find($request->subject_id) ? Subject::find($request->subject_id)->name : 'All Subject';

        return view('admin.payments.index',compact('payments','sum','month','year','mySub'));
    }
}
