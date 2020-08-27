<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable=[
      'name',
      'price',
      'type',
      'subject_id',
      'questions',
      'hours',
      'increase'
    ];

    public function orders(){
        return $this->belongsTo('App\Order');
    }

    public function coupons(){
        return $this->belongsTo('App\Coupon');
    }

    public function subject(){
        return $this->belongsTo('App\Subject');
    }
}
