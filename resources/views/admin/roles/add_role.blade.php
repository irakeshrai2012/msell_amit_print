@extends('admin.layouts.admin')
  @section('content')
   <section id="content" class="content">
      <div class="content__header content__boxed rounded-0">
        <div class="content__wrap">

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Roles</a></li>
                    
                </ol>
            </nav>
            <!-- END : Breadcrumb -->

            <h1 class="page-title mb-0 mt-2">@if($role->id) Update Role @else Add Role @endif</h1>
            

            

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

                <form class="user" action="{{ route('admin.role.added') }}" method="POST" enctype="multipart/form-data">
       @csrf
    <br/>
    <div class="form-group row">
        <div class="col-sm-12 mb-3 mb-sm-0">
            <input type="text" class="form-control "
                id="role_name" name="role_name" placeholder="Role title" value="{{$role->role_name}}">
        </div>
        
    </div>  

    <br/>
    <div class="form-group row">
        <div class="col-sm-12 mb-3 mb-sm-0">
             <select class="select2 form-control" name="module[]" placeholder="select Module" multiple>
                  <option value="0">No Access</option>
                  @foreach($modules as $module)
                  <option value="{{$module->id}}">{{$module->page_title}}</option>
                  @endforeach
                  
                </select> 
        </div>
        
    </div> 

    <br/>

    <div class="form-group row">
        <div class="col-sm-12 mb-3 mb-sm-0">
            <label>Action</label>

             <div class="form-group">

            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" name="action[list]" id="list" value="1">
              <label class="form-check-label" for="list">List</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" name="action[add]" id="add" value="1">
              <label class="form-check-label" for="add">Add</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" name="action[edit]" id="edit" value="1">
              <label class="form-check-label" for="edit">Edit</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" name="action[delete]" id="delete" value="1">
              <label class="form-check-label" for="delete">Delete</label>
            </div>

           </div> 
             
        </div>
        
    </div> 
    <br/>
    
    <div class="form-group">
            <select class="form-control" name="status" required>
          <option value="">Select Status</option>
          <option value="active" @if($role->status=="active") selected @endif>active</option>
          <option value="in-active" @if($role->status=='in-active') selected @endif>In-active</option>
          
          
        </select>  
</div>

    

<br/>
    
    <div class="form-group row">
      <br/>
         <div class="col-sm-6 mb-3 mb-sm-0">
            <button type="submit" class="btn btn-primary  btn-block">
                Add 
            </button>
        </div>
        <div class="col-sm-6 mb-3 mb-sm-0">
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