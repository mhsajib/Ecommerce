<?php

namespace App\Http\Controllers;

use Cart;
use Response;
use Session;
use App\Wishlist;
use App\Model\Admin\Coupon;
use App\Model\Admin\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addcart($id){

        $product = Product::where('id',$id)->first();
        if($product->discount_price == NULL){
            Cart::add(['id' => $product->id,
            'name' => $product->product_name , 
            'qty' => 1, 
            'price' => $product->selling_price, 
            'weight' => 1,
            'options' => ['image' => $product->image_one,
            'color'=> '', 'size'=>''
            ]]);
            return \Response::json(['success' => 'Successfully Added On you Cart']);

        }
        else{
            Cart::add(['id' => $product->id,
            'name' => $product->id , 
            'qty' => 1, 
            'price' => $product->discount_price, 
            'weight' => 1,
            'options' => ['image' => $product->image_one, 
            'color'=> '', 'size'=>''
            ]]);
            return \Response::json(['success' => 'Successfully Added On you Cart']);

        }

    }
    function check(){
       $content = Cart::content();
       return response()->json($content);
    }
    public function showCart(){
        $cart = Cart::content();
        // return response($cart);
        return view('pages.cart',compact('cart'));
    }
    public function removeProduct($rowId){
     Cart::remove($rowId);
     $notification=array(
        'messege'=>'Remove Successful',
        'alert-type'=>'success'
         );
       return Redirect()->back(); 
    }
    public function UpdateCart(Request $req){
        $rowId = $req->productid;
        // echo $porduct_id;
        $qty = $req->qty;
        Cart::update($rowId,$qty);
       return Redirect()->back(); 
 

    }
    public function ViewProduct(Request $request,$id){

       $product = Product::find($id);

       $color = $product->product_color;
       $product_color = explode(',',$color);

       $size = $product->product_size;
       $product_size = explode(',',$size);
    //    return response()->json($product);

        return response::json(array(
            'product' => $product,
            'color' => $product_color,
            'size' => $product_size,
        ));

    // if($request->ajax()){
    //     return "AJAX";
    // }
    // return "HTTP";

    }
    public function insertCart(Request $request){
// echo $request->product_id;
            $id = $request->product_id;
            $product = Product::where('id',$id)->first();
            if($product->discount_price == NULL){
                Cart::add(['id' => $product->id,
                'name' => $product->product_name , 
                'qty' => $request->qty, 
                'price' => $product->selling_price, 
                'weight' => 1,
                'options' => ['image' => $product->image_one,
                'color'=> $request->color,
                'size'=> $request->size
                ]]);
                $notification=array(
                    'messege'=>'Successfully Done',
                    'alert-type'=>'success'
                     );
               return Redirect()->back()->with($notification); 
 
                // return \Response::json(['success' => 'Successfully Added On you Cart']);

            }
            else{
                Cart::add(['id' => $product->id,
                'name' => $product->id , 
                'qty' => $request->qty, 
                'price' => $product->discount_price, 
                'weight' => 1,
                'options' => ['image' => $product->image_one, 
                'color'=> $request->color, 'size'=> $request->size
                ]]);
                $notification=array(
                    'messege'=>'Successfully Done',
                    'alert-type'=>'success'
                     );
                     return Redirect()->back()->with($notification); 
            

                // return \Response::json(['success' => 'Successfully Added On you Cart']);

            }
    }
    public function Checkout(){
        if(Auth::check()){
            $cart = Cart::content();
            // return response($cart);
            return view('pages.checkout',compact('cart'));
        }
        else{
            $notification=array(
                'messege'=>'AT First Login your Account',
                'alert-type'=>'success'
                 );
                 return Redirect()->route('login')->with($notification); 
        }
    }
    public function Wishlist(){
        // $userid = Auth::id();
        // $product = Wishlist::where('user_id', $userid)->get();
        // $product = Wishlist::where('user_id', $userid)->first();
        // $product = Wishlist::where('user_id', $userid)->products;

        // return response()->json($product[0]->product_id->products->product_name );

        // foreach($product as $row){
        //     echo $row->products->product_name;
        // }
        $userid=Auth::id();
        $product=DB::table('wishlists')->join('products','wishlists.product_id','products.id')
                          ->select('products.*','wishlists.user_id')
                          ->where('wishlists.user_id',$userid)
                          ->get();
           return view('pages.wishlist',compact('product'));     
          
    }
    public function Coupon(Request $request){
         $coupon = $request->coupon;
         $check = Coupon::where('coupon', $coupon)->first();
        //  return response()->json($check);
        // $coupon=$request->coupon;
        // $check=DB::table('coupons')->where('coupon',$coupon)->first();
        if ($check) {
              session::put('coupon',[
                  'name' => $check->coupon,
                  'discount' => $check->discount,
                  'balance' => Cart::Subtotal() - $check->discount
              ]);
              $notification=array(
                              'messege'=>'Successfully Coupon Applied',
                               'alert-type'=>'success'
                         );
            return redirect()->back()->with($notification);
        }else{
            $notification=array(
                              'messege'=>'Invalid Coupon',
                               'alert-type'=>'error'
                         );
            return redirect()->back()->with($notification);
        }
    }
    public function CouponRemove(){
        Session::forget('coupon');
        return Redirect()->back();
    }
    public function Paymentpage()
    {
        $cart = Cart::content();
        return view('pages.payment',compact('cart'));
    }
}