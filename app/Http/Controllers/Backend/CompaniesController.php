<?php

namespace App\Http\Controllers\Backend;

use App\Company;
use App\Country;
use App\Http\Controllers\Controller;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CompaniesController extends Controller
{

    public function index()
    {   $countries = Country::all();
        return view('admin.companies.index',compact('countries'));
    }

    public function orders($companyId){
        return view('admin.companies.orders',compact('companyId'));
    }

    public function users($companyId)
    {
        return view('admin.companies.users',compact('companyId'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $company = Company::create($input);
        User::create([
            'name'      =>$company->name,
            'email'     =>$company->email,
            'password'  =>bcrypt($company->email),
            'is_company'=>1,
            'has_company'=>0,
            'company_id'=>$company->id
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Company Created'
        ]);
    }

    public function edit($id){
        return Company::findOrFail($id);
    }


    public function update(Request $request, $id)
    {
        $input = $request->all();
        $company = Company::findOrFail($id);
        $company->update($input);
        $user = User::where(['is_company'=>1,'company_id'=>$company->id,'has_company' =>0])->first();

        $user->update([
            'name'      =>$input['name'],
            'email'     =>$input['email'],
            'password'  =>bcrypt($input['email']),
            'is_company'=>1,
            'has_company'=>0,
            'company_id'=>$company->id
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Company Updated'
        ]);
    }

    public function destroy($id)
    {
        $company = Company::find($id);
        User::where('company_id',$company->id)->delete();
        User::where(['is_company'=>1,'company_id'=>$company->id,'has_company' =>0])->delete();
        $company->delete();
        return response()->json([
            'success' => true,
            'message' => 'Company Deleted'
        ]);
    }
    protected $adminId;
    public function ApiOrders($companyId,$adminId){
        $this->adminId = $adminId;
        $company = Order::where('status',1)->where('user_id',User::where('is_company',1)->where('company_id',$companyId)->first()->id)->get();
        return DataTables::of($company)
            ->addColumn('idn', function(){
                static $var= 1;
                return $var++;
            })
            ->addColumn('number', function($company){
                return '#'.$company->id;
            })
            ->addColumn('name', function($company){
                return $company->user->name;
            })
            ->addColumn('amount', function($company){
                return $company->amount;
            })
            ->addColumn('package', function($company){
                return $company->package->name;
            })

            ->addColumn('users', function($company){
                return '<a href="'.route('users.company',User::find($company->user_id)->company_id).'" class="btn btn-success btn-xs"><span class="fa fa-users"></span></a>';
            })

            ->rawColumns(['idn','name','amount','users','package'])->make(true);
    }

    public function companies($adminId){
        $this->adminId = $adminId;
        $company = Company::all();

        return DataTables::of($company)
            ->addColumn('idn', function(){
                static $var= 1;
                return $var++;
            })
            ->addColumn('name', function($company){
                return $company->name;
            })
            ->addColumn('email', function($company){
                return $company->orders;
            })

            ->addColumn('orders', function($company){
                return '<a href="'.route('orders.company',$company->id).'" class="btn btn-success btn-xs"><span class="fa fa-shopping-cart"></span> Orders</a>';
            })
            ->addColumn('details', function($company){
                return '<a class="btn btn-info btn-xs"  data-toggle="modal" data-target="#exampleModal'.$company->id.'"><span class="fa fa-info-circle"></span> Details</a>';
            })
            ->rawColumns(['idn','name','email','orders','details'])->make(true);
    }

    public function CompanyUsers($company,$adminId){
        $this->adminId = $adminId;
        $user = User::where('company_id',$company)->where('has_company','<>',0)->get();
        return DataTables::of($user)
            ->addColumn('idn', function(){
                static $var= 1;
                return $var++;
            })
            ->addColumn('name', function($user){
                return $user->name;
            })
            ->addColumn('email', function($user){
                return $user->email;
            })
            ->addColumn('orders', function($user){
                return '<a href="'.route('orders.users',$user->id).'" class="btn btn-success btn-xs"><span class="fa fa-shopping-cart"></span> Orders</a>';
            })
            ->rawColumns(['idn','name','email','orders'])->make(true);
    }
}
