<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $guarded=['id'];

    public function admin(){
        return $this->belongsTo('App\Admin');
    }
}
