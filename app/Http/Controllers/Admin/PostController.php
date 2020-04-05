<?php

namespace App\Http\Controllers\Admin;
use Image;
use App\Model\Admin\Post;
use Illuminate\Http\Request;
use App\Model\Admin\post_category;
use App\Http\Controllers\Controller;

// use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $post = Post::all();  
        return view('admin.blog.index',compact('post'));
    }
    public function create()
    {
        $category = post_category::all();
        // return response()->json($category);
        return view('admin.blog.create', compact('category'));
    }
    public function store(Request $request){
      $post = new Post;
      $post->post_title_en = $request->post_title_en;
      $post->post_title_bn = $request->post_title_bn;
      $post->category_id = $request->category_id;
      $post->details_en = $request->details_en;
      $post->details_bn = $request->details_bn;

    //   $post->save();

    //   return response()->json($post);

    //   $post->save();
    //   echo 'done';

      $image_one = $request->post_image;
      if($image_one){
        $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
        Image::make($image_one)->resize(230,300)->save('public/media/post/'.$image_one_name);
        $post->post_image = 'public/media/post/'.$image_one_name;

        
        $post->save();
        $notification=array(
        'messege'=>'Post Successfully Store',
        'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);    
      }

      else{
          $post->post_image = '';
          $post->save();
          $notification=array(
          'messege'=>'Post Successfully Store',
          'alert-type'=>'success'
          );
          return Redirect()->back()->with($notification);  
      }


    //   return response()->json($request);
    }

    public function edit($id){
        $post_category = post_category::all();
        $post = Post::find($id);
        return view('admin.blog.edit',compact('post','post_category'));

        // dd('edit'. $id);
    }
    public function delete($id){
        // dd('delete'. $id);
        $post = Post::find($id);
        $image1 = $post->post_image;
    //     if(!is_null($image1)){
        unlink( $image1);
    //    }
       
 
        $post::destroy($id);
       
        $notification=array(
         'messege'=>'Successfully Post Deleted ',
         'alert-type'=>'success'
         );
         return Redirect()->back()->with($notification);  
    }
    public function update(Request $request,$id){
        
        // return response()->json($request);
        $old_image = $request->old_image;
        $post = Post::find($id);
        $post->post_title_en = $request->post_title_en;
        $post->post_title_bn = $request->post_title_bn;
        $post->category_id = $request->category_id;
        $post->details_en = $request->details_en;
        $post->details_bn = $request->details_bn;
        $post_image = $request->file('post_image');
        if($post_image){
            unlink($old_image);
            $image_one_name= hexdec(uniqid()).'.'.$post_image->getClientOriginalExtension();
            Image::make($post_image)->resize(230,300)->save('public/media/post/'.$image_one_name);
            $post->post_image = 'public/media/post/'.$image_one_name;
    
            
            $post->update();
            $notification=array(
            'messege'=>'Post Successfully Update',
            'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification); 

        }
        else{
            $post->post_image = $old_image;
            $post->update();
            $notification=array(
            'messege'=>'Post Successfully Update',
            'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification); 
        }


    }
}
