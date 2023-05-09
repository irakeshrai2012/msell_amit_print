@extends('layouts.lander')
  @section('content')
  <!-- main-container -->
  <div class="main-container col2-right-layout">
    <div class="main container">

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




      <div class="row">
        <form action="{{url('Checkout' , encrypt($order->id))}}" method="post">
          @csrf
        <section class="col-main col-sm-9 wow">
          <div class="page-title">
            <h1>Checkout</h1>
          </div>
          <ol class="one-page-checkout" id="checkoutSteps">
            <li id="opc-billing" class="section allow active">
              <div onclick="showonclick('opc-billing-content')" class="step-title"> <span class="number">1</span>
                <h3>Shipping Information</h3>
                <!--<a href="#">Edit</a> --> 
              </div>
              <div id="opc-billing-content" >
              <div id="checkout-step-billing" class="step a-item" style="">
                <form id="co-billing-form" action="">
                  <fieldset class="group-select">
                    <ul>
                      {{--
                      <li>
                        <label for="billing-address-select">Select a billing address from your address book or enter a new address.</label>
                        <br>
                        <select onchange="check_if_new(this.value)" name="billing_address_id" id="billing-address-select" class="address-select" title="">
                          <option value="">Select</option>
                          @if(!empty($address))
                          @foreach($address as $key => $value)
                            <option value="{{ $value->id }}"> {{!empty($value->addr) ? $value->addr : ''}} </option>
                          @endforeach
                          @endif
                          <option value="new">New Address</option>
                        </select>
                      </li>
                      --}}
                      <li id="billing-new-address-form">
                        <fieldset>
                          <legend>New Address</legend>
                          <ul>
                            <li>
                              <div class="customer-name">
                                <div class="input-box name-firstname">
                                  <label for="billing:firstname"> First Name <span class="required">*</span> </label>
                                  <br>
                                  <input type="text" id="billing:firstname" name="shipping[firstname]"  title="First Name" class="input-text required-entry" value="{{$user->name}}">
                                </div>
                                <div class="input-box name-lastname">
                                  <label for="billing:lastname"> Last Name <span class="required">*</span> </label>
                                  <br>
                                  <input type="text" id="billing:lastname" name="shipping[lastname]"  title="Last Name" class="input-text required-entry" value="{{$user->name}}">
                                </div>
                              </div>
                            </li>
                            <li>
                              <div class="input-box">
                                <label for="billing:company">Company</label>
                                <br>
                                <input type="text" id="billing:company" name="shipping[company]"  title="Company" class="input-text" value="{{$user->business_name}}">
                              </div>
                            </li>
                            <li>
                              <label for="billing:street1">Address <span class="required">*</span></label>
                              <br>
                              <input type="text" title="Street Address" name="shipping[street]" id="billing:street1  street1"  class="input-text required-entry" value="{{$user->business_address}}">
                            </li>
                            <li>
                              <div class="input-box">
                                <label for="billing:city">City <span class="required">*</span></label>
                                <br>
                                <input type="text" title="City" name="shipping[city]"  class="input-text required-entry" id="billing:city" value="{{$address->city}}">
                              </div>
                              <div id="" class="input-box">
                                <label for="billing:region">State/Province <span class="required">*</span></label>
                                <br>
                                  <input type="text" title="City" name="shipping[state]"  class="input-text required-entry" id="billing:city" value="{{$address->state}}">
                          
                              </div>
                            </li>
                            <li>
                              <div class="input-box">
                                <label for="billing:postcode">Zip/Postal Code <span class="required">*</span></label>
                                <br>
                                <input type="text" title="Zip/Postal Code" name="shipping[postcode]" id="billing:postcode"  class="input-text validate-zip-international required-entry">

                              </div>
                              <div class="input-box">
                                <label for="billing:telephone">Telephone <span class="required">*</span></label>
                                <br>
                                <input type="text" name="shipping[telephone]"  title="Telephone" class="input-text required-entry" id="billing:telephone" value="{{$user->phone}}">
                              </div>                              
                            </li>
                            {{--
                            <li>
                              <input type="checkbox" name="billing[save_in_address_book]"  title="Save in address book" id="billing:save_in_address_book" onchange="shipping.setSameAsBilling(false);" class="checkbox">
                              <label for="billing:save_in_address_book">Save in address book</label>
                            </li>
                            --}}
                          </ul>
                        </fieldset>
                      </li>
                    </ul>
                    <!-- <p class="require"><em class="required">* </em>Required Fields</p> -->
                    <button class="btn btn-primary" type="submit"><span><i class="fa fa-check"></i>Place Order</span></button>
                  </fieldset>
                </form>
              </div>
            </div>
            </li>
          </ol>
        </section>
      </form>
      </div>
    </div>
  </div>
  <!--End main-container --> 
</div>    

<!-- JavaScript --> 

<script type="text/javascript">
  function tabnext(next , current){
    $("#"+current+'-content').hide();
    $("#"+current).removeClass('active');
    $("#"+next).addClass('active');
    $("#"+next+'-content').show();
  }

  function showonclick(id){
    var disp = $("#"+id).css('display');
    if(disp != 'none'){
      $("#"+id).css('display' , 'none');
    }else{
      $("#"+id).css('display' , 'block');
    }
  }
  function check_if_new(val){
    if(val == 'new'){
        $("#billing-new-address-form").css('display' , 'block');
    }
  }
</script>
@endsection