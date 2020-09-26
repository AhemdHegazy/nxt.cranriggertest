<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=[
        'title',
        'description',
        'slug',
        'subject_id',
        'featured',
        'content'
    ];

    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function subject(){
        return $this->belongsTo('App\Subject');
    }

}
