<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable=[
        'site_name',
        'address',
        'about',
        'phone',
        'facebook',
        'twitter',
        'email',
        'linked_in',
        'youtube',
    ];
}
