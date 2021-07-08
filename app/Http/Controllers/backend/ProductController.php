<?php

namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Requests\{AddProductRequest,EditProductRequest};
use App\Http\Controllers\Controller;
use App\models\{Product,Category};


class ProductController extends Controller
{
    function GetAddProduct()
    {
        $categorys = Category::all();
        
        return view("backend.product.addproduct",compact('categorys'));
    }

    function PostAddProduct(AddProductRequest $r)
    {
      $product = new Product();
      $product->category_id = $r->category;
      $product->code = $r->code;
      $product->name = $r->name;
      $product->slug = str_slug($r->name);
      $product->featured = $r->featured;
      $product->price = $r->price;
      $product->state = $r->state;
      $product->info = $r->info;
      $product->describe = $r->describe;

      if($r->hasFile('img')){ /// check input xem có file chưa
        $file = $r->img; // lấy file ở input
        $file_name = str_slug($r->name).'.'.$file->getClientOriginalExtension(); // lấy tên ảnh
        $file->move('backend/img',$file_name); // lưu file, tên file upload
        $product->img = $file_name;  // upload
      }else{
        $product->img = 'no-img.jpg';
      }
      $product->save();
      return redirect()->route('BackendProduct')->with('thongbao','bạn đã thêm sản phẩm thành công');

    }

    function GetEditProduct($prd_id)
    {
      $data['categorys'] = Category::all()->toarray();
      $data['product'] = Product::find($prd_id);
        return view("backend.product.editproduct",$data);
    }

    function PostEditProduct(EditProductRequest $r,$prd_id){
      $product = Product::find($prd_id);
      $product->category_id = $r->category;
      $product->code = $r->code;
      $product->name = $r->name;
      $product->slug = str_slug($r->name);
      $product->featured = $r->featured;
      $product->price = $r->price;
      $product->state = $r->state;
      $product->info = $r->info;
      $product->describe = $r->describe;

      if($r->hasFile('img')){ /// check input xem có file chưa
        if($product->img != 'no-img.jpg'){ /// nếu tên file trên csdl khác no-img.jpg thì mới xóa. tên file cũ = no-img.jpg thì giữ, nếu xóa thì trong thư mục lưu file này cx sẽ mất
          // -> các sp k có hình, lưu hình có tên no-img.jpg sẽ lỗi
        unlink('backend/img/'.$product->img); // xóa file trước đó trên csl để upload file mới, nếu k xóa file cũ mà upload file mới thì file cũ và mới cùng tồn tại-> nặng sever
        }
        // nếu đã chọn file để upload thì
        $file = $r->img; // lấy file đã chọn
        $file_name = str_slug($r->name).'.'.$file->getClientOriginalExtension(); // lấy tên ảnh
        $file->move('backend/img',$file_name); // lưu file trong backend/img với tên đã lấy từ biến $file_name
        $product->img = $file_name;  // hoàn thành upload file lên csdl
      }

      $product->save();
      return redirect()->back()->with('thongbao','đã sửa sp thành công');
    }


   function GetListProduct()
    {
        $product = Product::paginate(4);
        return view("backend.product.listproduct",compact('product'));
    }

    function DeleteProduct($prd_id){
     Product::destroy($prd_id);
     return redirect()->route('BackendProduct')->with('thongbao','Bạn đã xóa sp thành công');
    }
    
}