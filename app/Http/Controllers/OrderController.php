<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Visitor;
use App\Order;
class OrderController extends Controller
{
    //

    public function index(){
        return view('orders.index');
    }

    public function store(Order $order, Requests\OrderRequest $request){
        $visitor = Visitor::create(array_merge($request->all(), ['modal_id' => '1']));
        $order->status = 'reserve';
        $order->notice = $request->input('notice');
        $order->visitor()->associate($visitor);
        $order->save();
        flash('Ваш запрос отправлен. В течении дня с Вами свяжется менеджер для уточнения деталей.')->success();
        return redirect('orders');
    }
}
