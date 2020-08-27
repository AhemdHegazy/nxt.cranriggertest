<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable=[
        'order_id',
        'payment_id',
        'user_id',
        'percentage'
    ];

    public function user(){
        return $this->belongsTo('App\USer');
    }

    public function order(){
        return $this->belongsTo('App\Order');
    }

    public function payment(){
        return $this->belongsTo('App\Payment');
    }

}
