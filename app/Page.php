<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Page extends Model
{
    protected $fillable = ['alias','title', 'text', 'seo_title', 'seo_description', 'order', 'is_active'];
//    protected $guarded = ['alias'];
//    get all posts on page
    public function posts(){
        return $this->hasMany(Post::class);
    }

}
