<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable=[
        'question',
        'image',
        'capacity_id'
    ];


    public function capacity(){
        return $this->belongsTo('App\Capacity');
    }

    public function answers(){
        return $this->hasMany('App\Answer');
    }

    public function options(){
        return $this->hasMany('App\Option');
    }
}
