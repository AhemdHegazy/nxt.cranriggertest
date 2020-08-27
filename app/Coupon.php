<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable=[
        'code','is_applied','package_id'
    ];

    public function package(){
        return $this->belongsTo('App\Package');
    }
}
