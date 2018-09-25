<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class ServiceController extends Controller
{
    /*
    Show all services

    */
    public function index(Request $request){
        $cats = Service::all();
        return view('services.index', ['cats' => $cats]);
    }

    /*
     * get all servicec with prices
     * */
    public function prices(Service $services){
        $rootServices = $services->rootServices();
        return view('prices.index', ['services'=> $rootServices]);
    }

}
