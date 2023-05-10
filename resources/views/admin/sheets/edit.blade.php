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
                     
                     <li class="breadcrumb-item"><a href="#">Update Sheet</a></li>
                    
                </ol>
            </nav>
            <!-- END : Breadcrumb -->
        </div>

    </div>
    <div class="content__boxed main container">
      <div class="content__wrap col-main">
        <div class="row">
        <h5>Update Sheet</h5>
          <div class="card product-view wow bounceInUp animated">
            <div class="card-body product-essential">
              <div class="col-md-12">
                <div class="green box">
                	<form method="post" enctype='multipart/form-data' action="{{route('admin.sheet.update',['id'=>$sheet->id])}}">
                		@csrf
                		<div class="row form-group">
                            

                			<div class="col-md-3">
                                <br>
                				<label class="">Date</label><br>
                				<input type="text" placeholder="User Name" required="true" class="form-control input-text required-entry" name="name" value="{{$sheet->date}}">
                			</div>
                			  
                            <div class="col-md-3">
                                <br>
                				<label>Time</label><br>
                				<input placeholder="Email" required="true" class="form-control input-text required-entry" name="email" value="{{$sheet->time}}">
                			</div>  

                            <div class="col-md-3">
                                <br>
                				<label>sheet_type</label><br>
                				<input  name="sheet_type" Placehoder="sheet_type"  class="form-control input-text required-entry" required="true" title="" value="{{$sheet->sheet_type}}">

                        <select  name="sheet_type" class="form-select address-select col-md-12" title="">
                					<option value="">Select Sheet Type</option>
                          @foreach($categories as $category)

                          <option value="{{$category->name}}" @if($sheet->sheet_type==$category->name) selected @endif>{{$category->name}}</option>

                          @endforeach
                          
                					
                				</select>
                			</div>
                            
                            <div class="col-md-2">
                                <br>
                				<label>sheet_no</label><br>
                				<input placeholder="sheet_no" required="true" class="form-control input-text required-entry" name="sheet_no" value="{{$sheet->sheet_no}}">
                			</div>

                            <div class="col-md-3">
                                <br>
                				<label>remark</label><br>
                				<input placeholder="remark" required="true" class="form-control input-text required-entry" name="remark"  value="{{$sheet->remark}}">
                			</div>
                			
                			
                			<div class="col-md-3">
                                <br>
                				<label>Status</label><br>
                				<select  name="status" class="form-select address-select col-md-12" title="">
                					<option value="">Select</option>
                                    <option value="1"  @if($sheet->status==1) selected @endif>Active</option>
                                    <option value="0"  @if($sheet->status==0) selected @endif>In-Active</option>
                					
                				</select>
                			</div> 
                            
                            <div class="col-md-3">
                				<br>
                                <br>
                				<button type="submit" class="btn btn-primary">
                					update
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