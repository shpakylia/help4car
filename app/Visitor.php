<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    //
    protected $fillable = array('name', 'gender', 'phone', 'email', 'notice', 'modal_id');

    public function orders(){
        return $this->hasMany('App\Order');
    }

    public function modal(){
        return $this->belongsTo('App\Modal');
    }

    public function existVisitorByPhone($phone){
        if(!empty($phone)){
            $visitor = $this->where('phone', 'like', $phone)->first();
            if($visitor->count() > 0){
                 return $visitor;
            }
        }
        return null;
    }

}
