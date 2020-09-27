<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Capacity;
use App\Http\Controllers\HelperController;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CapacitiesController extends Controller
{
    public function index()
    {
        if(HelperController::hasShow(auth('admin')->id(),'capacity') == false){
            return redirect()->route('home.index');
        }
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
    protected $adminId;
    public function capacities($adminId){
        $this->adminId = $adminId;
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
                $return = '';
                if(HelperController::hasEdit($this->adminId,'capacity') == true){
                    $return.='<a onclick="editForm('. $capacity->id .')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i></a> ' ;
                }
                if(HelperController::hasDelete($this->adminId,'capacity') == true){
                    $return.='<a onclick="deleteData('. $capacity->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>';
                }
                return $return;
            })
            ->rawColumns(['idn','name','subject','description', 'action'])->make(true);
    }
}
