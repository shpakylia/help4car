<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\OrderRepository;
use App\Order;
use App\Service;
use App\Visitor;
use App\Modal;
use App\Brand;

/**
 * Class controller for work with orders
 *
 * Class AdminOrderController
 * @package App\Http\Controllers\Admin
 */
class AdminOrderController extends Controller
{

    /**
     * @var OrderRepository
     */
    protected $model;

    /**
     * AdminOrderController constructor.
     */
    public function __construct(OrderRepository $model)
    {
        $this->model = $model;
        $this->middleware('auth');
    }

    /**
     * Get all orders
     *
     * @uses OrderRepository::orderByLastMonth()
     * @param Request $request
     * @param Order $order
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request, Order $order){
        $orders = $this->model->orderByLastMonth();
        return view('admin.orders.index', ['orders' => $orders]);
    }

    /**
     * Create Order
     *
     * @param Order $order
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Order $order){
        $allServices = Service::childsServices()->lists('title', 'id');;

        $brands =$order->brandList();

        // get all modal by brand
        $modals = Brand::find(1)->modals->lists('title', 'id');
        return view('admin.orders.create', compact('brands', 'modals', 'allServices'));
    }

    /**
     * @param Order $order
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
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

    /**
     * @param Order $order
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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

            // get all modal by brand
            $modals = $brand->modals->lists('title', 'id');
        }
        // get all brands
        $brands =$order->brandList();

        return view('admin.orders.edit', compact('order', 'allServices', 'visitor', 'brands', 'modals', 'brand'));
    }

    /**
     * @param Order $order
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
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
