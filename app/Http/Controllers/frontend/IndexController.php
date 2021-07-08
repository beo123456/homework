<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\{Product,Category};

class IndexController extends Controller
{
    function GetIndex(){
      // $product = Product::all();
      $data['prd_featured'] = Product::where('featured',1)->take(4)->get(); /// lấy 4sp
      $data['prd_new'] = Product::orderby('id','desc')->take(8)->get();
        return view('Frontend.index',$data);
      }
      
      function GetAbout(){
        return view('Frontend.about');
      }
     
      function GetContact(){
        return view('Frontend.contact');
      }

      function GetPrdCate($slug_cate){ // nhaận biến bên route
        // echo $slug_cate
        // lấy dl ở category vs dkien slug = $slug_cate. lấy bản ghi. chỏ sang prd ở category model(lấy dc nhiều bản ghi có category_id(product) = id(category)). phân trang
        $data['product'] = Category::where('slug',$slug_cate)->first()->prd()->paginate(6);
        $data['categorys'] = Category::all();
        return view('Frontend.product.shop',$data);

      }

      function GetFilter(request $r){
          // echo $r->start;
          // echo '</br>';
          // echo $r->end;
          // lấy bản ghi có price trong khoảng từ $r->start và $r->end
          $data['product'] = Product::whereBetween('price',[$r->start,$r->end])->paginate(6); // wherebetween: trong khoảng
          $data['categorys'] = Category::all();
          return view('Frontend.product.shop',$data);
      }
}
