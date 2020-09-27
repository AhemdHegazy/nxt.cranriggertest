<?php

namespace App\Http\Controllers\Backend;

use App\Capacity;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HelperController;
use App\Option;
use App\Question;
use App\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class QuestionsController extends Controller
{
    public function index()
    {
        if(HelperController::hasShow(auth('admin')->id(),'post') == false){
            return redirect()->route('home.index');
        }
        return view('admin.questions.index',[
            'capacities'  => Capacity::all(),
            'subjects'  => Subject::all(),
        ]);
    }

    public function store(Request $request)
    {

        $input['image'] = null;

        if ($request->hasFile('image')){
            $input['image'] = '/upload/questions/'.time().$request->image->getClientOriginalExtension();
            $request->image->move('/home/u875885261/domains/craneriggertest.com/public_html/upload/questions/', $input['image']);
        }
        foreach ($request->capacity_id as $capacity){
            $question = Question::create([
                'question' => $request->question,
                'capacity_id' => $capacity,
                'image'       => $input['image']
            ]);

            foreach ($request->options as $key=>$option){
                $true=0;
                if($request->true == $key){
                    $true = 1;
                }
                Option::create([
                    'question_id'   =>$question->id,
                    'option'        =>$option,
                    'true'          =>$true,
                ]);
            }
        }


        return response()->json([
            'success' => true,
            'message' => 'Language Created'
        ]);

    }

    public function edit($id)
    {
        return Question::with('options')->findOrFail($id);
    }


    public function update(Request $request, $id)
    {
        $language = Question::findOrFail($id);
        $input['image'] = $language->image;

        if ($request->has('no_image')){
            if (!$language->image === NULL){
                unlink('/home/u875885261/domains/craneriggertest.com/public_html'.$language->image);
            }
            $input['image'] = null;
        }
        if ($request->hasFile('image')){
            if (!$language->image === NULL){
                unlink(public_path($language->image));
            }
            $input['image'] = '/upload/questions/'.time().$request->image->getClientOriginalExtension();
            $request->image->move('/home/u875885261/domains/craneriggertest.com/public_html/upload/questions/', $input['image']);
        }
        $language->update([
            'question' => $request->question,
            'capacity_id' => $request->capacity_id,
            'image'       => $input['image']
        ]);

        foreach ($language->options as $key => $option){
            $true=0;
            if($request->true == $key){
                $true = 1;
            }
            $option = Option::find($option->id);
            $option->option = $request->options[$key];
            $option->true = $true;
            $option->save();
        }

        return response()->json([
            'success' => true,
            'message' => 'Question Updated'
        ]);
    }

    public function destroy($id)
    {
        $categories = Question::find($id);
        if($categories->answers){
            $categories->answers()->delete();
        }

        if($categories->options){
            $categories->options()->delete();
        }

        $categories->delete();
        return response()->json([
            'success' => true,
            'message' => 'Question Deleted'
        ]);
    }
    protected $adminId;
    public function questions($adminId){
        $this->adminId = $adminId;
        $question = Question::all();

        return DataTables::of($question)
            ->addColumn('idn', function(){
                static $var= 1;
                return $var++;
            })
            ->addColumn('question', function($question){
                return $question->question;
            })
            ->addColumn('capacity_id', function($question){
                return $question->capacity->name;
            })
            ->addColumn('image', function($question){
                if ($question->image == NULL){
                    return 'No Image';
                }
                return '<img class="rounded-square" width="50" height="50" src="'. url($question->image) .'" alt="">';;
            })
            ->addColumn('action', function($question){
                $return = '';
                if(HelperController::hasEdit($this->adminId,'question') == true){
                    $return.='<a onclick="editForm('. $question->id .')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i></a> ' ;
                }
                if(HelperController::hasDelete($this->adminId,'question') == true){
                    $return.='<a onclick="deleteData('. $question->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>';
                }
                return $return;
            })
            ->rawColumns(['question','idn','capacity_id','image', 'action'])->make(true);
    }

    public function subjects(Request $request){
        $output = '';
        $data = Capacity::where('subject_id',$request->value)->get();
        foreach($data as $row)
        {
            $output .= '<option value="'.$row->id.'" style="padding:5px;margin:2px;border:1px solid #aaa">'.$row->name.'</option>';
        }
        echo $output;
    }
}
