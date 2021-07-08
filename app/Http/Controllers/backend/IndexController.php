<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\carbon;
use App\models\order;
class IndexController extends Controller
{

    function GetIndex(){
        // dd(carbon::now()->format('d-m-Y'));
        $month_now = carbon::now()->format('m');
        $year_now = carbon::now()->format('Y');

        for($i=1;$i<=$month_now;$i++){
            $dl['Tháng '.$i]=order::where('state',1)->whereMonth('updated_at',$i)->whereYear('updated_at',$year_now)->sum('total');
        }
        // dd($dl);
        $data['dl']=$dl;
        $data['so_dh'] = order::count();
        return view('Backend.index',$data);
    }

    function Logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
