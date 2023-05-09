@extends('admin.layouts.admin')
  @section('content')

  <style type="text/css">
    .razorpay-payment-button{
        height: 50px;
        width:80px;
        margin-left: 45%;
        margin-top: 14%;
    }
</style>
  <section id="content" class="content">
      <div class="content__header content__boxed rounded-0">
        <div class="content__wrap">

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Wallet Balance</a></li>
                    
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
				<h2 class="mb-3">Add Wallet Balance</h2>
              <div class="card mb-3 col-md-12">
                <div class="card-body green box">
                	<form action="{{url('manual_wallet_balace')}}" method="POST">
                    @csrf
                    
                        <div class="row mt-3">
                            
                                
                                <div class="form-group col-md-4">
                                    <label  class="form-label">User</label><br>
                                    <select name="user" class="form-select">
                                        <option value="">Select</option>
                                        @if(!empty($users))
                                            @foreach($users as $key=> $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="col-md-4 form-group">
                                    <label  class="form-label text-center">Amount</label><br>
                                    <input type="text" name="amount" class="form-control input-text required-entry col-md-12">
                                </div>
                                <br/>
                                <div class="col-md-4 form-group"> 
                                    <br/>
                                    <button class=" btn btn-primary" type="submit">ADD</button>               
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