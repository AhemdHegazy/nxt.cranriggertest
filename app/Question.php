<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable=[
        'question',
        'image',
        'subject_id'
    ];


    public function subject(){
        return $this->belongsTo('App\Subject');
    }

    public function answers(){
        return $this->hasMany('App\Answer');
    }

    public function options(){
        return $this->hasMany('App\Option');
    }
}
