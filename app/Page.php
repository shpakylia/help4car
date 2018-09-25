<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Page extends Model
{
    protected $fillable = ['alias','title_ru','title_uk', 'text_ru',
        'text_uk', 'seo_title_ru', 'seo_title_uk', 'seo_description_ru', 'seo_description_uk', 'order', 'is_active'];
    protected $guarded = ['alias'];
//    get all posts on page
    public function posts(){
        return $this->hasMany(Post::class);
    }

}
