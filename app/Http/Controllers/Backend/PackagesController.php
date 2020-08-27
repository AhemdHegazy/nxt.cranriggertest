<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Package;
use App\Subject;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PackagesController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        return view('admin.packages.index',compact('subjects'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        Package::create($input);

        return response()->json([
            'success' => true,
            'message' => 'Package Created'
        ]);
    }

    public function edit($id)
    {
        return Package::findOrFail($id);
    }


    public function update(Request $request, $id)
    {
        $input = $request->all();
        $Package = Package::findOrFail($id);
        $Package->update($input);

        return response()->json([
            'success' => true,
            'message' => 'Package Updated'
        ]);
    }

    public function destroy($id)
    {

        $categories = Package::find($id);
        $categories->delete();
        return response()->json([
            'success' => true,
            'message' => 'Package Deleted'
        ]);
    }

    public function packages()
    {
        $Package = Package::all();

        return DataTables::of($Package)
            ->addColumn('idn', function(){
                static $var= 1;
                return $var++;
            })
            ->addColumn('name', function($Package){
                return $Package->name;
            })
            ->addColumn('type', function($Package){

               if($Package->type == 0){
                 return 'Individuals';
               }
               return  'Companies';
            })
            ->addColumn('questions', function($Package){
                return $Package->questions;
            })
            ->addColumn('price', function($Package){
                return $Package->price.' SR';
            })
            ->addColumn('hours', function($Package){
                return $Package->hours.' Hour';
            })
            ->addColumn('subject', function($Package){
                return $Package->subject->name;
            })
            ->addColumn('increase', function($Package){
                return $Package->increase.' SR / 1Hour';
            })
            ->addColumn('action', function($Package){
                return '<a onclick="editForm('. $Package->id .')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i></a> ' .
                    '<a onclick="deleteData('. $Package->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>';
            })
            ->rawColumns(['idn','type','questions','subject','price','hours','increase', 'action'])->make(true);
    }
}
