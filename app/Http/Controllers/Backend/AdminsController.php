<?php

namespace App\Http\Controllers\Backend;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Permission;
use App\Profile;
use Illuminate\Http\Request;
use Auth;
use Yajra\DataTables\DataTables;

class AdminsController extends Controller
{
    public function get(){
        return view('admin.login');
    }

    public function post(){
        if(Auth::guard('admin')->attempt(['email'=>request('email'),'password' => request('password')])){
            return redirect('/admin');
        }else{
            return back();
        }
    }

    public function logout(Request $request)
    {

        Auth::guard('admin')->logout();
        $request->session()->flush();
        $request->session()->regenerate();

        return redirect()->guest(url('/admin/login'));
    }

    public function index()
    {
        return view('admin.admins.index');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $input['password']= bcrypt($input['email']);

        $admin = Admin::create($input);
        Permission::create([
            'admin_id'  =>$admin->id
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Admin Created'
        ]);
    }

    public function edit($id){
        return Admin::findOrFail($id);
    }


    public function update(Request $request, $id)
    {

        $input = $request->all();
        $input['password']= bcrypt($input['email']);

        $Admin = Admin::findOrFail($id);
        $Admin->update($input);

        return response()->json([
            'success' => true,
            'message' => 'Admin Updated'
        ]);
    }

    public function destroy($id)
    {

        $Admins = Admin::find($id);
        $Admins->delete();
        return response()->json([
            'success' => true,
            'message' => 'Admin Deleted'
        ]);
    }

    public function getPermissions(){
        return view('admin.admins.permissions');
    }

    public function SavePermissions(){

    }
    public function admins(){
        $Admin = Admin::all();

        return DataTables::of($Admin)
            ->addColumn('idn', function(){
                static $var= 1;
                return $var++;
            })
            ->addColumn('name', function($Admin){
                return $Admin->name;
            })
            ->addColumn('email', function($Admin){
                return $Admin->email;
            })
            ->addColumn('permissions', function($Admin){
                return'<a href="'.route('admin.permissions').'" class="btn btn-success">Permissions</a> ';
            })
            ->addColumn('action', function($Admin){
                return '<a onclick="editForm('. $Admin->id .')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i></a> ' .
                    '<a onclick="deleteData('. $Admin->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>';
            })
            ->rawColumns(['idn','name','email','permissions','action'])->make(true);
    }
}
