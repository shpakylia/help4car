<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

use App\Service;
use App\Visitor;
use App\Modal;
use App\Brand;

/**
 * Class for working with order
 *
 * Class Order
 * @package App
 */
class Order extends Model
{
    /**
     * @var array
     */
    protected $fillable = array('notice', 'parts_price', 'full_price', 'status', 'date', 'created_at', 'updated_at');

    /**
     * @var array get Carbon date from date string
     */
    protected $dates = ['date'];

    /**
     * Format date before save in DB
     *
     * @param $date
     */
    public function setDateAttribute($date){
        if(empty($date)){
            $this->attributes['date'] = Carbon::now();
        }
        else{
            $this->attributes['date'] = Carbon::createFromFormat('Y-m-d H:i:s', $date);
        }
    }


    /**
     * get a list services associated with this order
     *
     * @return mixed
     */
    public function getServiceListAttribute(){
        return $this->services->lists('id')->toArray();
    }

    /**
     * get Brand Id Attribute
     * @return mixed
     */
    public function getBrandIdAttribute(){
        return $this->visitor->modal->brand->id;
    }

    /**
     * get brands
     * @return static
     */
    public function brandList(){
        return  Brand::all()->lists('name', 'id');
    }

    /**
     * get all services belongs to current order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function services(){
        return $this->belongsToMany('App\Service');
    }

    /*
     * get visitor belongs to current order
     * */
    /**
     * get visitor belongs to current order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function visitor(){
        return $this->belongsTo('App\Visitor');
    }


}
