<?php

namespace App\Http\Controllers\Authenticated;

use App\Company;
use App\Http\Controllers\Controller;
use App\User;
use App\Grade;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GuestAuthenticatedController extends Controller
{

    public function logout(Request $request)
    {
        auth()->guard()->logout();
        $request->session()->flush();
        $request->session()->regenerate();

        return redirect()->guest(url('/'));
    }

    public function loginGet(){
        return view('frontend.guest.login');
    }

    public function loginPost(Request $request){
        if(is_numeric($request->get('email'))) {

            auth()->attempt(['number' => $request->email, 'password' => $request->password]);
            if (auth()->user()->is_company == 0) {
                return redirect(route('user.info'));
            }
            return redirect(route('company.info'));
        }elseif (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            if (auth()->user()->is_company == 0) {
                return redirect(route('user.info'));
            }
            return redirect(route('company.info'));
        } else {
            return back();
        }
    }

    public function registerType(){
        return view('frontend.guest.register-type');
    }

    public function registerGet(){
        return view('frontend.guest.register');
    }

    public function registerPost(Request $request){
        $input = $request->all();
       
        $validatedData = $request->validate([
            'name'                  => 'required',
            'comm_number'           => 'required|unique:companies',
            'phone'                 => 'required|unique:companies',
            'email'                 => 'required|email|unique:companies',
            'employees'             => 'required|integer',
            'country_id'             => 'required|integer',
            'logo'                 => 'image|mimes:jpg,jpeg,png,bmp,tiff',
            'password'              => 'min:6|required_with:repassword|same:repassword'
        ]);
        $input['logo'] = '';
        if ($request->hasFile('logo')){
            $input['logo'] = '/upload/companies/'.time().$request->logo->getClientOriginalExtension();
            $request->logo->move(public_path('/upload/companies/'), $input['logo']);
        }
        $request->logo = $input['logo'];
        $company = Company::create($request->all());

        $user = User::create([
            'name'      =>$company->name,
            'email'     =>$company->email,
            'password' => Hash::make($request->password),
            'is_company'=>1,
            'number'=>$company->comm_number,
            'has_company'=>0,
            'company_id'=>$company->id
        ]);
        if(auth()->attempt(['email'=>$request->email,'password' => $request->password])){
            return redirect(route('company.info'));
        }else{
            return back();
        }
    }
    public function registerUser(Request $request){
        $input = $request->all();
        $validatedData = $request->validate([
            'name'                  => 'required',
            'email'                 => 'required|email|unique:companies',
            'password'              => 'min:6|required_with:repassword|same:repassword'
        ]);
        $number = $request->has('number') ? $request->number : null;
        $user = User::create([
            'name'      =>$request->name,
            'email'     =>$request->email,
            'password' => Hash::make($request->password),
            'is_company'=>0,
            'has_company'=>0,
            'number'=> $number,
            'company_id'=>0
        ]);
        if(auth()->attempt(['email'=>$request->email,'password' => $request->password])){
            return redirect(route('user.info'));
        }else{
            return back();
        }
    }
    
    public function grade($orderId){
        $users = User::where('company_id',auth()->user()->company_id)->where('is_company','<>',1)->pluck('id')->toArray();
        $payments = Payment::where('order_id',$orderId)->whereIn('user_id',$users)->pluck('id')->toArray();
        $grads = Grade::whereIn('payment_id',$payments)->get();
        return view('frontend.assessment.grade-users',[
            'grades'    => $grads
            ]);
    }

}
