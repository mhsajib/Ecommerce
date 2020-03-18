<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded= [];

    public function brand()
    {
        return $this->belongsTo('App\Model\Admin\Brand');
    }

    public function category()
    {
        return $this->belongsTo('App\Model\Admin\Category');
    }
    
    public function subcategory()
    {
        return $this->belongsTo('App\Model\Admin\Subcategory');
    }


}
