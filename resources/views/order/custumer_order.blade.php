@extends('layouts.lander')
  @section('content')
 
  <section class="main-container col1-layout">
    <div class="main container">
      <div class="col-main">
        <div class="row">
            <div class="col-md-12">
             <div class="product-name text-center" style="margin-bottom:10px;">
                <h1 style="font-weight:bold;">All Orders</h1>
             </div>
            </div>
            <div class="row">
        
              <table class="table table-bordered table-hover table-striped">
                  <thead style="height: 50px;">
                    <tr style="background:black;color:#fff;">
                      <th>S.no</th>
                      <th scope="col">Order No.</th>
                      <th scope="col">Date</th>
                      <th scope="col">Party Name</th>
                      <th scope="col">Value</th>
                      <th scope="col">Tax</th>
                      <th scope="col">Total</th>
                      <!-- <th scope="col">Current Status</th> -->
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(!empty($orders))
                        @foreach($orders as $key => $value)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <th> {{ !empty($value->reference ) ? $value->reference : '' }} </th>
                                <td> {{ !empty($value->created_at) ? date('d-m-Y' , strtotime($value->created_at)) : '' }} </td>
                                <td> {{ !empty($value->party_name) ? $value->party_name : '' }} </td>
                                <td> {{ !empty($value->amount_without_tax   ) ? $value->amount_without_tax   : '' }} </td>
                                <th> {{ !empty($value->tax) ? $value->tax : '' }} </th>
                                <th>  {{ !empty($value->value) ? $value->value : '' }} </th>
                                <td style="display: flex;;">
                          <a href="{{url('orders/view' , encrypt($value->id))}}" class="btn btn-success" style="height: 25px;display: flex;align-items: center;font-size: 13px;justify-content:center;width: 90px;margin-right: 5px;margin-left: 5px;">Details</a>
<!--                           <a href="orderdetails.html" class="btn btn-danger" style="height: 25px;display: flex;align-items: center;font-size: 13px;justify-content:center;width: 120px;margin-right: 5px;margin-left: 5px;">Not Approved</a> -->
                            <!-- @if($value->approved == 1 && $value->checkout == 0)
                          <a href="{{url('Checkout' , encrypt($value->id))}}" class="btn btn-success" style="height: 25px;display: flex;align-items: center;font-size: 13px;justify-content:center;width: 120px;margin-right: 5px;margin-left: 5px;">Checkout</a>
                            @endif
                            @if($value->checkout == 1)
                              <a href="#" class="btn btn-success" style="height: 25px;display: flex;align-items: center;font-size: 13px;justify-content:center;width: 120px;margin-right: 5px;margin-left: 5px;">Order Placed</a>                            
                            @endif -->


                             @if($value->approved == 1)

                             <a href="#" class="btn btn-success" style="height: 25px;display: flex;align-items: center;font-size: 13px;justify-content:center;width: 120px;margin-right: 5px;margin-left: 5px;">Order Approved</a>

                             @else

                             <a href="#" class="btn btn-info" style="height: 25px;display: flex;align-items: center;font-size: 12px;justify-content:center;width: 146px;margin-right: 5px;margin-left: 5px;">Awaiting Order Approval</a>

                             @endif
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
  </section>
  <!--End main-container --> 

  {{--
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
    <table class="table table-responsive">
        <thead>
            <th>S.No</th>
            <th>Quantity</th>
            <th>Value</th>
            <th>Tax</th>
            <th>Total</th>
            <th>view</th>
        </thead>
        <tbody>
            @if(!empty($orders))
                @foreach($orders as $key => $value)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td> {{ !empty($value->quantity) ? $value->quantity   : '' }} </td>
                        <td> {{ !empty($value->amount_without_tax   ) ? $value->amount_without_tax   : '' }} </td>
                        <th> {{ !empty($value->tax) ? $value->tax : '' }} </th>
                        <th>  {{ !empty($value->value) ? $value->value : '' }} </th>
                        <td><a href = "{{url('orders/view/'.encrypt($value->id))}}">View</a></td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    </div>
<div class="col-md-2"></div>    
</div>
--}}
@endsection