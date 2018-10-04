<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    //
    public function modals(){
        return $this->hasMany('App\Modal')->select('id', 'name', 'years',  'engine', 'type_akpp', \DB::raw("CONCAT(name, ' | ', years, ' | ', engine, ' | ', 'type_akpp')  AS title"));
    }
}
