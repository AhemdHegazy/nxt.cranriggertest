<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
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
        return view('admin.questions.index',[
            'subjects'  => Subject::all()
        ]);
    }

    public function store(Request $request)
    {
        $input['image'] = null;

        if ($request->hasFile('image')){
            $input['image'] = '/upload/questions/'.time().$request->image->getClientOriginalExtension();
            $request->image->move('/home/u875885261/domains/craneriggertest.com/public_html/upload/questions/', $input['image']);
        }

        $question = Question::create([
            'question' => $request->question,
            'subject_id' => $request->subject_id,
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
            'subject_id' => $request->subject_id,
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

    public function questions()
    {
        $Question = Question::all();

        return DataTables::of($Question)
            ->addColumn('idn', function(){
                static $var= 1;
                return $var++;
            })
            ->addColumn('question', function($Question){
                return $Question->question;
            })
            ->addColumn('subject_id', function($Question){
                return $Question->subject->name;
            })
            ->addColumn('image', function($Question){
                if ($Question->image == NULL){
                    return 'No Image';
                }
                return '<img class="rounded-square" width="50" height="50" src="'. url($Question->image) .'" alt="">';;
            })
            ->addColumn('action', function($Question){
                return '<a onclick="editForm('. $Question->id .')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i></a> ' .
                    '<a onclick="deleteData('. $Question->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>';
            })
            ->rawColumns(['question','idn','subject_id','image', 'action'])->make(true);
    }
}
