<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;

class HelperController extends Controller
{
    public static function hasAdd($adminId,$table){
        $column = $table.'_add';
        $permission = Permission::where('admin_id',$adminId)->get()->first();
        return $permission->$column == 0 ? false : true;
    }

    public static function hasEdit($adminId,$table){
        $column = $table.'_edit';
        $permission = Permission::where('admin_id',$adminId)->get()->first();
        return $permission->$column == 0 ? false : true;
    }

    public static function hasShow($adminId,$table){
        $column = $table.'_show';
        $permission = Permission::where('admin_id',$adminId)->get()->first();
        return $permission->$column == 0 ? false : true;
    }

    public static function hasDelete($adminId,$table){
        $column = $table.'_delete';
        $permission = Permission::where('admin_id',$adminId)->get()->first();
        return $permission->$column == 0 ? false : true;
    }
}
