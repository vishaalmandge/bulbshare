<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    //

   protected $table = 'orders';

    protected $fillable = [
    ];

    public function orders()
    {
     return $this->hasMany('App\OrderDetail', 'order_id');
    }


}
