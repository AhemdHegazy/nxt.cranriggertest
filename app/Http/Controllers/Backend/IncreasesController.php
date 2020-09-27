<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\HelperController;
use App\Increase;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class IncreasesController extends Controller
{
    public function package($packageId)
    {
        if(HelperController::hasShow(auth('admin')->id(),'package') == false){
            return redirect()->route('home.index');
        }
        return view('admin.increases.index',compact('packageId'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        Increase::create($input);

        $increase = Increase::all();

        return response()->json([
            'success' => true,
            'message' => 'Increase Created'
        ]);
    }

    public function edit($id)
    {
        return Increase::findOrFail($id);
    }


    public function update(Request $request, $id)
    {
        $input = $request->all();
        $increase = Increase::findOrFail($id);
        $increase->update($input);

        return response()->json([
            'success' => true,
            'message' => 'Increase Updated'
        ]);
    }

    public function destroy($id)
    {

        $categories = Increase::find($id);
        $categories->delete();
        return response()->json([
            'success' => true,
            'message' => 'Increase Deleted'
        ]);
    }
    protected $adminId;
    public function increases($packageId,$adminId){
        $this->adminId = $adminId;
        $increase = Increase::where('package_id',$packageId)->get();

        return DataTables::of($increase)
            ->addColumn('idn', function(){
                static $var= 1;
                return $var++;
            })
            ->addColumn('price', function($increase){
                return $increase->price. ' SAR';
            })
            ->addColumn('minute', function($increase){
                return $increase->minute . ' minute';
            })
            ->addColumn('action', function($increase){
                return '<a onclick="editForm('. $increase->id .')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i></a> ' .
                    '<a onclick="deleteData('. $increase->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>';
            })
            ->rawColumns(['idn','price','minute', 'action'])->make(true);
    }
}
