<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class post_category extends Model
{
    protected $table = 'post_category';
    protected $guarded= [];

    public function post()
    {
        return $this->hasMany('App\Model\Admin\Post');
        
    }
    
}
