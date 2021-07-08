<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\{AddUserRequest,EditUserRequest};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    function GetAddUser(){
        return view('Backend.user.adduser');
    }
    
    // gọi class adduserrequest để check lỗi. nếu chuẩn thì tiếp tục chạy vào trong function
    function PostAddUser(AddUserRequest $r){
        $user = new User();
        $user->email = $r->email;
        $user->password = bcrypt($r->password); /// bcrypt, hash, md5
        $user->full = $r->full;
        $user->address = $r->address;
        $user->phone = $r->phone;
        $user->level = $r->level;
        // dd($user);
        $user->save();
        return redirect()->route('BackendUser')->with('thongbao', 'Bạn đã thêm user thành công');
    }
    function GetEditUser($id_user){
        // $id_user tự động nhận bên route. tên biến là gì cx dc
        $user = User::find($id_user);
        return view('Backend.user.edituser',compact('user'));
    }
    function PostEditUser(EditUserRequest $r, $id_user){
        $user = User::find($id_user);
        $user->email = $r->email;
        // nếu không bằng rỗng, thì là edit pass mới. nếu rỗng thì là k đổi pass
        if($r->password != ""){
        $user->password = bcrypt($r->password);
        }
        $user->full = $r->full;
        $user->address = $r->address;
        $user->phone = $r->phone;
        $user->level = $r->level;
        $user->save();
        return redirect()->route('BackendUser')->with('thongbao','Bạn đã sửa user thành công');

    }
    function GetListUser(){
        // tạo biến lấy tất cả dữ liệu bảng uses, phân trang
        $user = user::paginate(4);
        return view('Backend.user.listuser',compact('user'));  /// truyền biến mang dữ liệu qua view
    }
    function DelUser($id_user){
        User::destroy($id_user);
        return redirect()->route('BackendUser')->with('thongbao','Bạn đã xóa user thành công');

    }
}
