<?php

namespace App\Http\Controllers;

use App\Model\Admin\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function ProductView($id,$product_name){
       $product = Product::find($id);
    //    return response()->json($product);
    return view('pages.product_details',compact('product'));


    }
}
