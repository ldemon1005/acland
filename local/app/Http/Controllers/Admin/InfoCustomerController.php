<?php

namespace App\Http\Controllers\Admin;

use App\Models\InfoCustomer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class InfoCustomerController extends Controller
{
    function index(Request $request){
        $search = $request->get('search');

        $query = DB::table('info_customer');

        if($search){
            $query->where('name','like',"%$search%")->orWhere('email',$search)->orWhere('phone',$search);
        }

        $list_info = $query->orderByDesc('id')->paginate(15);

        $data = [
            'list_info' => $list_info
        ];
        return view('admin.info_customer.index',$data);
    }

    function update_status($id){
        $info = InfoCustomer::find($id);
        $info->status == 2 ? $info->status = 1 : $info->status = 2;
        $info->save();

        return json_encode([
            'info' => $info->toJson()
        ]);
    }
}
