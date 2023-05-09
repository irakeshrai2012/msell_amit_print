@extends('admin.layouts.admin')
  @section('content')  
  <section id="content" class="content">
	<div class="content__header content__boxed rounded-0">
        <div class="content__wrap">

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Users</a></li>
                     <li class="breadcrumb-item"><a href="#">User</a></li>
                     <li class="breadcrumb-item"><a href="#">Add User</a></li>
                    
                </ol>
            </nav>
            <!-- END : Breadcrumb -->
        </div>

    </div>
    <div class="content__boxed main container">
      <div class="content__wrap col-main">
        <div class="row">
             
                <h5>Add Users
            	</h5>
            

          <div class="card product-view wow bounceInUp animated">
            <div class="card-body product-essential">
              <div class="col-md-12">
                <div class="green box">
                	<form method="post" enctype='multipart/form-data' action="{{route('Users.store')}}">
                		@csrf
                		<div class="row form-group">
                			<div class="col-md-2">
                				<label class="">Name</label><br>
                				<input type="text" placeholder="User Name" required="true" class="form-control input-text required-entry" name="name">
                			</div>
                			<div class="col-md-3">
                				<label>Email (Username)</label><br>
                				<input placeholder="Email" required="true" class="form-control input-text required-entry" name="email">
                			</div>       
                			<div class="col-md-3">
                				<label>Password</label><br>
                				<input  name="password" Placehoder="Password"  class="form-control input-text required-entry" required="true" title="">
                			</div>
                			<div class="col-md-3">
                				<label>Phone</label><br>
                				<input  name="phone" Placehoder="Phone Number"  class="form-control input-text required-entry" required="true" title="">
                			</div>
                			<div class="col-md-3">
                				<label>User Type</label><br>
                				<select  name="type" class="form-select address-select col-md-12" title="">
                					<option value="">Select</option>
                					@if(!empty($usertypes))
	                					@foreach($usertypes  as $key => $value)
	                						<option value="{{ $key }}">{{ $value }}</option>
	                					@endforeach
                					@endif
                				</select>
                			</div>                			
                		</div>
                		<div class="row">
                			<div class="col-md-12 text-right">
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