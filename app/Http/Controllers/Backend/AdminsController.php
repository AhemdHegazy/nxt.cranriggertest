<?php

namespace App\Http\Controllers\Backend;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HelperController;
use App\Permission;
use App\Profile;
use Illuminate\Http\Request;
use Auth;
use Yajra\DataTables\DataTables;

class AdminsController extends Controller
{
    public function get(){
        if(HelperController::hasShow(auth('admin')->id(),'admin') == false){
            return redirect()->route('home.index');
        }
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

    public function getPermissions($adminId){
        $admin = Admin::find($adminId);
        $permissions = Permission::where('admin_id',$adminId)->get()->first();

        if($permissions == null){
            Permission::create([
               'admin_id' => $admin->id
            ]);
        }
        return view('admin.admins.permissions',compact('admin','permissions'));
    }

    public function SavePermissions(Request $request){

        foreach (array_keys($request->except('_token','id','_method')) as $key){
            $permission = Permission::find($request->input('id'))->update([
                $key => 1
            ]);
        }

        return redirect(route('home.index'));
    }
    protected $adminId;
    public function admins($adminId){
        $this->adminId = $adminId;

        $Admin = Admin::all();
        $this->adminId = $adminId;
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

            ->addColumn('action', function($Admin){
                $return = '';
                if($this->adminId == $Admin->id){
                    $return .= '<span class="badge badge-danger">Logged In Admin</span>';
                }else{
                        if(HelperController::hasEdit($this->adminId,'admin') == true){
                            $return.='<a onclick="editForm('. $Admin->id .')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i></a> ' ;
                        }
                        if(HelperController::hasDelete($this->adminId,'admin') == true){
                            $return.='<a onclick="deleteData('. $Admin->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>';
                        }
                        if(HelperController::hasShow($this->adminId,'permission') == true){
                            $return.='<a href="'. route('admin.permissions',$Admin->id) .'" style="margin: 0 5px"class="btn btn-success btn-xs">Permissions</a>';
                        }
                }
                return $return;
            })
            ->rawColumns(['idn','name','email','permissions','action'])->make(true);
    }

}
