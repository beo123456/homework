<?php

namespace App\Http\Controllers\frontend;

use App\Http\Requests\CheckoutRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;
use App\models\{Order,ProductOrder};

class CheckoutController extends Controller
{
    function GetCheckout(){
      $cart = Cart::content(); // lấy dl 
      $total = Cart::total(0,',','.'); // tính tổng số tiền. number_format dc luoon
        return view('Frontend.checkout.checkout',compact('cart','total'));
      }


      // check rules của CheckoutRequest. nếu k lỗi thì tiếp tục chạy vào function
      function PostCheckout(CheckoutRequest $r){
        // dd($r->all());
        $order = new Order();
        $order->full = $r->full; 
        $order->address = $r->address; 
        $order->email = $r->email; 
        $order->phone = $r->phone;
        $order->total = Cart::total(0,'',''); /// không number_format kiểu kia. vì ở migration để dạng số
        $order->state = 2;
        // dd($order->all());
        $order->save();

        foreach(Cart::content() as $value)/// lập lại các bản ghi xuống dưới đây(add bản ghi vào product_order)
        { 
          $product = new ProductOrder();
          // lấy bên shopping cart
          $product->code = $value->id;
          $product->name = $value->name;
          $product->price = round($value->price,0); /// làm tròn số sau dấu thập phân
          $product->quantity = $value->qty;
          $product->img = $value->options->img;
          $product->order_id = $order->id; /// line 31. save xong -> tạo id mới -> gọi dc. id người đặ mua sp
          $product->save();
        }
         //// xóa toàn bộ giỏ hàng khi đã order thành công 
        Cart::destroy();
        return redirect('checkout/complete/'.$order->id); /// truyền id người order. sang route hứng dl id line 32
      }

     

      function GetComplete($order_id){
        $order = Order::find($order_id);
        $total = Cart::total(0,',','.'); // tính tổng số tiền. number_format dc luoon
        return view('Frontend.checkout.complete',compact('order','total'));
      }
}
