<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable=[
        'option',
        'true',
        'question_id'
    ];

    public function question(){
        return $this->belongsTo('App\Question');
    }

    // Scopes
}
