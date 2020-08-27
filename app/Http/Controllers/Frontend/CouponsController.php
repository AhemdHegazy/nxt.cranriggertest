<?php

namespace App\Http\Controllers\Frontend;

use App\Coupon;
use App\Http\Controllers\Controller;
use App\Order;
use App\Package;
use Illuminate\Support\Facades\Session;
use App\Payment;
use Illuminate\Http\Request;

class CouponsController extends Controller
{
    public function check(Request $request){
        $is_Exists = Coupon::where(['code' => $request->code,'package_id' => $request->package_id,'is_applied' => 0])->get()->first();
        if($is_Exists != null){
            $is_Exists->is_applied = 1;
            $is_Exists->save();

            $order = Order::create([
                'user_id'   => auth()->user()->id,
                'package_id'=> $is_Exists->package_id,
                'status'    => 1,
                'hours'     =>Package::find($is_Exists->package_id)->hours,
                'amount'    =>Package::find($is_Exists->package_id)->price
            ]);

            Payment::create([
                'user_id'     => auth()->user()->id,
                'order_id'    => $order->id,
                'amount'      => $order->amount,
                'bank_transaction_id' => 'CouponNotPaid',
            ]);
            Session::flash('message', "Coupon Applied Successfully");
            return redirect()->back();
        }
        Session::flash('error', "Coupon Doesn't Match Please Try Again");
        return redirect()->back();
    }
}
