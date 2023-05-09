@extends('layouts.lander')
  @section('content')
<style type="text/css">
    .razorpay-payment-button{
        height: 50px;
        width:80px;
        margin-left: 45%;
        margin-top: 14%;
    }
</style>
            <div class="container">
                <form action="{{url('proceed_payment')}}" method="POST">
                    @csrf
                    <div class="row mt-3">
                        <div class="col-md-12 mt-3">
                            <div class="col-md-3">  
                            </div>
                            <div class="col-md-6">
                                <label style="font-size:24px;" class="form-label text-center"> Amount </label><br>
                                <input type="text" name="amount_payable" class="input-text required-entry col-md-12">
                            </div>
                            <div class="col-md-3"> 
                                              
                            </div>
                        </div>
                        <br/>
                        <div class="col-md-12 mt-3">
                            <br/>
                            <div class="col-md-3">  
                            </div>
                            <div class="col-md-6">
                            <a href="#" class="btn btn-info"  title="after deposited Cash shared the bank recipt">Pay by Cash</a>
                            <a href="#" class="btn btn-info" title="after deposited Cheque shared the bank recipt">Pay by Cheque</a>
                            <button href="#" class="btn btn-info" class="btn btn-primary" type="submit" title="Plus 2% transcation fee charge extra">Pay Online</button> 
                            
                            </div>
                        </div>    
                        
                        <!-- <div class="col-md-12 mt-3">
                            <div class="col-md-3">  
                            </div>
                            <div class="col-md-6">
                                <button class=" btn btn-primary" type="submit">Proceed With Razorpay</button>
                            </div>
                            <div class="col-md-3">                
                            </div>
                        </div>         -->
                    </div>
                </form>
            </div>
{{--
                    <form action="{!!route('payment')!!}" method="POST" >                        
                        <script src="https://checkout.razorpay.com/v1/checkout.js"
                                data-key="{{ env('RAZOR_KEY' , 'rzp_test_V1lnNL2QKXfb2C') }}"
                                data-amount="100"
                                data-buttontext="Pay 1 INR"
                                data-name="Localbazar"
                                data-description="Payment"                                
                                data-prefill.name="name"
                                data-prefill.email="email"
                                data-theme.color="#ff7529">
                        </script>
                        <input type="hidden" name="_token" value="{!!csrf_token()!!}">
                    </form>
--}}
@endsection