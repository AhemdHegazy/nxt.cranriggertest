<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\HelperController;
use Illuminate\Http\Request;

class ChatsController extends Controller
{
    public function index()
    {
        if(HelperController::hasShow(auth('admin')->id(),'cms') == false){
            return redirect()->route('home.index');
        }

        return view('admin.chats.index');
    }

    public function store(Request $request){
        
    }
}
