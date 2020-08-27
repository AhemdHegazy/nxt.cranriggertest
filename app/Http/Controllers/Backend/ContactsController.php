<?php

namespace App\Http\Controllers\Backend;

use App\Contact;
use App\Http\Controllers\Controller;
use App\Country;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ContactsController extends Controller
{
    public function index()
    {
        return view('admin.contacts.index');
    }

    public function destroy($id)
    {
        $countries = Contact::find($id);
        $countries->delete();
        return response()->json([
            'success' => true,
            'message' => 'Contact Deleted'
        ]);
    }

    public function contacts()
    {
        $country = Contact::all();

        return DataTables::of($country)
            ->addColumn('idn', function(){
                static $var= 1;
                return $var++;
            })
            ->addColumn('name', function($country){
                return $country->name;
            })
            ->addColumn('email', function($country){
                return $country->email;
            })
            ->addColumn('type', function($country){
                return $country->type;
            })
            ->addColumn('subject', function($country){
                return $country->subject;
            })
            ->addColumn('message', function($country){
                return $country->message;
            })
            ->addColumn('action', function($country){
                return '<a onclick="deleteData('. $country->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>';
            })
            ->rawColumns(['idn','name','email', 'type','message','subject','action'])->make(true);
    }
}
