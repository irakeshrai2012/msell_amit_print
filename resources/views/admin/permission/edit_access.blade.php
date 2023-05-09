
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
                    <li class="breadcrumb-item"><a href="#">Update Module Access</a></li>
                    
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
				<h2 class="mb-3"> @if($access->id) Update  Access @else Add New Access @endif</h2>
              <div class="card mb-3 col-md-12">
                <div class="card-body green box">

                    <form class="user" action="{{ route('admin.module_access.update',['id'=>$access->id]) }}" method="POST" enctype="multipart/form-data">
       @csrf

    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <label>Role</label>
            <select class="form-control" name="role_id" placeholder="select Role">
            @foreach($roles as $role)
              <option value="{{$role->id}}" @if($role->id==$access->role_id) selected @endif>{{$role->role_name}}</option>
              @endforeach
            </select>  
        </div>
        <div class="col-sm-6">
            <label>Module</label>
            <select class="select2 form-control" name="module" placeholder="select Module" readonly>
            @foreach($modules as $module)
              <option value="{{$module->id}}" @if($module->id==$access->module_id) selected @endif>{{$module->page_title}}</option>
              @endforeach
            </select>  
        </div>
    </div>  

    @php $actions=explode(",",$access->action);  @endphp
    <div class="form-group row">
        <div class="col-sm-12 mb-3 mb-sm-0">
            <label>Action</label>
             <div class="form-group">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" name="action[list]" id="list" value="1" @if(in_array('list',$actions)) checked @endif>
              <label class="form-check-label" for="list">List</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" name="action[add]" id="add" value="1" @if(in_array('add',$actions)) checked @endif>
              <label class="form-check-label" for="add">Add</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" name="action[edit]" id="edit" value="1" @if(in_array('edit',$actions)) checked @endif>
              <label class="form-check-label" for="edit">Edit</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" name="action[delete]" id="delete" value="1" @if(in_array('delete',$actions)) checked @endif>
              <label class="form-check-label" for="delete">Delete</label>
            </div>

            

           </div> 
             
        </div>
        
    </div>  

    
    <div class="form-group">
            <label>Status</label>
        <select class="form-control" name="status">
          <option>Select Status</option>
          <option value="active" @if($access->status=="active") selected @endif>active</option>
          <option value="in-active" @if($access->status=='in-active') selected @endif>In-active</option>
          
          
        </select>  
</div>

    


    
    <div class="form-group row">
         <div class="col-sm-6 mb-3 mb-sm-0">
            <button type="submit" class="btn btn-primary  btn-block">
                Update 
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