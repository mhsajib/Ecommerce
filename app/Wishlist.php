<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    public $timestamps = false;
    
    public function products()
    {
        return $this->hasMany('App\Model\Admin\Product','id');
    }
}
