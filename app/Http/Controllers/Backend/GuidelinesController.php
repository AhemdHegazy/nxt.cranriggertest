<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Guideline;
use App\Http\Controllers\HelperController;
use App\Subject;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class GuidelinesController extends Controller
{
    public function index()
    {
        if(HelperController::hasShow(auth('admin')->id(),'guideline') == false){
            return redirect()->route('home.index');
        }
        return view('admin.guidelines.index',[
            'subjects'  => Subject::all()
        ]);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        Guideline::create($input);

        $Guideline = Guideline::all();

        return response()->json([
            'success' => true,
            'message' => 'Guideline Created'
        ]);
    }

    public function edit($id)
    {
        return Guideline::findOrFail($id);
    }


    public function update(Request $request, $id)
    {
        $input = $request->all();
        $Guideline = Guideline::findOrFail($id);
        $Guideline->update($input);

        return response()->json([
            'success' => true,
            'message' => 'Guideline Updated'
        ]);
    }

    public function destroy($id)
    {
        $categories = Guideline::find($id);

        $categories->delete();
        return response()->json([
            'success' => true,
            'message' => 'Guideline Deleted'
        ]);
    }
    protected $adminId;

    public function guidelines($adminId){
        $this->adminId = $adminId;
        $Guideline = Guideline::all();

        return DataTables::of($Guideline)
            ->addColumn('idn', function(){
                static $var= 1;
                return $var++;
            })
            ->addColumn('title', function($Guideline){
                return $Guideline->title;
            })
            ->addColumn('description', function($Guideline){
                return $Guideline->description;
            })
            ->addColumn('subject', static function($post){
                return $post->subject_id ? $post->subject->name : 'All';
            })
            ->addColumn('action', function($Guideline){
                $return = '';
                if(HelperController::hasEdit($this->adminId,'guideline') == true){
                    $return.='<a onclick="editForm('. $Guideline->id .')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i></a> ' ;
                }
                if(HelperController::hasDelete($this->adminId,'guideline') == true){
                    $return.='<a onclick="deleteData('. $Guideline->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>';
                }
                return $return;
            })
            ->rawColumns(['idn','title','subject','description', 'action'])->make(true);
    }
}
