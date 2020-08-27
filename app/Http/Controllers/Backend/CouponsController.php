<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Coupon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CouponsController extends Controller
{
    public function index()
    {
        return view('admin.coupons.index');
    }
    public function world()
    {
        return view('admin.coupons.world');
    }
    public function store(Request $request)
    {
        $input = $request->all();
        Coupon::create($input);

        return response()->json([
            'success' => true,
            'message' => 'Coupon Created'
        ]);
    }

    public function edit($id)
    {
        return Coupon::findOrFail($id);
    }


    public function update(Request $request, $id)
    {
        $input = $request->all();
        $Coupon = Coupon::findOrFail($id);
        $Coupon->update($input);

        return response()->json([
            'success' => true,
            'message' => 'Coupon Updated'
        ]);
    }

    public function destroy($id)
    {

        $coupons = Coupon::find($id);
        $coupons->delete();
        return response()->json([
            'success' => true,
            'message' => 'Coupon Deleted'
        ]);
    }

    public function coupons()
    {
        $Coupon = Coupon::all();

        return DataTables::of($Coupon)
            ->addColumn('idn', function(){
                static $var= 1;
                return $var++;
            })
            ->addColumn('code', function($Coupon){
                return $Coupon->code;
            })
            ->addColumn('package_id', function($Coupon){
                return $Coupon->package->name;
            })
            ->addColumn('action', function($Coupon){
                return '<a onclick="editForm('. $Coupon->id .')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i></a> ' .
                    '<a onclick="deleteData('. $Coupon->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>';
            })
            ->rawColumns(['idn','name','package_id', 'action'])->make(true);
    }
}
