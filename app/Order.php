<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=[
        'user_id',
        'package_id',
        'hours',
        'amount',
        'validation_date',
        'has_coupon',
        'coupon_id',
        'status'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function package(){
        return $this->belongsTo('App\Package');
    }

    public function grades(){
        return $this->hasMany('App\Grade');
    }
}
