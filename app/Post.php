<?php

namespace App;

use App\Http\Requests\Request;
use Illuminate\Database\Eloquent\Model;
use App\Page;

/**
 * Class Post
 * @package App
 */
class Post extends Model
{
    /**
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * add relationship Post belong to one Page
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function page(){
        return $this->belongsTo(Page::class);
    }


}
