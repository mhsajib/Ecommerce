<?php

namespace App\Http\Controllers;

use Cart;
use App\Model\Admin\Product;
use Illuminate\Http\Request;
use App\Model\Admin\Category;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function ProductView($id,$product_name){
       $product = Product::find($id);

       $color = $product->product_color;
       $product_color = explode(',',$color);

       $size = $product->product_size;
       $product_size = explode(',',$size);
    //    foreach($product_color as $a){
    //        echo $a.'<br>';
    //    }


    //    return response()->json($product->product_color);
      return view('pages.product_details',compact('product','product_size','product_color'));


    }
    public function Addcart(Request $req, $id){
      $product = Product::where('id',$id)->first();
      if($product->discount_price == NULL){
          Cart::add(['id' => $product->id,
          'name' => $product->product_name , 
          'qty' => $req->qty, 
          'price' => $product->selling_price, 
          'weight' => 1,
          'options' => ['image' => $product->image_one,
          'color'=> $req->color, 'size'=>$req->size
          ]]);
          $notification=array(
            'messege'=>'Successfully Added',
            'alert-type'=>'success'
             );
           return Redirect()->to('/')->with($notification); 
          // return \Response::json(['success' => 'Successfully Added On you Cart']);

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
          $notification=array(
            'messege'=>'Successfully Added',
            'alert-type'=>'success'
             );
           return Redirect()->to('/')->with($notification); 
          // return \Response::json(['success' => 'Successfully Added On you Cart']);

      }
    }

    public function ProductsView($id)
    {
        $category = Category::all();
        $products = Product::where('subcategory_id', $id)->paginate(30);
        $brands = Product::where('subcategory_id', $id)->select('brand_id')->groupBy('brand_id')->get();

        // return response()->json($brand);
        return view('pages.all_products',compact('products','brands','category'));
    }
}
