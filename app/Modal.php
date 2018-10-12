<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Modal
 * @package App
 */
class Modal extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brand(){
        return $this->belongsTo('App\Brand');

    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function visitors(){
        return $this->hasMany('App\Visitor');
    }

}
