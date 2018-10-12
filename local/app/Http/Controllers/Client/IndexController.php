<?php

namespace App\Http\Controllers\Client;

use App\Models\InfoCustomer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    function index(){
        return view('client.index');
    }

    function action_info(Request $request){
        $req = $request->all();
        $req['created_at'] = time();
        InfoCustomer::create($req);

        return redirect()->route('index')->with('success','Đăng ký lấy bảng giá thành công');
    }
}
