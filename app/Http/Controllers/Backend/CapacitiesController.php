<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Capacity;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CapacitiesController extends Controller
{
    public function index()
    {
        return view('admin.capacities.index');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        Capacity::create($input);

        $capacity = Capacity::all();

        return response()->json([
            'success' => true,
            'message' => 'Capacity Created'
        ]);
    }

    public function edit($id)
    {
        $capacity = Capacity::findOrFail($id);
        return $capacity;
    }


    public function update(Request $request, $id)
    {
        $input = $request->all();
        $capacity = Capacity::findOrFail($id);
        $capacity->update($input);

        return response()->json([
            'success' => true,
            'message' => 'Capacity Updated'
        ]);
    }

    public function destroy($id)
    {

        $categories = Capacity::find($id);

        foreach ($categories->questions as $question){
            $question->options()->delete();
        }

        $categories->questions()->delete();
        $categories->delete();
        return response()->json([
            'success' => true,
            'message' => 'Capacity Deleted'
        ]);
    }

    public function capacities()
    {
        $capacity = Capacity::all();

        return DataTables::of($capacity)
            ->addColumn('idn', function(){
                static $var= 1;
                return $var++;
            })
            ->addColumn('name', function($capacity){
                return $capacity->name;
            })
            ->addColumn('subject', function($capacity){
                return $capacity->subject->name;
            })
            ->addColumn('description', function($capacity){
                return $capacity->description;
            })
            ->addColumn('action', function($capacity){
                return '<a onclick="editForm('. $capacity->id .')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i></a> ' .
                    '<a onclick="deleteData('. $capacity->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>';
            })
            ->rawColumns(['idn','name','subject','description', 'action'])->make(true);
    }
}
