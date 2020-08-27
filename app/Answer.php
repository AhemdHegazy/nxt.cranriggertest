<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable=[
        'question_id',
        'order_id',

        'option_id',
        'user_id',
        'payment_id',
        'value',
    ];

    public function question(){
        return $this->belongsTo('App\Question');
    }

    public function order(){
        return $this->belongsTo('App\Order');
    }

    public function option(){
        return $this->belongsTo('App\Option');
    }

    public function payment(){
        return $this->belongsTo('App\Payment');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
