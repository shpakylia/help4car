<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Order;
use App\Service;
use App\Visitor;
use App\Modal;
use App\Brand;

class AdminOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function index(Request $request, Order $order){
        $orders = $order::latest()->get();
        return view('admin.orders.index', ['orders' => $orders]);
    }

    public function create(Order $order){
        $allServices = $order->allServices();

        // get all brands
        $brands =$order->brandList();

        // get all modal by brand
        $modals = Brand::find(1)->modals->lists('title', 'id');
        return view('admin.orders.create', compact('brands', 'modals', 'allServices'));
    }

    public function store(Order $order, Request $request){

        $this->validate($request, [
            'notice'=>'required',
            'visiitor.name'=>'required',
            'visiitor.phone'=>'required',
        ]);


        $order = $order->create($request->all());
        //update or create visitor
        $visitorObj = new Visitor();
        $visitor = $visitorObj->existVisitorByPhone($request->input('visitor.phone'));
        if(!is_null($visitor)){
            $visitor = Visitor::find($visitor->id);
            $visitor->update($request->input('visitor'));
        }else{
            $visitor = Visitor::create($request->input('visitor'));
        }

        //assosiate visitor with current order
        $order->visitor()->associate($visitor);
        $order->save();

        $order->services()->attach($request->input('service_list'));
        flash('Заказ успешно сохранен');
        return redirect('admin/orders');

    }

    public function edit(Order $order){
        // get service list for select
        $allServices = $order->allServices();

        // get visitor data
        $visitor = $order->visitor;
        if($visitor->count() > 0) {
            $modal = $visitor->modal;
            if($modal !== null){
                $brand = $modal->brand;
            }else{
                $brand = Brand::find(1);
            }
//            var_dump($brand);

            // get all modal by brand
            $modals = $brand->modals->lists('title', 'id');
        }
        // get all brands
        $brands =$order->brandList();

        return view('admin.orders.edit', compact('order', 'allServices', 'visitor', 'brands', 'modals', 'brand'));
    }

    public function update(Order $order, Request $request){

        $this->validate($request, [
            'notice'=>'required',
            'visiitor.name'=>'required',
            'visiitor.phone'=>'required',
            ]);
        //update order data
        $order->update($request->all());

        //update services assosiated with current order
        $serviceIds = $request->input('service_list');
        $order->services()->sync($serviceIds);

        //update visitor data
        $visitor = Visitor::find($request->input('visitor_id'));
        $modal = Modal::find($request->input('visitor.modal_id'));
        $visitor->modal()->associate($modal);
        $visitor->update($request->input('visitor'));

        flash('Успешно сохранено');
        return redirect('admin/orders/');

    }






}
