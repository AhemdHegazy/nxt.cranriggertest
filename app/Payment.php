<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $guarded=['id'];

    public function order(){
        return $this->belongsTo('App\Order');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
