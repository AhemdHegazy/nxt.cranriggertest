<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Country;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CountriesController extends Controller
{
    public function index()
    {
        return view('admin.countries.index');
    }
    public function world()
    {
        return view('admin.countries.world');
    }
    public function store(Request $request)
    {
        $input = $request->all();
        Country::create($input);

        return response()->json([
            'success' => true,
            'message' => 'Country Created'
        ]);
    }

    public function edit($id)
    {
        return Country::findOrFail($id);
    }


    public function update(Request $request, $id)
    {
        $input = $request->all();
        $Country = Country::findOrFail($id);
        $Country->update($input);

        return response()->json([
            'success' => true,
            'message' => 'Country Updated'
        ]);
    }

    public function destroy($id)
    {

        $countries = Country::find($id);
        $countries->delete();
        return response()->json([
            'success' => true,
            'message' => 'Country Deleted'
        ]);
    }

    public function countries()
    {
        $country = Country::all();

        return DataTables::of($country)
            ->addColumn('idn', function(){
                static $var= 1;
                return $var++;
            })
            ->addColumn('name', function($country){
                return $country->name;
            })
            ->addColumn('code', function($country){
                return $country->code;
            })
            ->addColumn('action', function($country){
                return '<a onclick="editForm('. $country->id .')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i></a> ' .
                    '<a onclick="deleteData('. $country->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>';
            })
            ->rawColumns(['idn','name','code', 'action'])->make(true);
    }
}
