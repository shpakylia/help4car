<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modal extends Model
{
    //
    public function brand(){
        return $this->belongsTo('App\Brand');

    }

    public function visitors(){
        return $this->hasMany('App\Visitor');
    }

}
