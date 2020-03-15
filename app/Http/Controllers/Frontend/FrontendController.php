<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Model\Admin\Newslaters;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
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
