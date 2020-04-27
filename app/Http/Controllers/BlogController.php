<?php

namespace App\Http\Controllers;

use App\Model\Admin\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class BlogController extends Controller
{
    public function blog(){
        $post = Post::all();
        return view('pages.blog',compact('post'));
        // return response()->json($post->category->category_name_en);
    }
    public function Bangla(){
        Session::get('language');
        session()->forget('language');
        Session::put('language','bangla');
        return redirect()->back();
    }
    public function English(){

        Session::get('language');
        session()->forget('language');
        Session::put('language','english');
        return redirect()->back();
    }

}
