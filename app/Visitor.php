<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Visitor
 * @package App
 */
class Visitor extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = array('name', 'gender', 'phone', 'email', 'notice', 'modal_id');

    /**
     * Get orders this visitor have
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders(){
        return $this->hasMany('App\Order');
    }

    /**
     * Get model belong to current visitor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function modal(){
        return $this->belongsTo('App\Modal');
    }

    /**
     *Check existing user by phone. if exist result collection of this user
     * @param $phone
     * @return null|Collection
     */
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
