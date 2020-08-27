<?php

namespace App\Http\Controllers\Frontend;

use App\Company;
use App\Http\Controllers\Controller;
use App\Order;
use App\Package;
use App\User;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function place($packageId){
        if(auth()->user()->company_id == 0){
            self::OrderUser($packageId);
        }else{
            self::OrderCompany($packageId);
        }
        return redirect(route('user.info'))->with('success', 'Order Created Successfully!');;
    }
    public function OrderCompany($packageId){
        $order = Order::create([
            'user_id'   => auth()->user()->id,
            'package_id'=> $packageId,
            'hours'     =>Package::find($packageId)->hours,
            'amount'    =>Package::find($packageId)->price*\App\Company::find(auth()->user()->company_id)->employees,
        ]);
    }

    public function OrderUser($packageId){
        $order = Order::create([
            'user_id'   => auth()->user()->id,
            'package_id'=> $packageId,
            'hours'     =>Package::find($packageId)->hours,
            'amount'    =>Package::find($packageId)->price
        ]);
    }
    public function customize($packageId){
        $package = \App\Package::find($packageId);
        return view('frontend.users.customize',compact('package'));
    }

    public function setup($orderId){

        $order = Order::find($orderId);
        $company = User::find($order->user_id);
        $users = User::where('company_id',$company->company_id)->where('is_company',0)->get();
        return view('frontend.companies.users.index',compact('users','order'));
    }

    public function customizePost(Request $request){

        if(auth()->user()->company_id == 0){
            $order = Order::create([
                'user_id'   => auth()->user()->id,
                'package_id'=>$request->packageId,
                'hours'     =>$request->hours,
                'amount'    =>$request->price
            ]);
            $route = route('user.info');
        }else{
            $order = Order::create([
                'user_id'   => auth()->user()->id,
                'package_id'=> $request->packageId,
                'hours'     => $request->hours,
                'amount'    => $request->price*\App\Company::find(auth()->user()->company_id)->employees,
            ]);
            $route = route('company.info');
        }
        return redirect($route)->with('success', 'Order Created Successfully!');;
    }

    public function destroy($orderId){
        $order = Order::find($orderId);
        $order->delete();
        return redirect()->back();
    }
}
