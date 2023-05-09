
@extends('admin.layouts.admin')
  @section('content')
   <section id="content" class="content">
      <div class="content__header content__boxed rounded-0">
        <div class="content__wrap">

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Departments</a></li>
                    
                </ol>
            </nav>
            <!-- END : Breadcrumb -->

            <h1 class="page-title mb-0 mt-2">@if($role->id) Update Department @else Add Department @endif</h1>
            

            

        </div>

            </div>
  <!-- <section class="main-container col1-layout"> -->
    <div class="content__boxed">
      <div class="content__wrap">
        <div class="card mb-3">
             
          <div class="row">
            <div class="col-md-12 mb-3">
              <div class="card">
                <div class="card-body">

                <form  action="{{ route('admin.department.added') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row form-group">
                        <div class="col-md-4">
                				<label class="">Name</label><br>
                				<input type="text" class="form-control "
                                id="name" name="name" placeholder="Department" value="{{$role->name}}">
                			</div>

                    
                            
                            <div class="col-md-4">
                				<label>Status</label><br>
                				<select class="form-select" name="status" required>
                                    <option value="">Select Status</option>
                                    <option value="active" @if($role->status=="active") selected @endif>active</option>
                                    <option value="in-active" @if($role->status=='in-active') selected @endif>In-active</option>
                                    
                                    
                                    </select> 
                			</div> 
                            
                          <div class="col-sm-4 mb-4 mb-sm-0">
                            <br/>
                            <button type="submit" class="btn btn-primary  btn-block">
                                Add 
                            </button>
                            </div>
                            



                    </div>
                    
    
                </form> 
                  
            
                </div> 
            
              </div> 
            
            </div> 

          </div>  
        

<!--              <div class="text-right">
             </div> -->
          
        </div>
      </div>
    </div>
  <!-- </section> -->
  @include('admin.common.footer')
</section>
  <!--End main-container --> 
  
  <!-- Footer -->
  <!-- End Footer --> 

<!-- JavaScript --> 
@endsection