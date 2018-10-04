<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use App\Modal;
use App\Brand;

class AdminAjaxController extends Controller
{
    /*
     * get all models assosiate with current brand id
     */
    public function modals(Request $request){
        $brand_id = $request->input('brand_id');
        $brand = Brand::findOrFail($brand_id);
        $modals = $brand->modals;
        return response()->json(array('modals'=> $modals), 200);
    }
}
