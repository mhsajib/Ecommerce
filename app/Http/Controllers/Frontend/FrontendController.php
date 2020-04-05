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
        $category = Category::all();
        return view('pages.index', compact('featured','trend','best_rated','category','midslider'));
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
