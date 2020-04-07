<?php

namespace App\Http\Controllers;

use App\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function addwhishlist($id){
        // return 1;
            //  return $id;
            $userid = Auth::id();
            $check = Wishlist::where('user_id', $userid)->where('product_id', $id)->first();
            $data = new Wishlist;
            $data->user_id = $userid;
            $data->product_id = $id;

            if(Auth::check()){
                if($check){
                   return \Response::json(['success' => 'Product already in your wishlist']);

                    // $notification=array(
                    //     'messege'=>'Product already in your wishlist',
                    //     'alert-type'=>'error'
                    //      );
                    //    return Redirect()->back()->with($notification); 
                }else{
                   $data->save(); 
                   return \Response::json(['success' => 'Successfully added']);
                //    alert('tested');
                //    $notification=array(
                //     'messege'=>'Added to your wishlist',
                //     'alert-type'=>'success'
                //      );
                //    return Redirect()->back()->with($notification); 
                }

            }else{
                return \Response::json(['error' => 'At first login your account']);

                // $notification=array(
                //     'messege'=>'At first login your account',
                //     'alert-type'=>'warning'
                //      );
                //    return Redirect()->back()->with($notification); 
            }

    }
}
