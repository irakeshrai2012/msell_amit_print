@extends('admin.layouts.admin')
  @section('content')  
  <section id="content" class="content">
	<div class="content__header content__boxed rounded-0">
        <div class="content__wrap">

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Customers</a></li>
                     <li class="breadcrumb-item"><a href="#">Customer</a></li>
                     <li class="breadcrumb-item"><a href="#">Add Customer</a></li>
                    
                </ol>
            </nav>
            <!-- END : Breadcrumb -->
        </div>

    </div>
    <div class="content__boxed main container">
      <div class="content__wrap col-main">
        <div class="row">
        <h5>Add Customer</h5>
          <div class="card product-view wow bounceInUp animated">
            <div class="card-body product-essential">
              <div class="col-md-12">
                <div class="green box">
                	<form method="post" enctype='multipart/form-data' action="{{route('admin.customer.added')}}">
                		@csrf
                		<div class="row form-group">
                           

                			<div class="col-md-3">
                                <br>
                				<label class="">Name</label><br>
                				<input type="text" placeholder="User Name" required="true" class="form-control input-text required-entry" name="name">
                			</div>
                			  
                            <div class="col-md-3">
                                <br>
                				<label>Email (Username)</label><br>
                				<input placeholder="Email" required="true" class="form-control input-text required-entry" name="email">
                			</div>  

                            <div class="col-md-3">
                                <br>
                				<label>Phone</label><br>
                				<input  name="phone" Placehoder="Phone Number"  class="form-control input-text required-entry" required="true" title="">
                			</div>
                            
                            <div class="col-md-2">
                                <br>
                				<label>Business Name</label><br>
                				<input placeholder="Business Name" required="true" class="form-control input-text required-entry" name="business_name">
                			</div>

                            <div class="col-md-3">
                                <br>
                				<label>Business Address</label><br>
                				<input placeholder="Business Address" required="true" class="form-control input-text required-entry" name="business_address">
                			</div>

                            <div class="col-md-3">
                                <br>
                				<label>GST NO </label><br>
                				<input placeholder="GST NO" required="true" class="form-control input-text required-entry" name="gst">
                			</div>

                             <div class="col-md-3">
                                <br>
                				<label>PAN NO</label><br>
                				<input placeholder="PAN NO" required="true" class="form-control input-text required-entry" name="pan">
                			</div>
                			<div class="col-md-3">
                                <br>
                				<label>Password</label><br>
                				<input type="password" name="password" Placehoder="Password"  class="form-control input-text required-entry" required="true" title="">
                			</div>
                			
                			<div class="col-md-3">
                                <br>
                				<label>Status</label><br>
                				<select  name="type" class="form-select address-select col-md-12" title="">
                					<option value="">Select</option>
                                    <option value="active">Active</option>
                                    <option value="in-active">In-Active</option>
                					
                				</select>
                			</div> 
                            
                            <div class="col-md-3">
                				<br>
                         <br>
                				<button type="submit" class="btn btn-primary">
                					Create
                				</button>
                			</div> 
                            
                		</div>
                		
                	</form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
	@include('admin.common.footer')
  </section>
@endsection