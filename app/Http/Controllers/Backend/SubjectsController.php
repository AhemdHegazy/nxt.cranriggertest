<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Subject;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SubjectsController extends Controller
{

    public function index()
    {
        return view('admin.subjects.index');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        Subject::create($input);

        $Subject = Subject::all();

        return response()->json([
            'success' => true,
            'message' => 'Subject Created'
        ]);
    }

    public function edit($id)
    {
        $Subject = Subject::findOrFail($id);
        return $Subject;
    }


    public function update(Request $request, $id)
    {
        $input = $request->all();
        $Subject = Subject::findOrFail($id);
        $Subject->update($input);

        return response()->json([
            'success' => true,
            'message' => 'Subject Updated'
        ]);
    }

    public function destroy($id)
    {

        $categories = Subject::find($id);

        foreach ($categories->questions as $question){
            $question->options()->delete();
        }

        $categories->questions()->delete();
        $categories->delete();
        return response()->json([
            'success' => true,
            'message' => 'Subject Deleted'
        ]);
    }

    public function subjects()
    {
        $Subject = Subject::all();

        return DataTables::of($Subject)
            ->addColumn('idn', function(){
                static $var= 1;
                return $var++;
            })
            ->addColumn('name', function($Subject){
                return $Subject->name;
            })
            ->addColumn('description', function($Subject){
                return $Subject->description;
            })
            ->addColumn('action', function($Subject){
                return '<a onclick="editForm('. $Subject->id .')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i></a> ' .
                    '<a onclick="deleteData('. $Subject->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>';
            })
            ->rawColumns(['idn','name','description', 'action'])->make(true);
    }
}
