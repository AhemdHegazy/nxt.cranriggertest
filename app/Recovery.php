<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recovery extends Model
{
    protected $fillable=[
        'user_id',
        'url',
        'rest'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
