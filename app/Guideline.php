<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guideline extends Model
{
    protected $fillable=[
      'title',
      'description',
      'subject_id',
    ];

    public function subject(){
        return $this->belongsTo('App\Subject');
    }

}
