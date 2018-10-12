<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use App\Modal;
use App\Brand;

/**
 * Class for working with ajax in admin panel
 *
 * Class AdminAjaxController
 * @package App\Http\Controllers\Admin
 */
class AdminAjaxController extends Controller
{
    /**
     * Get all models by id brand
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function modals(Request $request){
        $brand_id = $request->input('brand_id');
        $brand = Brand::findOrFail($brand_id);
        $modals = $brand->modals;
        return response()->json(array('modals'=> $modals), 200);
    }
}
