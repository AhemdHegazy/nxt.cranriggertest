<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable=[
        'name' , 'comm_number' , 'phone' , 'email' , 'employees' , 'logo' , 'title' , 'town' ,'country_id'
    ];
}
