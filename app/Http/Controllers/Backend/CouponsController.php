<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Coupon;
use App\Http\Controllers\HelperController;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CouponsController extends Controller
{
    public function index()
    {
        if(HelperController::hasShow(auth('admin')->id(),'coupon') == false){
            return redirect()->route('home.index');
        }
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
    protected $adminId;
    public function coupons($adminId){
        $this->adminId = $adminId;
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
                $return = '';
                if(HelperController::hasEdit($this->adminId,'coupon') == true){
                    $return.='<a onclick="editForm('. $Coupon->id .')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i></a> ' ;
                }
                if(HelperController::hasDelete($this->adminId,'coupon') == true){
                    $return.='<a onclick="deleteData('. $Coupon->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>';
                }
                return $return;
            })
            ->rawColumns(['idn','name','package_id', 'action'])->make(true);
    }
}
