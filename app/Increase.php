<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Increase extends Model
{
    protected $guarded=['id'];

    public function package()
    {
        return $this->belongsTo('App\Package');
    }
}
