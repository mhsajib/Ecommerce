<?php

namespace App\Http\Controllers\Admin\Category;

use App\Model\Admin\Brand;
use Illuminate\Http\Request;
use App\Model\Admin\Category;
use App\Model\Admin\Subcategory;
use App\Http\Controllers\Controller;



class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function category()
    {
        $category = Category::all();
        // dd($category);

        return view('admin.category.category', compact('category'));
    }

    public function storecategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required|max:255|unique:categories',
            ]);
        $category = new Category;

        $category->category_name = $request->category_name;

        $category->save();

        $notification=array(
            'messege'=>'Category Insert Done',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);

        // echo $request->category_name;
        
    }

    public function DeleteCategory($id){
        Category::find($id)->delete();
        $notification=array(
            'messege'=>'Category Successfully Deleted',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
    }

    public function EditCategory($id)
    {
         $category =   Category::find($id);
         return view('admin.category.edit_category', compact('category'));
    }

    public function UpdateCategory(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required|max:55|unique:categories',
            ]);

            $category = Category::find($id);

            $category->category_name = $request->category_name;
            
           if ($category->update()) {
            $notification=array(
                'messege'=>'Category Successfully Update',
                'alert-type'=>'success'
                 );
                 return Redirect()->route('categories')->with($notification);
           } else {
            $notification=array(
                'messege'=>'Nothing to Update',
                'alert-type'=>'success'
                 );
                 return Redirect()->route('categories')->with($notification);
           }
           

            // $category->save();
    
            // $notification=array(
            //     'messege'=>'Category Insert Done',
            //     'alert-type'=>'success'
            //      );
            //    return Redirect()->back()->with($notification);

        
    }

    public function brand(){
        $brand = Brand::all();
        // dd($brand);

        return view('admin.category.brand', compact('brand'));
    }
    public function storebrand(Request $request){
           $request->validate([
            'brand_name' => 'required|max:55|unique:brands',
           ]);
            
           $brand = new Brand;
           $brand->brand_name = $request->brand_name;

           $image = $request->file('brand_logo');
           if($image)
           {
               $image_name = date('dmy_H_s_i');
               $ext = strtolower($image->getClientOriginalExtension());
               $image_full_name = $image_name.'.'.$ext;
               $upload_path = 'public/media/brand/';
               $image_url = $upload_path.$image_full_name;
               $success = $image->move($upload_path, $image_full_name);
               
               $brand->brand_logo = $image_url;
               $brand->save();
               $notification=array(
                'messege'=>'Done',
                'alert-type'=>'success'
                 );
                 return Redirect()->back()->with($notification);
               
           } else{
               $brand->save();
               $notification=array(
                'messege'=>'Done',
                'alert-type'=>'success'
                 );
                 return Redirect()->back()->with($notification);
           }
        
    }

    public function DeleteBrand($id)
    {
      $brand = Brand::find($id);
      $image = $brand->brand_logo;
      unlink($image); //have to change
      $brand->delete();
      $notification=array(
        'messege'=>'Successfully Brand Deleted',
        'alert-type'=>'success'
         );
         return Redirect()->back()->with($notification);

    }

    public function EditBrand($id)
    {
        $brand = Brand::find($id);
        return view('admin.category.edit_brand',compact('brand'));
    }

    public function UpdateBrand(Request $request, $id)
    {   
        $oldlogo = $request->old_logo;
        $brand = Brand::find($id);
        $brand->brand_name = $request->brand_name;

        $image = $request->file('brand_logo');
        if($image)
        {
            unlink($oldlogo);
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/media/brand/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            
            $brand->brand_logo = $image_url;
            $brand->save();
            $notification=array(
             'messege'=>'Successfully Brand Updated',
             'alert-type'=>'success'
              );
              return Redirect()->route('brands')->with($notification);
            
        } else{
            $brand->save();
            $notification=array(
             'messege'=>'Update without image',
             'alert-type'=>'success'
              );
              return Redirect()->route('brands')->with($notification);
        }
     
    }

    public function subcategories()
    {   
        $category = Category::all();
        $subcategory = Subcategory::all();
        return view('admin.category.subcategory', compact('subcategory','category'));
        // foreach($subcategory as $row)
        // {
        //     echo $row->category->category_name;
        // }
        // $category = Category::all()->subcategories;
        // dd($subcategory->category->name);
    }
    public function storesubcategory(Request $request){
          $request->validate([
              'category_id' => 'required',
              'subcategory_name' => 'required|unique:subcategories'
          ]);

          $subcategory = new Subcategory;
          $subcategory->category_id = $request->category_id;
          $subcategory->subcategory_name = $request->subcategory_name;
          $subcategory->save();
          $notification=array(
            'messege'=>'subcategory Inserted',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);

    }

    public function DeletesubCategory($id)
    {
        Subcategory::findorfail($id)->delete();
        $notification=array(
            'messege'=>'subcategory Inserted',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);

    }
    public function EditsubCategory($id)
    {
          $subcategory = Subcategory::find($id);
        //   echo $subcategory;
          $category  = Category::all();
          return view('admin.category.edit_subcategory',compact('subcategory','category'));
    }

    public function UpdatesubCategory(Request $request, $id){
          
        $subcategory = Subcategory::find($id);
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->category_id = $request->category_id;

        $subcategory->update();

        $notification=array(
            'messege'=>'subcategory update',
            'alert-type'=>'success'
             );
           return Redirect()->route('sub.categories')->with($notification);


          
    }

}
