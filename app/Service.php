<?php

namespace App;

use App\Http\Requests\Request;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['parent_id', 'title', 'start_price', 'end_price', 'notice','img', 'created_at', 'updated_at'];

    /**
     * get all parent services without current
     *
     * @return mixed
     */
    public function getParentsService(){
        $parents = $this->where('parent_id', 0)->where('id','<>', $this->id)->lists('title', 'id');
        $parents->prepend('Нет категории');
        return $parents;
    }


    /**
     * get file name before save in DB
     *
     * @param $file
     */
    public function setImgAttribute($file){
        if(!empty($file)) {
            $this->attributes['img'] = $file->getClientOriginalName();
        }
        if($file == ''){
            $this->attributes['img'] = '';
        }
    }

    /**
     *get service with foreing key in current table
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function serviceCategory(){
        return $this->hasMany($this, 'parent_id');
    }

    /**
     * get all services with Eager Loading
     *
     * @return mixed
     */
    public function rootServices(){
        return $this->where('parent_id', 0)->with('serviceCategory')->get();
    }

    /**
     * Get all child services
     * @return mixed
     */
    public static function childsServices(){
        return static::where('parent_id', '<>', 0)->get();
    }

    /**
     * get all orders belong to this service
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function order(){
        return $this->belongsToMany('App\Order');
    }

}
