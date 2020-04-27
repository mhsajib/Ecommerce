<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user()
    {
        // $test = User::all();
        return $this->belongsTo('App\User');
    }
}
