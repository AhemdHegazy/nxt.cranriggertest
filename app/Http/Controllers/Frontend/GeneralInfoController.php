<?php

namespace App\Http\Controllers\Frontend;

use App\Company;
use App\Http\Controllers\Controller;
use App\Package;
use App\Payment;
use App\User;
use Illuminate\Http\Request;

class GeneralInfoController extends Controller
{
    public function company(){
        if(auth()->user()->is_company == 0){
            return redirect()->back();
        }

        $company = Company::where('email',auth()->user()->email)->get()->first();
        $users = User::where('company_id',$company->id)->where('id','<>',auth()->user()->id)->get();
        $packages = Package::where('type',1)->get();
        return view('frontend.companies.index',compact('company','users','packages'));
    }

    public function user(){
        if(auth()->user()->is_company == 1){
            return redirect()->back();
        }
        $packages = Package::where('type',0)->get();
        $FinchPayments = Payment::where(['status' =>1,'user_id' => auth()->user()->id])->get();
        $ReadyPayments = Payment::where(['status' =>0,'user_id' => auth()->user()->id])->get();
        return view('frontend.users.index',compact('packages','FinchPayments','ReadyPayments'));
    }
}
