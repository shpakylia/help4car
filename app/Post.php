<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Page;

class Post extends Model
{
    //    get page for post
    public function page(){
        return $this->belongsTo(Page::class);
    }

}
