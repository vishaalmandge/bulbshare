<!DOCTYPE html>
<html>
   <head>
      <title>Customer</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <style>
         body{
         font-size: 14px !important;
         }
         label {
         display: inline-block;
         margin-bottom: 0.5rem;
         font-weight: 500;
         }
         .pointer {cursor: pointer;}
         .modal-title{
         font-size:18px;
         }
         .form-control{
         height: calc(1.2em + 0.75rem + 0px) !important;
         }
         .address{
         resize:both;
         overflow:auto;
         }
      </style>
   </head>
   <body>
      <div class="col-md-12 mt-4 mb-5">
         <div class="col-md-12">
            <button type="button" class="btn btn-sm btn-primary mb-4" data-toggle="modal" data-target="#add_new_data">Add New</button>
         </div>
         <div class="responsive">
            @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <strong>{{ $message }} </strong> 
            </div>
            @endif
            @if ($message = Session::get('error'))
            <div class="alert alert-warning" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <strong>{{ $message }} </strong> 
            </div>
            @endif
            <table id="example" class="table table-striped table-bordered" style="width:100%">
               <thead>
                  <tr>
                     <th>Id</th>
                     <th>Company</th>
                     <th>Last Name</th>
                     <th>First Name</th>
                     <th>Email Address</th>
                     <th>Job Title</th>
                     <th>Business Phone</th>
                     <th>Address</th>
                     <th>City</th>
                     <th>Zip Postal Code</th>
                     <th>Country Region</th>
                     <th>Orders Total</th>
                     <th>Orders Total Value</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $sr = 1; ?>
                  @foreach ($customers as $cust)
                  <?php 
                     $totalorders = App\Orders::where('customer_id', $cust->id)->count();
                     $totalordervalue = App\Customer::getTotalValue($cust->id);
                      ?>
                  <tr>
                     <td>{{$sr}}</td>
                     <td>{{$cust->company}}</td>
                     <td>{{$cust->last_name}}</td>
                     <td>{{$cust->first_name}}</td>
                     <td>{{$cust->email_address ? $cust->email_address : '--'}}</td>
                     <td>{{$cust->job_title}}</td>
                     <td>{{$cust->business_phone}}</td>
                     <td>{{$cust->address}}</td>
                     <td>{{$cust->city}}</td>
                     <td>{{$cust->zip_postal_code}}</td>
                     <td>{{$cust->country_region}}</td>
                     <td>{{ $totalorders ? $totalorders : '0' }}</td>
                     <td>{{round($totalordervalue, 2)}}</td>
                     <td><a href="javascript:void(0);"
                        data-toggle="tooltip"
                        data-original-title="Edit"
                        class="btn btn-sm edit"
                        data-id="{!! $cust->id !!}"><i
                        class="fa fa-pencil"></i></a>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['customers.destroy', $cust->id],'style' => 'display: inline-block;']) !!}
                        <button type="submit" name="button" class="delete-btn" data-toggle="tooltip" data-placement="top" data-original-title="Delete">
                        <i class="fa fa-close"></i>
                        </button>
                        {!! Form::close() !!}
                     </td>
                  </tr>
                  <?php $sr++; ?>
                  <!-- The Modal -->
                  <div class="modal" id="edit_data{{$cust->id}}">
                     <div class="modal-dialog modal-lg">
                        <div class="modal-content" id="modal-contentorderdetails{{$cust->id}}">
                           <!-- Modal Header -->
                        </div>
                     </div>
                  </div>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
      <div class="modal" id="add_new_data">
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <!-- Modal Header -->
               <div class="modal-header">
                  <h4 class="modal-title">Add New </h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               {!! Form::open(array('url' => 'customers','class'=>'form-group','id'=>'main','novalidate','autocomplete'=>'off')) !!}
               {{ csrf_field() }}
               <!-- Modal body -->
               <div class="modal-body">
                  <div class="row">
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="usrid">Company Name</label>
                           <input type="text" name="company" class="form-control" id="company">
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="Last_Name">Last Name</label>
                           <input type="text" name="last_name" class="form-control" id="Last_Name">
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="First_Name">First Name</label>
                           <input type="text" name="first_name" class="form-control" id="First_Name">
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="Email_Address">Email Address</label>
                           <input type="email" name="email_address" class="form-control" id="Email_Address">
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="Job_Title">Job Title</label>
                           <input type="text" name="job_title" class="form-control" id="Job_Title">
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="mobile_phone">Mobile Phone</label>
                           <input type="text" name="mobile_phone" class="form-control" id="mobile_phone">
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="Business_Phone">Business Phone</label>
                           <input type="text" name="business_phone" class="form-control" id="Business_Phone">
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="Address">Address</label>
                           <textarea class="form-control address" rows="4" id="Address" name="address"></textarea>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="City">City</label>
                           <input type="text" name="city" class="form-control" id="City">
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="Zip_Postal_Code">Zip Postal Code</label>
                           <input type="text" name="zip_postal_code" class="form-control" id="Zip_Postal_Code">
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="Country_Region">Country Region</label>
                           <input type="text" name="country_region"  class="form-control" id="Country_Region">
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Modal footer -->
               <div class="modal-footer">
                  <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-sm btn-primary" >Add</button>
               </div>
               {!! Form::close() !!}
            </div>
         </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
      <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
      <!-- Latest compiled JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <script>
         $(document).ready(function() {
             $('#example').DataTable();
         
         $('body').on('click','.edit',function(){
         
                 var id = $(this).data('id');
         
                 $('#modal-contentorderdetails'+id).load('editcustomerdetails?id=' + id, function () {
                   $('#edit_data'+id).modal('show');
                 });
               });
         
              
         });
         
         
      </script>
   </body>
</html>