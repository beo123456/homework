<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Product;
use Cart;

class CartController extends Controller
{
    function GetCart(){
      // dd(Cart::content());
      $cart = Cart::content(); // lấy ttin trong giổ hàng
      // dd($cart->all());
      $total = Cart::total(0,'','.');
      return view('Frontend.cart.cart',compact('cart','total'));
      }

      // dùng shoping cart -> tiện lợi
      function AddCart(request $r){
      /// tìm theo id ẩn bên line 52 detail.blade
      $product = Product::find($r->id_product);
      // lấy thử ttin, xem đã nhận tìm theo id_product chưa: line 52 detail.blade
        // echo $product->name;
        if($r->has('quantity')){ /// nếu tồn tại input quantity -> thêm hàng ở detail(quantity do người dùng request lên)
          $quantity = $r->quantity;
        }else{
          $quantity = 1; //// nếu không thì quantity = 1(shop,index mua nhanh)
        }
      // hiể thị ttin sp trong cart
        Cart::add([
          'id' => $product->code,
          'name' => $product->name,
          'qty' => $quantity,
          'price' => $product->price,
          'weight' => 0,
          'options' => ['img' => $product->img]]); /// trường mở rộng, nếu thiếu thì thêm trường ở đây
      return redirect('cart');
      // dd($r->all());
      }

      function UpdateCart($rowId,$quantity){ /// nhận rowid,quantity trên route. lấy từ cart.blade
          Cart::update($rowId,$quantity);
          return 'success'; /// gom dl trả về của jave script. điều kiện để chạy javescript bên cart.blade
      }

      function DeleteCart($rowId){
        // dd($rowId);
        Cart::remove($rowId);
        return redirect()->back()->with('thongbao','Bạn đã xóa sản phẩm khỏi giỏ hàng thành công.');
      }
}
