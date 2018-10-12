<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Brand
 * @package App
 */
class Brand extends Model
{
    /**
     * Get all modals for current brand with correct title
     *
     * @return mixed
     */
    public function modals(){
        return $this->hasMany('App\Modal')->select('id', 'name', 'years',  'engine', 'type_akpp', \DB::raw("CONCAT(name, ' | ', years, ' | ', engine, ' | ', 'type_akpp')  AS title"));
    }
}
