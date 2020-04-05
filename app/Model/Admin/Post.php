<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $guarded= [];
    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo('App\Model\Admin\post_category');
        
    }
}
