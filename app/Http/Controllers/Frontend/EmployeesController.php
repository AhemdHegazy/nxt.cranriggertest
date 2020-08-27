<?php

namespace App\Http\Controllers\Frontend;

use App\Company;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index(){

    }
    public function show(){

    }
    public function create(){
        return view('frontend.companies.users.create');
    }
    public function store(Request $request){

        $password = bcrypt(Company::find($request->company_id)->comm_number);
        User::create([
           'name'    =>$request->name,
           'email'   =>$request->email,
           'password'=>$password,
           'number'  =>$request->number,
           'is_company'=>$request->is_company,
           'company_id'=>$request->company_id,
           'has_company'=>$request->has_company,
        ]);
        return redirect(route('company.info'));
    }

    public function edit($id){
        $user = User::find($id);
       return view('frontend.companies.users.edit',compact('user'));
    }

    public function update(Request $request,$id){
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->number = $request->number;
        $user->save();
        return redirect(route('company.info'));
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return redirect(route('company.info'));
    }
}
