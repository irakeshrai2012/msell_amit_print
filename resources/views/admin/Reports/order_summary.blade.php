@extends('admin.layouts.admin')
  @section('content')
   <section id="content" class="content">
      <div class="content__header content__boxed rounded-0">
        <div class="content__wrap">

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">All Orders</a></li>
                    
                </ol>
            </nav>
            <!-- END : Breadcrumb -->

            <h1 class="page-title mb-0 mt-2">All Orders</h1>
            

            

        </div>

            </div>
  <!-- <section class="main-container col1-layout"> -->
    <div class="content__boxed">
      <div class="content__wrap">
        <div class="card mb-3">
             <div class="card-body" >
              <!-- <div class="mb-3">
                <h2 class="mb-0 mt-2">
                  <a href="{{url('products/create')}}"><button class="btn btn-primary" style="float: right;">Add New</button></a></h2>
              </div>     -->
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
                 <table class="table table-bordered table-hover table-striped">
                  <thead style="height: 50px;">
                    <tr style="color:#fff;">
                     <th>S.no</th>
                      <th scope="col">Order No.</th>
                      <th scope="col">Date</th>
                      <th scope="col">Party Name</th>
                      <th scope="col">Value</th>
                      <th scope="col">Tax</th>
                      <th scope="col">Total</th>
                      <th scope="col">Order Status</th>
                      <th scope="col">Images</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(!empty($data))
                        @foreach($data as $key => $value)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <th> {{ !empty($value->reference) ? $value->reference : '' }} </th>
                                <td> {{ !empty($value->created_at) ? date('d-m-Y' , strtotime($value->created_at)) : '' }} </td>
                                <td> {{ !empty($value->party_name) ? $value->party_name : '' }} </td>
                                <td> {{ !empty($value->amount_without_tax   ) ? $value->amount_without_tax   : '' }} </td>
                                <th> {{ !empty($value->tax) ? $value->tax : '' }} </th>
                                <th>  {{ !empty($value->value) ? $value->value : '' }} </th>
                                <th>  {{ !empty($value->approved) ? 'Approved' : 'Awaiting Order Approval' }} </th>

                                <th> 
                                  @if($value->product_images)
                                   <form action="/download" method="post">
                                        @csrf
                                        @foreach (json_decode($value->product_images) as $filePath)
                                          <label>
                                            <input type="checkbox" name="files[]" value="{{ $filePath }}">
                                            {{ basename($filePath) }}
                                          </label><br>
                                        @endforeach
                                        <button type="submit">Download</button>
                                      </form>
                                    @endif  
                                  </th>

                                <td style="display: flex;;">
                          <a href="{{url('orders/view' , encrypt($value->id))}}" class="btn btn-success" style="height: 25px;display: flex;align-items: center;font-size: 13px;justify-content:center;width: 90px;margin-right: 5px;margin-left: 5px;">Details</a>
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
  @include('admin.common.footer')
</section>
  <!--End main-container --> 
  
  <!-- Footer -->
  <!-- End Footer --> 

<!-- JavaScript --> 
@endsection