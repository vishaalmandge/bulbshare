<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Orders;
use App\OrderDetail;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::latest()->paginate(100);
    
        return view('customer.index',compact('customers'));;

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    } 
    public function editcustomerdetails(Request $request)
    {
        $customer = Customer::find($request->id);

        return view('customer.edit_customer',compact('customer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
        ]);
        $customer = new Customer();
        $customer->company = $request->company;
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email_address = $request->email_address;
        $customer->job_title = $request->job_title;
        $customer->business_phone = $request->business_phone;
        $customer->mobile_phone = $request->mobile_phone;
        $customer->city = $request->city;
        $customer->country_region = $request->country_region;
        $customer->address = $request->address;
        $customer->zip_postal_code = $request->zip_postal_code;
        $customer->save();
    
    
        return redirect()->route('customers.index')
                        ->with('success','Customer added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
        ]);
        $customer = Customer::find($request->customer_id);
        $customer->company = $request->company;
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email_address = $request->email_address;
        $customer->job_title = $request->job_title;
        $customer->business_phone = $request->business_phone;
        $customer->mobile_phone = $request->mobile_phone;
        $customer->city = $request->city;
        $customer->country_region = $request->country_region;
        $customer->address = $request->address;
        $customer->zip_postal_code = $request->zip_postal_code;
        $customer->save();
    
        return redirect()->route('customers.index')
                        ->with('success','Customer updated successfully');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        if(count($customer->orders) > 0){
            return redirect()->route('customers.index')->with('error','Orders exist with this customer.');
        }

        if($customer->delete()) {
            return redirect()->route('customers.index')->with('success','Customer successfully deleted.');
        } 
    }
}
