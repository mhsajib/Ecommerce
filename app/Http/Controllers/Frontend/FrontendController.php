<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Admin\Product;
use Illuminate\Http\Request;
use App\Model\Admin\Category;
use App\Model\Admin\Newslaters;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{

    public function index(){
        $featured = Product::where('status',1)->orderBy('id', 'desc')->limit(24)->get();
        $trend = Product::where('status',1)->where('trend',1)->orderBy('id', 'desc')->limit(24)->get();
        $best_rated = Product::where('status',1)->where('best_rated',1)->orderBy('id', 'desc')->limit(24)->get();
        $midslider = Product::where('status',1)->where('mid_slider',1)->orderBy('id', 'desc')->limit(4)->get();
        // category query
        $electronics = Category::skip(4)->first();
        $id = $electronics->id;
        $electronics_products = Product::where('category_id',$id)->where('status',1)->limit(16)->orderBy('id','desc')->get();
        

        // category query


        // buyget
        $buyget = Product::where('status', 1)->where('buyone_getone',1)->orderBy('id', 'desc')->limit(12)->get();
        // echo $buyget;
        //end buyget
        $category = Category::all();
        // echo $electronics->products->first();
        return view('pages.index', compact('featured','trend','best_rated','category','midslider','electronics','electronics_products','buyget'));
    }

    public function storenewsletter(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:newslaters|max:60',
        ]);

        $newslater = new Newslaters;
        $newslater->email = $request->email;
        $newslater->save();
        $notification=array(
            'messege'=>'Thanks for Subscribing',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
        // echo $request->email;

    }
}
