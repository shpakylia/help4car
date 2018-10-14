<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Page extends Model
{
    /**
     * @var array for Mass Assignment
     */
    protected $fillable = ['alias','title', 'text', 'seo_title', 'seo_description', 'order', 'is_active'];

    /**
     * add relationship Page has many Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts(){
        return $this->hasMany(Post::class);
    }



    /**
     * @return mixed
     */
    public static function postsList(){
        $page = static::where('alias', \Request::path())->first();
        if($page == null){
            return $page;
        }
        return $page->posts()->where('is_active', '1')->get();
    }


}
