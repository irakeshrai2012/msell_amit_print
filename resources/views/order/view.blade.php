
@extends(Auth::user()->type=="admin"? 'admin.layouts.admin':'layouts.lander')



  @section('content')
 <div class="container"> 
    <div class="row mt-4">

    

        @if(Auth::user()->type=="admin") 
        
        @php $customer_name=getUser($order->created_by); @endphp
        
        <div class="pull-right col-md-6">
            <h3>Customer Details</h3>
            
            <p style="font-weight:bold">
          Name: {{!empty(Auth::user()) ?ucfirst($customer_name->name) : ''}}  
        </p>
        <p style="font-weight:bold">
         Business Address : {{!empty($customer_name->business_address) ? $customer_name->business_address : ''}}  
        </p>        
        <p style="font-weight:bold">
          GST NO/PAN No : {{!empty($customer_name->gst) ? $customer_name->gst : ''}}  
        </p>
        <p style="font-weight:bold">
          Phone : {{!empty($customer_name->phone) ? $customer_name->phone : ''}}  
        </p>
        <p style="font-weight:bold">
         Wallet Balance : {{!empty(get_user_wallet_balance($order->created_by)) ? get_user_wallet_balance($order->created_by) : ''}}  
        </p>        
        
        </div>

        @endif

        <div class="pull-right col-md-6">
            
           @if(!empty($order->shipping_information))
    
            <h2>Shipping Details</h2>
            @php
                $obj = json_decode($order->shipping_information);
            @endphp
        
                
                       <p style="font-weight:bold"> TO :{{$obj->firstname." ".$obj->lastname}} </p> 
                       <p style="font-weight:bold"> Company: {{$obj->company}} </p> 
                       <p style="font-weight:bold"> Street :{{$obj->street}} </p> 
                       <p style="font-weight:bold"> City : {{$obj->city}}</p> 
                       <p style="font-weight:bold"> State : {{$obj->state}}</p> 
                       <p style="font-weight:bold"> Postal Code :{{$obj->postcode}}</p> 
                        <p style="font-weight:bold"> Contact : {{$obj->telephone}}</p> 
                
                        
                        
                   
            </p>
        
@endif      
        
        </div>
        

    </div>    
<div class="row mt-4">
    
    <div class="col-md-4">
        <h3>Order Details</h3>
        <p style="font-weight:bold">
          Reference No. : {{!empty($order->reference) ? $order->reference : ''}}  
        </p>
        <p style="font-weight:bold">
          Order Value : {{!empty($order->amount_without_tax) ? $price = $order->amount_without_tax : ''}}  
        </p>        
        <p style="font-weight:bold">
          Tax : {{!empty($order->tax) ? $tax = $order->tax : ''}}  
        </p>
        <p style="font-weight:bold">
          Stage : {{!empty($order->stage) ? $order->stage : ''}}  

           @php
            $opt_arr = [
                1 => 'Stage 1',
                2 => 'Stage 2',
                3 => 'Stage 3',
                4 => 'Stage 4',
                5 => 'Stage 5'
            ];
            @endphp

         <h3>Update Order Stage</h3>
        <form method="POST" action  = "{{url('update_order_stage' , $order->id)}}">
            @csrf
            <select class="form-select" name="stage">
                <option value"">Select</option>
                @foreach($opt_arr as $key3 => $value3)
                    @if($key3 == $order->stage)
                        <option selected="true" value = {{$key3}}>{{$value3}}</option>
                    @else
                        <option value = {{$key3}}>{{$value3}}</option>                    
                    @endif
                @endforeach
            </select>
            <button class="btn btn-primary" type="submit">Update</button>
        </form>

       


        </p>         
        <p style="font-weight:bold">
          <b style="font-size: 20px;">Total : {{$price + $tax}}</b>  
        </p> 
    </div>
    <div class="col-md-6">
        <h3>Product Details</h3>
          <table class="table table-bordered table-hover table-striped">
              <thead >
                <tr >
                    <th scope="col">Product</th>
                    <th scope="col">Rate</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Subtotal</th>
                    <th scope="col">Tax</th>
                    
                    <th scope="col">Total</th>
                    <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
                    @if(!empty($details))
                        @foreach($details as $key => $value)
                            @php
                                $quantity = 0;
                                $price = 0;
                                $total = 0;
                            @endphp
                            <tr>
                                <td> {{!empty($value->product_id) ? $products[$value->product_id] : ''}} </td>
                                <td> {{ !empty($value->price) ? $price = $value->price : '' }} </td>
                                <th> {{ !empty($value->quantity) ? $quantity = $value->quantity :'' }} </th>
                                <th> {{ $subtotal = $quantity*$price }} </th>
                                <td> {{ !empty($value->tax)  ? round($value->tax).'%' : ''}} </td>
                                @php

                                    $tax_val  = ($value->tax * $subtotal)/100; 
                                    $total_row = $tax_val + $subtotal;
                                @endphp
                                <td> {{$total_row }} </td>
                                <td>
                                @if(Auth::user()->type=="admin")
                                @if($value->status=="ready")

                                {{$value->status}}


                                @else
                                    <div class="row">

                                    <form method="POST" action  = "{{url('update_product_status' , $value->id)}}">
                                            @csrf
                                            <div class="col-md-12">
                                            <select class="form-select" name="status">
                                                <option value"">Select Status</option>
                                                <option @if($value->status=="pending") selected="true" @endif value ="pending">Pending</option>
                                                <option @if($value->status=="pending") selected="true" @endif value ="pending">Pending from client</option>
                                                <option @if($value->status=="ready") selected="true" @endif value ="ready">Ready</option>
                                                    
                                            </select>
                                            
                                            <button class="btn btn-sm btn-primary" type="submit">Update</button>
                                            </div >
                                        </form>
                                    </div>
                                  @endif 
                                  @else

                                  @if($value->status) {{$value->status}} @else Pending @endif                                  
                                  @endif
                                </td>    
                            </tr>
                        @endforeach
                    @endif
                    <tr>
                    </tr>
              </tbody>        
          </table>

          
    </div>
    
            @if($order->approved == 0)
            <h3>Approve This Order</h3>
            <form action="{{url('approve_order' , encrypt($order->id))}}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Approve</button>
            </form>
            @else
                <h3>Approved</h3>
            @endif
        
        
</div>

    
        </div>    
@endsection