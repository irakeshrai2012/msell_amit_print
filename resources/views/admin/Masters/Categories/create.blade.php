@extends('admin.layouts.admin')
  @section('content')
  <section id="content" class="content">
      <div class="content__header content__boxed rounded-0">
        <div class="content__wrap">

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Categories</a></li>
                    
                </ol>
            </nav>
            <!-- END : Breadcrumb -->

           
            

            

        </div>

    </div>
    <div class="main container">
      <div class="col-main">
        <div class="row">
             <!-- <div class="product-name text-center" style="border-bottom: 1px #ddd dashed;margin-bottom:10px;">
                <h1 style="font-weight:bold;">Add Category
            	</h1>
             </div> -->
<!--              <div class="text-right">
             </div> -->
          <div class="content__boxed">
            <div class="content__wrap">
				<h2 class="mb-3">Add Category</h2>
              <div class="card mb-3 col-md-12">
                <div class="card-body green box">
                  @if (\Session::has('success'))
            <div class="alert alert-success">
                
                    <p>{!! \Session::get('success') !!}</p>
                
            </div>
        @endif

         @if (\Session::has('error'))
            <div class="alert">
                
                    <p class="alert alert-danger text-center"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> {!! \Session::get('error') !!}</p>
                
            </div>
        @endif  
                	<form method="post" enctype='multipart/form-data' action="{{route('categories.store')}}">
                		@csrf
                		<div class="row form-group">
              			<div class="col-md-2">
                				<label class="">Name</label><br>
                				<input type="text" placeholder="Category Name"  required="true" class="form-control input-text required-entry" name="name">
                			</div>
                			<div class="col-md-3">
                				<label>Description</label><br>
                				<textarea  placeholder="Description" class="form-control" name="description" > {{ !empty($data->desc) ? $data->desc :'' }} </textarea>
                			</div>
                			<div class="col-md-3">
                				<label>Parent Cetegory</label><br>
                				<select  name="parent" id="parnet" class="form-select address-select col-md-12" title="">
                					<option value="">Select</option>
                					@if(!empty($categories))
	                					@foreach($categories  as $key => $value)
	                						<option value="{{ $key }}">{{ $value }}</option>
	                					@endforeach
                					@endif
                				</select>
                			</div> 
                      <div style="margin-left: 2%;" class="col-md-3">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">
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
  <!--End main-container --> 
  
  <!-- Footer -->
  <!-- End Footer --> 

<!-- JavaScript --> 
@endsection