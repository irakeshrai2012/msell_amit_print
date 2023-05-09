@extends('layouts.lander')
  @section('content')
<style type="text/css">
    .razorpay-payment-button{
        height: 50px;
        width:180px;
        margin-left: 45%;
        margin-top: 14%;
    }
</style>


    



    <form action="{!!route('payment')!!}" method="POST" >                        
        <script src="https://checkout.razorpay.com/v1/checkout.js"
                data-key="{{ env('RAZOR_KEY' , 'rzp_test_V1lnNL2QKXfb2C') }}"
                data-amount="{{$amount*100}}"
                data-buttontext="Pay {{$amount}} INR"
                data-name="Localbazar"
                data-description="Payment"                                
                data-prefill.name="name"
                data-prefill.email="email"
                data-theme.color="#ff7529">
        </script>
        <input type="hidden" name="_token" value="{!!csrf_token()!!}">
    </form>
@endsection