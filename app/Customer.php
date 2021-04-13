<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\OrderDetail;

class Customer extends Model
{
    //

   protected $table = 'customers';
   protected $primaryKey = "id"; // default it look for id

    protected $fillable = [
        'company','last_name','first_name','email_address','job_title','business_phone','mobile_phone','city','country_region','address','zip_postal_code'
    ];


    public function orders()
    {
        return $this->hasMany(Orders::class,'customer_id','id');
    }



    public static function getTotalValue($id)
    {
    	$order = Customer::select('customers.id','orders.id as orderId')
            ->Join('orders', 'orders.customer_id', '=', 'customers.id') 
            ->where('customers.id', $id)
            ->get();
			$sum = 0;

			foreach($order as $or)
			{
			$details = OrderDetail::where('order_id', $or->orderId)->get();
			foreach($details as $de)
			{
				$sum += $de->unit_price * $de->quantity;

			}
			}
			return $sum;
    }


}
