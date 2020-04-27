<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{
    public function products()
    {
        // $test = User::all();
        return $this->hasMany('App\Model\Admin\User');
    }
}
