<?php

namespace App;

use App\Http\Requests\Request;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    protected $fillable = ['parent_id', 'title', 'start_price', 'end_price', 'notice','img', 'created_at', 'updated_at'];

    public function getParentsSelect($without_id = null){
        $parents = $this->where('parent_id', 0)->where('id','<>', $without_id)->get();
        $parentsSelect[0] = 'Нет категории';
        foreach ($parents as $parent)
        {
            $parentsSelect[$parent->id] = $parent->title;

        }
        return $parentsSelect;
    }

    public function setImgAttribute($file){

        if(!empty($file)) {
            $this->attributes['img'] = $file->getClientOriginalName();
        }
        if($file == ''){
            $this->attributes['img'] = '';
        }
    }
    public function serviceCategory(){
        return $this->hasMany($this, 'parent_id');
    }

    public function rootServices(){
        return $this->where('parent_id', 0)->with('serviceCategory')->get();
    }

    public function childsServices(){
        return $this->where('parent_id', '<>', 0)->get();
    }

    public function order(){
        return $this->belongsToMany('App\Order');
    }

}
