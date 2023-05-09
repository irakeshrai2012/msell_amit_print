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

            <h1 class="page-title mb-0 mt-2">Departments</h1>
            

            

        </div>

            </div>
  <!-- <section class="main-container col1-layout"> -->
    @php //$actions=explode(",",get_module_action(Auth::user()->type,'Module')->action); @endphp
    <div class="content__boxed">
      <div class="content__wrap">
        <div class="card mb-3">
             <div class="card-body" >
              <div class="mb-3">
                <h2 class="mb-0 mt-2">
                  <a href="{{url('admin/department/add')}}"><button class="btn btn-primary" style="float: right;">Add New</button></a></h2>
              </div>    
        </div>
          <div class="row">
            <div class="col-md-12 mb-3">
              <div class="card">
                <div class="card-body">
                  <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                <thead>
                    <tr role="row">
                        <th >#</th>
                        <th >Department</th>
                        <th >Status</th>
                        <th >Actions</th>
                    </tr>
                </thead>
                
                <tbody>
                 @php $i=0; @endphp   
                @foreach($roles as $role)
                    <tr class="odd">
                        <td class="sorting_1">{{++$i}}</td>
                         <td>{{$role->name}}</td>
                        <td>{{$role->status}}

                        </td>
                       
        
                        
                        <td><a href="{{url('admin/department/edit/'.$role->id)}}" class="btn btn-info">Edit</a>&nbsp;<a href="{{url('admin/role/delete/'.$role->id)}}" class="btn btn-danger" onclick="return confirm(' you want to delete?');"> Delete</a></td>
                    </tr>
                @endforeach    
                </tbody>
            </table>
            
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
</section>
  <!--End main-container --> 
  
  <!-- Footer -->
  <!-- End Footer --> 

<!-- JavaScript --> 
@endsection