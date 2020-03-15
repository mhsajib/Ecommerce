<?php

namespace App\Http\Controllers\Admin\Category;

use App\Model\Admin\Coupon;
use Illuminate\Http\Request;
use App\Model\Admin\Newslaters;
use App\Http\Controllers\Controller;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function coupon()
    {
        $coupon = Coupon::all();
        return view('admin.coupon.coupon',compact('coupon'));
    }

    public function storecoupon(Request $request){
        $coupon = new Coupon;
        $coupon->coupon = $request->coupon;
        $coupon->discount = $request->discount;
        $coupon->save();
        $notification=array(
            'messege'=>'Coupon Insert Done',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
    }

    public function editcoupon($id){
        $coupon=Coupon::find($id);
        return view('admin.coupon.edit_coupon',compact('coupon'));
    }
    public function deletecoupon($id){

        Coupon::findorfail($id)->delete();
        $notification=array(
            'messege'=>'Coupon Delete Done',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
    }

    public function updatecoupon(Request $request,$id){
        $coupon=Coupon::find($id);
        $coupon->coupon = $request->coupon;
        $coupon->discount = $request->discount;
        $coupon->update();

        $notification=array(
            'messege'=>'Coupon Update Done',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
    }

    public function newsletter(){
        $newsletter =Newslaters::all();
        return view('admin.coupon.newsletter', compact('newsletter'));
    }
    public function deletenewsletter($id){
        Newslaters::findorfail($id)->delete();
        $notification=array(
            'messege'=>'Subscriber Delete Done',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
    }
}
