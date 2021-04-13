<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    //

   protected $table = 'order_details';

    protected $fillable = [
    	'order_id','product_id','quantity','unit_price'
    ];
    public function orders()
    {
     return $this->hasMany('App\OrderDetail', 'order_id');
    }


}
