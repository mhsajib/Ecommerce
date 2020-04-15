<?php

namespace App\Http\Controllers;

use Cart;
use Response;
use App\Model\Admin\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
}
