<?php

namespace App\Http\Controllers;

use Cart;
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
}
