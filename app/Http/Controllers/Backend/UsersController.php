<?php

namespace App\Http\Controllers\Backend;

use App\Answer;
use App\Company;
use App\Grade;
use App\Order;
use App\Payment;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UsersController extends Controller
{
    public function answers($paymentId){
        return view('admin.users.answers',compact('paymentId'));
    }
    public function grades($userId){
        $user = Grade::where('user_id',$userId)->get();
    }
    public function index()
    {
        $companies = Company::all();
        return view('admin.users.index',compact('companies'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $input['password']= bcrypt($input['email']);
        $input['is_company']= 0;
        if($request->company_id == 0){
            $input['has_company']= 0;
        }else{
            $input['has_company']= 1;
        }

        User::create($input);
        return response()->json([
            'success' => true,
            'message' => 'User Created'
        ]);
    }

    public function edit($id){
        return User::findOrFail($id);
    }
    public function orders($userId){
        return view('admin.users.orders',compact('userId'));
    }
    public function ApiAnswers($companyId){
        $company = Answer::where('payment_id',$companyId)->get();
        return DataTables::of($company)
            ->addColumn('idn', function(){
                static $var= 1;
                return $var++;
            })
            ->addColumn('question', function($company){
                return $company->question->question;
            })
            ->addColumn('option', function($company){
                return $company->option->option;
            })
            ->addColumn('true', function($company){
                return $company->question->options->where('true',1)->first()->option;
            })
            ->addColumn('result', function($company){
                return $company->value == 1 ? '<span class="text-success">True Answer</span>' : '<span class="text-danger">Wrong Answer</span>';
            })

            ->rawColumns(['idn','question','true','option','result'])->make(true);
    }
    public function ApiOrders($companyId){
        $company = Payment::where('user_id',$companyId)->get();
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
            ->addColumn('answers', function($company){
                $count = Answer::where('payment_id',$company->id)->count();
                if($count == 0){
                    return 'In Progress';
                }
                return '<a href="'.route('users.answers.show',$company->id).'" class="btn btn-success btn-xs"><span class="fa fa-question-circle"></span> Answers</a>';
            })
            ->addColumn('grades', function($company){
                $grade = Grade::where('payment_id',$company->id)->first();
                return $grade ? $grade->percentage.' %' : 'In Progress';
            })
            ->rawColumns(['idn','name','amount','grades','answers','users'])->make(true);
    }
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $input['password']= bcrypt($input['email']);
        $input['is_company']= 0;
        if($request->company_id == 0){
            $input['has_company']= 0;
        }else{
            $input['has_company']= 1;
        }
        $User = User::findOrFail($id);
        $User->update($input);

        return response()->json([
            'success' => true,
            'message' => 'User Updated'
        ]);
    }

    public function destroy($id)
    {
        $users = User::find($id);
        $users->orders()->delete();
        $users->delete();
        return response()->json([
            'success' => true,
            'message' => 'User Deleted'
        ]);
    }
    public function users(){
        $user = User::where('is_company',0)->where('company_id',0)->get();

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
