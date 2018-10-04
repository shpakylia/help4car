<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

use App\Service;
use App\Visitor;
use App\Modal;
use App\Brand;

class Order extends Model
{
    //
    protected $fillable = array('notice', 'parts_price', 'full_price', 'status', 'date', 'created_at', 'updated_at');

    protected $dates = ['date'];

    public function setDateAttribute($date){
        if(empty($date)){
            $this->attributes['date'] = Carbon::now();
        }
        else{
            $this->attributes['date'] = Carbon::createFromFormat('Y-m-d H:i:s', $date);
        }
    }


    /*
     * get a list services associated with this order
     *
     * */
    public function getServiceListAttribute(){
        return $this->services->lists('id')->toArray();
    }

    //get brand id
    public function getBrandIdAttribute(){
        return $this->visitor->modal->brand->id;
    }

    public function allServices(){
        $services = new Service();
        return $services->childsServices()->lists('title', 'id');
    }

    public function brandList(){
        return  Brand::all()->lists('name', 'id');
    }
    /*get all services belongs to current order*/
    public function services(){
        return $this->belongsToMany('App\Service');
    }

    /*
     * get visitor belongs to current order
     * */
    public function visitor(){
        return $this->belongsTo('App\Visitor');
    }


}
