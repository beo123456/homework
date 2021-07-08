<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\models\Order;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    function GetOrder(){
        $order = Order::where('state',2)->orderby('id','desc')->paginate(5); // sxep giảm dần theo id 
        return view('Backend.order.order',compact('order'));
    }
    function GetDetailOrder($order_id){
        $order = Order::find($order_id);
        return view('Backend.order.detailorder',compact('order'));
    }
    function GetProcessed(){
        $order = Order::where('state',1)->orderby('updated_at','desc')->paginate(5); // sxep giảm dần theo updated_at
        return view('Backend.order.processed',compact('order'));
    }
    function Paid($order_id){
        $order = Order::find($order_id);
        $order->state=1;
        $order->save();
        return redirect()->route('Processed');
    }
}
