<?php

namespace App\Http\Controllers\Backend;

use App\CMS;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HelperController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CMSController extends Controller
{
    /*
     *
     * 'organization_pkg',
            'organization_login',
            'individual_pkg',
            'individual_login',
            'contacts',
            'main_title',
            'main_title',
            'numbers_section',
            'exam_goals',
            'logo',
            'description',
            'address',
     */
    public function index()
    {
        if(HelperController::hasShow(auth('admin')->id(),'cms') == false){
            return redirect()->route('home.index');
        }
        $cmsCount = CMS::count();
        if($cmsCount == 0){

            $cms = CMS::create([
                'organization_pkg'      => ' Plz insert data ',
                'organization_login'    => ' Plz insert data ',
                'individual_pkg'        => ' Plz insert data ',
                'individual_login'      => ' Plz insert data ',
                'contacts'              => ' Plz insert data ',
                'main_title'            => ' Plz insert data ',
                'user_comments'         => ' Plz insert data ',
                'numbers_section'       => ' Plz insert data ',
                'exam_goals'            => ' Plz insert data ',
                'logo'                  => ' Plz insert data ',
                'description'           => ' Plz insert data ',
                'address'               => ' Plz insert data ',

            ]);
        }
        $cms = CMS::first();
        return view('admin.cms.index',compact('cms'));
    }

    public function update(Request $request)
    {

        $cms = CMS::first();
        $data['logo'] = $cms->logo;
        if ($request->hasFile('logo')) {
            if (!$cms->logo == NULL) {
                try {
                    unlink(public_path($cms->logo));
                }catch (\Exception $e){

                }
            }
            $data['logo'] = '/website/' . time() . '-Logo.' . $request->logo->getClientOriginalExtension();
            $request->logo->move(public_path('/website/'), $data['logo']);
        }
        $cms->update([
            'organization_pkg'      => $request->organization_pkg,
            'organization_login'    => $request->organization_login,
            'individual_pkg'        => $request->individual_pkg,
            'individual_login'      => $request->individual_login,
            'contacts'              => $request->contacts,
            'main_title'            => $request->main_title,
            'user_comments'         => $request->user_comments,
            'numbers_section'       => $request->numbers_section,
            'exam_goals'            => $request->exam_goals,
            'logo'                  => $data['logo'],
            'description'           => $request->description,
            'address'               => $request->address,

        ]);
        Session::flash('success', 'Data Updated Successfully');
        return redirect()->back();
    }
}
