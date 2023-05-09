@extends('admin.layouts.admin')
  @section('content')  
  <section id="content" class="content">
	<div class="content__header content__boxed rounded-0">
        <div class="content__wrap">

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Job</a></li>
                    
                     <li class="breadcrumb-item"><a href="#">Update Job</a></li>
                    
                </ol>
            </nav>
            <!-- END : Breadcrumb -->
        </div>

    </div>
    <div class="content__boxed main container">
      <div class="content__wrap col-main">
        <div class="row">
        <h5>Update Job</h5>
          <div class="card product-view wow bounceInUp animated">
            <div class="card-body product-essential">
              <div class="col-md-12">
                <div class="green box">
                	<form method="post" enctype='multipart/form-data' action="{{route('admin.job.update',['id'=>$sheet->id])}}">
                		@csrf
                		<div class="row form-group">
                            <div class="col-md-3">
                                <br>
                				<label>Name</label><br>
                				<input placeholder="Sheet Type" required="true" class="form-control input-text required-entry" name="name" value="{{$sheet->name}}">
                			</div>  

                			<div class="col-md-3">
                                <br>
                				<label>Status</label><br>
                				<select  name="status" class="form-select address-select col-md-12" title="">
                					<option value="">Select</option>
                                    <option value="active" @if($sheet->status=="active") selected @endif>Active</option>
                                    <option value="in-active" @if($sheet->status=="in-active") selected @endif>In-Active</option>
                					
                				</select>
                			</div> 
                            
                            <div class="col-md-3">
                				<br><br>
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