@extends('admin.layouts.admin')
  @section('content')  
  <section id="content" class="content">
	<div class="content__header content__boxed rounded-0">
        <div class="content__wrap">

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Sheets</a></li>
                    
                     <li class="breadcrumb-item"><a href="#">Add Sheet</a></li>
                    
                </ol>
            </nav>
            <!-- END : Breadcrumb -->
        </div>

    </div>
    <div class="content__boxed main container">
      <div class="content__wrap col-main">
        <div class="row">
        <h5>Add Sheet</h5>
          <div class="card product-view wow bounceInUp animated">
            <div class="card-body product-essential">
              <div class="col-md-12">
                <div class="green box">
                	<form method="post" enctype='multipart/form-data' action="{{route('admin.sheet.added')}}">
                		@csrf
                		<div class="row form-group">
                            <div class="col-md-2">
                                <br>
                				<label>Date</label><br>
                				<input type="date" placeholder="Date" required="true" class="form-control input-text required-entry" name="date" min="{{date('YYYY-mm-dd')}}">
                			</div>

                			<div class="col-md-3">
                                <br>
                				<label class="">Time</label><br>
                				<input type="time" placeholder="time" required="true" class="form-control input-text required-entry" name="time" value="{{date('hh:ii:ss')}}">
                			</div>
                			  
                            <div class="col-md-3">
                                <br>
                				<label>Sheet Type</label><br>
                				
                			  
                        <select  name="sheet_type" class="form-select address-select col-md-12" title="">
                					<option value="">Select Sheet Type</option>
                          @foreach($categories as $category)

                          <option value="{{$category->id}}" >{{$category->name}}</option>

                          @endforeach
                          
                					
                				</select>  
                      
                      </div>  

                            <div class="col-md-3">
                                <br>
                				<label>Sheet No</label><br>
                				<input type="text" name="sheet_no" placeholder="Sheet No"  class="form-control input-text required-entry" required="true" >
                			</div>
                            
                            <div class="col-md-2">
                                <br>
                				<label>Remarks</label><br>
                				<input placeholder="remark" required="true" class="form-control input-text required-entry" name="remark">
                			</div>

                            
                			
                			<div class="col-md-3">
                                <br>
                				<label>Status</label><br>
                				<select  name="status" class="form-select address-select col-md-12" title="">
                					<option value="">Select</option>
                                    <option value="active">Active</option>
                                    <option value="in-active">In-Active</option>
                					
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