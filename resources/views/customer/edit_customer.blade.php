{{ Form::model($customer, array('route' => array('customers.update', $customer->id), 'method' => 'PUT','id'=>'main','class'=>'form-group','autocomplete'=>'off')) }}
{{ csrf_field() }}
<div class="modal-header">
   <h4 class="modal-title">Edit</h4>
   <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
   <div class="row">
      <div class="col-md-4">
         <div class="form-group">
            <label for="usrid">Company Name</label>
            <input type="hidden" name="customer_id" class="form-control" id="customer_id" value="{{$customer->id}}">
            <input type="text" name="company" class="form-control" id="company" value="{{$customer->company}}">
         </div>
      </div>
      <div class="col-md-4">
         <div class="form-group">
            <label for="Last_Name">Last Name</label>
            <input type="text" name="last_name" class="form-control" id="Last_Name" value="{{$customer->last_name}}">
         </div>
      </div>
      <div class="col-md-4">
         <div class="form-group">
            <label for="First_Name">First Name</label>
            <input type="text" name="first_name" class="form-control" id="First_Name" value="{{$customer->first_name}}">
         </div>
      </div>
      <div class="col-md-4">
         <div class="form-group">
            <label for="Email_Address">Email Address</label>
            <input type="email" name="email_address" class="form-control" id="Email_Address" value="{{$customer->email_address}}" >
         </div>
      </div>
      <div class="col-md-4">
         <div class="form-group">
            <label for="Job_Title">Job Title</label>
            <input type="text" name="job_title" class="form-control" id="Job_Title"  value="{{$customer->job_title}}">
         </div>
      </div>
      <div class="col-md-4">
         <div class="form-group">
            <label for="mobile_phone">Mobile Phone</label>
            <input type="text" name="mobile_phone" class="form-control" id="mobile_phone" value="{{$customer->mobile_phone}}">
         </div>
      </div>
      <div class="col-md-4">
         <div class="form-group">
            <label for="Business_Phone">Business Phone</label>
            <input type="text" name="business_phone" class="form-control" id="Business_Phone" value="{{$customer->business_phone}}">
         </div>
      </div>
      <div class="col-md-4">
         <div class="form-group">
            <label for="Address">Address</label>
            <textarea class="form-control address" rows="4" id="Address" name="address">{{$customer->address}}</textarea>
         </div>
      </div>
      <div class="col-md-4">
         <div class="form-group">
            <label for="City">City</label>
            <input type="text" name="city" class="form-control" id="City" value="{{$customer->city}}">
         </div>
      </div>
      <div class="col-md-4">
         <div class="form-group">
            <label for="Zip_Postal_Code">Zip Postal Code</label>
            <input type="text" name="zip_postal_code" class="form-control" id="Zip_Postal_Code" value="{{$customer->zip_postal_code}}">
         </div>
      </div>
      <div class="col-md-4">
         <div class="form-group">
            <label for="Country_Region">Country Region</label>
            <input type="text" name="country_region"  class="form-control" id="Country_Region" value="{{$customer->country_region}}">
         </div>
      </div>
      <!--    <div class="col-md-4">
         <div class="form-group">
             <label for="Orders_Total">Orders Total</label>
             <input type="text" class="form-control" id="Orders_Total" name="">
         </div>
         </div>
         <div class="col-md-4">
         <div class="form-group">
             <label for="Orders_Total_Value">Orders Total Value</label>
             <input type="text" class="form-control" id="Orders_Total_Value">
         </div>
         </div> -->
   </div>
</div>
<!-- Modal footer -->
<div class="modal-footer">
   <button type="submit" class="btn btn-sm btn-primary">Update</button>
   <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
</div>
{!! Form::close() !!}