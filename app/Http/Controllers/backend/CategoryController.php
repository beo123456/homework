<?php

namespace App\Http\Controllers\Backend;
use App\Http\Requests\{AddCategoryRequest,EditCategoryRequest};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Category;

class CategoryController extends Controller
{
    function GetCategory(){
        // $data['categorys'] = category::all()->toarray();
        $categorys = Category::all();
        return view('Backend.category.category',compact('categorys'));
    }
        // gọi class AddCategoryRequest để check ô input
    function PostCategory(AddCategoryRequest $r){
        $category = new category;
        $category->parent = $r->parent;
        $category->name = $r->name;
        $category->slug = str_slug($r->name);
        $category->save();
        return redirect()->back()->with('thongbao','Đã thêm thành công danh mục: '.$r->name);
        // dd($category);
        }
    function GetEditCategory($id_cate){
        $data['cate'] = Category::find($id_cate);
        $data['categorys'] = category::all()->toarray();
        return view('Backend.category.editcategory',$data);
    }
    // gọi class EditCategoryRequest để check ô input
    function PostEditCategory(EditCategoryRequest $r,$id_cate){
        $category = Category::find($id_cate);
        $category->parent = $r->parent;
        $category->name = $r->name;
        $category->slug = str_slug($r->name);
        $category->save();
        return redirect()->back()->with('thongbao','Bạn đã sửa danh mục thành công');
    }
    function DeleteCategory($id_cate){
        // tìm theo id
        $category = Category::find($id_cate);
        // nâng cấp parent, nếu k nâng cấp parent. khi xóa id cha thì sẽ mất cả con(mang parent là id cha)
        // Tìm bản ghi, ở cột parent = $id_cate(id danh mục muốn xóa, line 40) 
        Category::where('parent',$id_cate)->update(['parent'=>$category->parent]); //// nâng cấp cột parent có gtri bằng id muốn xóa. cột parent sẽ bằng parent của id nuốn xóa 
        // xóa id
        $category->delete();
        return redirect()->back()->with('thongbao','Bạn đã xóa danh mục thành công');
    }
}
