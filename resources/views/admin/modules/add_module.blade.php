@extends('admin.layouts.admin')
  @section('content')
  <section id="content" class="content">
      <div class="content__header content__boxed rounded-0">
        <div class="content__wrap">

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Modules</a></li>
                    <li class="breadcrumb-item"><a href="#">Add Module</a></li>
                    
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
				<h2 class="mb-3"> @if($module->id) Update Module @else Add Module @endif</h2>
              <div class="card mb-3 col-md-12">
                <div class="card-body green box">
                    <form class="user" action="{{ route('admin.module.added') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label>Menu title</label>
                                    <input type="text" class="form-control "
                                        id="page_title" name="page_title" placeholder="title" value="{{$module->page_title}}">
                                </div>
                                <div class="col-sm-4">
                                    <label>Action</label>
                                    <input type="text" class="form-control"
                                        id="url" name="url" placeholder="url" value="{{$module->url}}">
                                </div>

                                <div class="col-sm-4">
                                    <label>Status</label>
                                <select class="form-control" name="status">
                                <option>Select Status</option>
                                <option value="active" @if($module->status=="active") selected @endif>active</option>
                                <option value="in-active" @if($module->status=='in-active') selected @endif>In-active</option>
                                
                                
                                </select> 
                                </div>
                            </div>   

                            <br/>
                           
                            
                            <div class="form-group row">
                                <br/>
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <button type="submit" class="btn btn-primary  btn-block">
                                        Add 
                                    </button>
                                
                                    <button type="reset" class="btn btn-info btn-block">
                                        Reset
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