<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Capacity extends Model
{
    protected $guarded=['id'];

    public function questions(){
        return $this->hasMany('App\Question');
    }

    public function subject(){
        return $this->belongsTo('App\Subject');
    }
}
