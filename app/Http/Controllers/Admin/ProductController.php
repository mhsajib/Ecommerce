<?php

namespace App\Http\Controllers\Admin;

use Image;
use App\Model\Admin\Brand;
use App\Model\Admin\Product;
use Illuminate\Http\Request;
use App\Model\Admin\Category;
use App\Model\Admin\Subcategory;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
          echo "index";
    }
    public function create()
    {
        $category = Category::all();
        $brands = Brand::all();
        return view('admin.product.create', compact('category', 'brands'));
    }

    //subcaategory collect by ajax request
    public function GetSubcategory($category_id)
    {
       $cat = Subcategory::where('category_id',$category_id)->get();
       return json_encode($cat);
    }

    public function store(Request $request)
    {
        //   dd($request);
        // return json_encode($request);
            $product = new Product;
            $product->product_name = $request->product_name;
            $product->product_code = $request->product_code;
            $product->product_quantity = $request->product_quantity;
            $product->category_id = $request->category_id;
            $product->subcategory_id = $request->subcategory_id;
            $product->brand_id = $request->brand_id;
            $product->product_color = $request->product_color;
            $product->product_size = $request->product_size;
            $product->selling_price = $request->selling_price;
            $product->product_details = $request->product_details;
            $product->video_link = $request->video_link;
            $product->main_slider = $request->main_slider;
            $product->hot_deal = $request->hot_deal;
            $product->best_rated = $request->best_rated;
            $product->trend = $request->trend;
            $product->mid_slider = $request->mid_slider;
            $product->hot_new = $request->hot_new;
            $product->status = 1;

          $image_one = $request->image_one;
          $image_two = $request->image_two;
          $image_three = $request->image_three;

        //   $image = $request->file('brand_logo');
          if($image_one && $image_two)
          {
            $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(230,300)->save('public/media/product/'.$image_one_name);
            $product->image_one = 'public/media/product/'.$image_one_name;


            $image_two_name= hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
            Image::make($image_two)->resize(230,300)->save('public/media/product/'.$image_two_name);
            $product->image_two = 'public/media/product/'.$image_two_name;


            $product->save();
            $notification=array(
            'messege'=>'Successfully Product inserted',
            'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);    
          } elseif($image_one){
            // $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
            // Image::make($image_one)->resize(230,300)->save('public/media/product/'.$image_one_name);
            // $product->image_one = 'public/media/product/'.$image_one_name;


            // $image_two_name= hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
            // Image::make($image_two)->resize(230,300)->save('public/media/product/'.$image_two_name);
            // $product->image_two = 'public/media/product/'.$image_two_name;


            // $product->save();
            // $notification=array(
            // 'messege'=>'Successfully Product inserted',
            // 'alert-type'=>'success'
            // );
            // return Redirect()->back()->with($notification);
            $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(230,300)->save('public/media/product/'.$image_one_name);
            $product->image_one = 'public/media/product/'.$image_one_name;
            $product->save();
           $notification=array(
           'messege'=>'Successfully Product inserted',
           'alert-type'=>'success'
           );
           return Redirect()->back()->with($notification);
          }
      




    }
}
