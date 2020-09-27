<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Order;
use App\Package;
use App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class OrdersController extends Controller
{
    public function index()
    {
        $users= User::where('is_company',0)->get();
        $packages= Package::get();
        return view('admin.orders.index',compact('packages','users'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        if($request->hours == 1){
            $input['amount'] = Package::find($request->package_id)->price;
        }else{
            $input['amount'] = Package::find($request->package_id)->price +  $request->hours * Package::find($request->package_id)->increase;

        }
        Order::create($input);

        $Order = Order::all();

        return response()->json([
            'success' => true,
            'message' => 'Order Created'
        ]);
    }

    public function edit($id)
    {
        $Order = Order::findOrFail($id);
        return $Order;
    }


    public function update(Request $request, $id)
    {
        $input = $request->all();
        $Order = Order::findOrFail($id);
        if($request->hours == 1){
            $input['amount'] = Package::find($request->package_id)->price;
        }else{
            $hours = $request->hours -1 ;
            $input['amount'] = Package::find($request->package_id)->price + $hours * Package::find($request->package_id)->increase;
        }
        $Order->update($input);

        return response()->json([
            'success' => true,
            'message' => 'Order Updated'
        ]);
    }

    public function destroy($id)
    {

        $categories = Order::find($id);
        $categories->delete();
        return response()->json([
            'success' => true,
            'message' => 'Order Deleted'
        ]);
    }
    protected $adminId;
    public function orders($adminId){
        $this->adminId = $adminId;
        $Order = Order::get();

        return DataTables::of($Order)
            ->addColumn('idn', function(){
                static $var= 1;
                return $var++;
            })
            ->addColumn('user_id', function($Order){
                return $Order->user->name;
            })
            ->addColumn('package_id', function($Order){
                return $Order->package->name;
            })
            ->addColumn('hours', function($Order){
                return $Order->hours.' H';
            })
            ->addColumn('amount', function($Order){
                return $Order->amount.' SR';
            })
            ->addColumn('action', function($Order){
                return '<a onclick="editForm('. $Order->id .')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i></a> ' .
                    '<a onclick="deleteData('. $Order->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>';
            })
            ->rawColumns(['idn','user_id','package_id','hours', 'amount','action'])->make(true);
    }
}
