<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use App\Shipping;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function NewOrder(){
        
        // echo 'from new order';
        $order = Order::where('status', 0)->get();
        // dd();
        return view('admin.order.pending',compact('order'));
    }
    public function ViewOrder($user_id,$id){
        // echo $id;
        $orders = Order::where('user_id', $user_id)->first();
        $shipping = Shipping::where('order_id',$id)->first();
        $shipping = Shipping::where('order_id',$id)->first();
        return response()->json($shipping);
    }
}
