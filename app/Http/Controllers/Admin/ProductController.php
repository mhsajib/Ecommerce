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
          $product = Product::all();
          return view('admin.product.index',compact('product'));
          // foreach($product as $row)
          // {
          //   echo $row->brand->brand_name."--".$row->category->category_name;

          // }

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
            $product->buyone_getone = $request->buyone_getone;

            $product->status = 1;

          $image_one = $request->image_one;
          $image_two = $request->image_two;
          $image_three = $request->image_three;

        //   $image = $request->file('brand_logo');
          if($image_one && $image_two && $image_three)
          {
            $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(230,300)->save('public/media/product/'.$image_one_name);
            $product->image_one = 'public/media/product/'.$image_one_name;


            $image_two_name= hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
            Image::make($image_two)->resize(230,300)->save('public/media/product/'.$image_two_name);
            $product->image_two = 'public/media/product/'.$image_two_name;

            $image_three_name= hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
            Image::make($image_three)->resize(230,300)->save('public/media/product/'.$image_three_name);
            $product->image_three = 'public/media/product/'.$image_three_name;


            $product->save();
            $notification=array(
            'messege'=>'Successfully Product inserted',
            'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);    
          } 




    }
    public function active($id)
    {
          Product::find($id)->update(['status'=> 1]);
          $notification=array(
            'messege'=>'Successfully Product active',
            'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);  
    }
    public function inactive($id)
    {
      Product::find($id)->update(['status'=> 0]);
      $notification=array(
        'messege'=>'Successfully Product Inactive',
        'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);  
    }
    public function deleteProduct($id)
    {
       $product = Product::find($id);
       $image1 = $product->image_one;
       $image2 = $product->image_two;
       $image3 = $product->image_three;

       unlink( $image1);
       unlink( $image2);
       unlink( $image3);

       Product::destroy($id);
      
       $notification=array(
        'messege'=>'Successfully Product Deleted ',
        'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);  
       
    }

    public function viewProduct($id)
    {
       $product = Product::find($id);

        return view('admin.product.show',compact('product'));
    }

    public function editProduct($id)
    {
              $product = Product::find($id);
              $category = Category::all();
              $subcategory = Subcategory::all();
              $brand       = Brand::all();

              // echo $product->brand->brand_name;

              return view('admin.product.edit',compact('product','category','subcategory','brand'));

    }

    public function updateProduct(Request $request, $id){

        $product = Product::find($id);
        $product->product_name = $request->product_name;
        $product->product_code = $request->product_code;
        $product->product_quantity = $request->product_quantity;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->brand_id = $request->brand_id;
        $product->product_size = $request->product_size;
        $product->product_color = $request->product_color;
        $product->selling_price = $request->selling_price;
        $product->discount_price = $request->discount_price;
        $product->product_details = $request->product_details;
        $product->video_link = $request->video_link;
        $product->main_slider = $request->main_slider;
        $product->hot_deal = $request->hot_deal;
        $product->best_rated = $request->best_rated;
        $product->trend = $request->trend;
        $product->mid_slider = $request->mid_slider;
        $product->hot_new = $request->hot_new;
        $product->buyone_getone = $request->buyone_getone;
        

        //start image section......
        $old_one=$request->old_one;
        $old_two=$request->old_two;
        $old_three=$request->old_three;

        $image_one=$request->image_one;
        $image_two=$request->image_two;
        $image_three=$request->image_three;
        $data=array();

        if($request->has('image_one')) {
           unlink($old_one);
           $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
           Image::make($image_one)->resize(300,300)->save('public/media/product/'.$image_one_name);
           $product->image_one = 'public/media/product/'.$image_one_name;
           $product->update();



            $notification=array(
                     'messege'=>'Successfully Updated',
                     'alert-type'=>'success'
                    );
             return Redirect()->route('all.product')->with($notification);


        }elseif($request->has('image_two')) {
           unlink($old_two);
           $image_two_name= hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
           Image::make($image_two)->resize(230,300)->save('public/media/product/'.$image_two_name);
           $product->image_two = 'public/media/product/'.$image_two_name;
           $product->update();


            $notification=array(
                     'messege'=>'Successfully Updated ',
                     'alert-type'=>'success'
                    );
             return Redirect()->route('all.product')->with($notification);


        }elseif($request->has('image_three')) {
           unlink($old_three);
           $image_three_name= hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
           Image::make($image_three)->resize(230,300)->save('public/media/product/'.$image_three_name);
           $product->image_three = 'public/media/product/'.$image_three_name;
           $product->update();
            $notification=array(
                     'messege'=>'Successfully Updated  ',
                     'alert-type'=>'success'
                    );
             return Redirect()->route('all.product')->with($notification);
        }elseif($request->has('image_one') && $request->has('image_two')){
            
           unlink($old_one);
           $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
           Image::make($image_one)->resize(230,300)->save('public/media/product/'.$image_one_name);
           $product->image_one = 'public/media/product/'.$image_one_name;
           
            
           unlink($old_two); 
           $image_two_name= hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
           Image::make($image_two)->resize(230,300)->save('public/media/product/'.$image_two_name);
           $product->image_two = 'public/media/product/'.$image_two_name;
           $product->update();
           
            $notification=array(
                     'messege'=>'Successfully Updated ',
                     'alert-type'=>'success'
                    );
             return Redirect()->route('all.product')->with($notification);
           


        }elseif($request->has('image_one') && $request->has('image_two') && $request->has('image_three')){
           unlink($old_one);
           unlink($old_two);
           unlink($old_three);
           $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
           Image::make($image_one)->resize(230,300)->save('public/media/product/'.$image_one_name);
           $product->image_one = 'public/media/product/'.$image_one_name;
           
            
           $image_two_name= hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
           Image::make($image_two)->resize(230,300)->save('public/media/product/'.$image_two_name);
           $product->image_two = 'public/media/product/'.$image_two_name;

           $image_three_name= hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
           Image::make($image_three)->resize(230,300)->save('public/media/product/'.$image_three_name);
           $product->image_three = 'public/media/product/'.$image_three_name;
           $product->update();
           
            $notification=array(
                     'messege'=>'Successfully Updated ',
                     'alert-type'=>'success'
                    );
             return Redirect()->route('all.product')->with($notification);
          

        }else{
          $product->update();


          $notification=array(
                   'messege'=>'Successfully Updated ',
                   'alert-type'=>'success'
                  );
           return Redirect()->route('all.product')->with($notification);
        }

        //  return Redirect()->route('all.product');



        // $product->update();
        // $notification=array(
        //   'messege'=>'Successfully Product Updated ',
        //   'alert-type'=>'success'
        //   );
        //   return Redirect()->route('all.product')->with($notification);  
       
        // echo $request->product_name. '---'.$request->product_code. '---'.$request->product_quantity. '---'.$request->category_id. '---';

    }
}
