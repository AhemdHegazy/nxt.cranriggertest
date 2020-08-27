<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    protected $guarded=['id'];

    public function payment(){
        return $this->belongsTo('App\Payment');
    }

}
