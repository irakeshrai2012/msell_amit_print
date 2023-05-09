@extends('admin.layouts.admin')
  @section('content')
   <section id="content" class="content">
      <div class="content__header content__boxed rounded-0">
        <div class="content__wrap">

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Tax Master</a></li>
                    
                </ol>
            </nav>
            <!-- END : Breadcrumb -->

            <h1 class="page-title mb-0 mt-2">Tax Master</h1>
            

            

        </div>

            </div>
  <!-- <section class="main-container col1-layout"> -->
    <div class="content__boxed">
      <div class="content__wrap">
        <div class="card mb-3">
             <div class="card-body" >
              <div class="mb-3">
                <h2 class="mb-0 mt-2">
                  <a href="{{url('Tax-Master/create')}}"><button class="btn btn-primary" style="float: right;">Add New</button></a></h2>
              </div>    
        </div>
          <div class="row">
            <div class="col-md-12 mb-3">
              <div class="card">
                <div class="card-body">

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
                  <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th scope="col">S.no </th>
                              <th scope="col">Tax percent</th>
                              <th scope="col">Edit</th>
                              <th scope="col">View</th>
                              <th scope="col">Delete</th>
                            </tr>
                          </thead>
                          <tbody>
                            @if(!empty($data))
                              @foreach($data as $key => $value)
                                @php
                                  $encrypted_id = encrypt($value->id);
                                @endphp
                                <tr>
                                  <td> {{ $key + 1 }} </td>
                                  <td> {{ $value->tax_per }} </td>
                                  <td> <a class="btn btn-success" href="{{route('Tax-Master.edit' , $encrypted_id)}}">Edit</a> </td>
                                  <td> <a class="btn btn-info" href="{{route('Tax-Master.edit' , $encrypted_id)}}">View</a> </td>
                                  <td>
                                      <a class="btn btn-danger" href="{{url('tax_master_delete' , $encrypted_id)}}" onclick="return confirm(' you want to delete?');">Delete</a>
                                  </td>
                                </tr>
                                @endforeach
                            @endif 
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