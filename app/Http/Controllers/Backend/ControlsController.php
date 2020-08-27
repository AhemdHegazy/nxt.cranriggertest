<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Admin;
use App\Setting;
use Illuminate\Http\Request;

class ControlsController extends Controller
{
    public function profile(){
        $profile = Admin::first();
        return view('admin.controls.profile',compact('profile'));
    }

    public function update(Request $request){
        $validate =  $request->validate([
            'email'      => 'required',
            'name'      => 'required'
        ]);
        $admins = Admin::where('email',$request->email)->where('email','<>',auth('admin')->user()->email)->count();
        if($admins > 0){
            $validate =  $request->validate([
                'email'      => 'required|unique:admins',
                'name'      => 'required'
            ]);
        }
        $profile =auth('admin')->user();
        if(request('password') != null)
        {
            $profile->password=bcrypt($request->input('password'));
        }

        $profile->name = $request->name;
        $profile->email = $request->email;
        $profile->save();
        return redirect(route('home.index'));
    }

    public function settings(){
        $settings = Setting::first();
        if($settings == null){
            Setting::create([
                'site_name'     => 'Site testSkills',
                'address'       => 'Company Address',
                'about'         => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Aspernatur cumque eos inventore nostrum optio placeat quia tempora veritatis voluptatem?
                                    Beatae cumque ex fugit laborum nulla!',
                'phone'         => '+99600000000',
                'facebook'      => 'https://www.facebook.com/testSkills',
                'twitter'       => 'https://www.facebook.com/testSkills',
                'email'         => 'testSkills@gmail.com',
                'linked_in'     => 'https://www.facebook.com/testSkills',
                'youtube'       => 'https://www.youtube.com/testSkills',
            ]);
        }
        return view('admin.controls.settings',compact('settings'));
    }

    public function change(Request $request){
        $settings = Setting::first();
        $settings->update($request->all());
        return redirect(route('home.index'));
    }

    public function copy()
    {
        return view('admin.copy');
    }
}
