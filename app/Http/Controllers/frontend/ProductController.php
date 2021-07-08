<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\{Product,Category};

class ProductController extends Controller
{
    function GetDetail($slug_prd){
      // chọn bản ghi có slug = $slug_prd(bên shop.blade = $value['slug'])
      $data['product'] = Product::where('slug',$slug_prd)->paginate('4');
      // hiển thị sp mới. theo id mới nhất
      $data['new_products'] = Product::orderBy('id','desc')->paginate('4');
        return view('Frontend.product.detail',$data);
      }

      function GetShop(){
        $data['product'] = Product::paginate(6);
        $data['categorys'] = Category::all();
        return view('Frontend.product.shop',$data);
      }
}
