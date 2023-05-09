@extends('layouts.lander')
  @section('content')
  <section class="main-container col1-layout">
    <div class="main container">
      <div class="account-login">
        <div class="page-title">
          <h2>Login or Create an Account</h2>
        </div>
        <fieldset class="col2-set">
          <legend>Login or Create an Account</legend>
          <div class="col-1 new-users"><strong>New Customers</strong>
            <div class="content">
              <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
              <div class="buttons-set">
                <button onclick="window.location='http://demo.magentomagik.com/computerstore/customer/account/create/';" class="button create-account" type="button"><span>Create an Account</span></button>
              </div>
            </div>
          </div>
                      <form id="registerform" method="POST" action="{{ route('register') }}" enctype='multipart/form-data'>
                          @csrf
                      <div class="col-2 registered-users"><strong>New Customers</strong>
                        <div class="content">
                          <p>Create A new Account With us</p>
                          <ul class="form-list">
                            <li>
                              <label for="email">Name <span class="required">*</span></label>
                              <br>
                                @error('name')
                                <psan class="text-danger">{{$message}}</psan>
                                @enderror                              
                              <input type="text" title="Name" class="input-text required-entry" id="name" value="" name="name">
                            </li>  
                            <li>
                              <label for="phone">Business Name <span class="required">*</span></label>
                              <br>
                                @error('business_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror                                                         
                              <input type="text" title="business_name" class="input-text required-entry" id="business_name" value="" name="business_name">
                            </li> 

                            <li>
                              <label for="phone">Business Address <span class="required">*</span></label>
                              <br>
                                @error('business_address')
                                <span class="text-danger">{{$message}}</span>
                                @enderror                                                         
                              <input type="text" title="business_address" class="input-text required-entry" id="business_address" value="" name="business_address">
                            </li> 

                            <li>
                              <label for="phone">GST NO </label>
                              <br>
                                @error('gst_no')
                                <span class="text-danger">{{$message}}</span>
                                @enderror                                                         
                              <input type="text" title="gst_no" class="input-text required-entry" id="gst_no" value="" name="gst">
                            </li> 

                            <li>
                              <label for="phone">GST No Upload <span class="required">*</span></label>
                              <br>
                                @error('gst_file')
                                <span class="text-danger">{{$message}}</span>
                                @enderror                                                         
                              <input type="file" title="gst file" class="input-text required-entry" id="gst_file" name="gst_file">
                            </li> 




                            <li>
                              <label for="phone">PAN Card </label>
                              <br>
                                @error('pan')
                                <span class="text-danger">{{$message}}</span>
                                @enderror                                                         
                              <input type="text" title="pan" class="input-text required-entry" id="pan"  name="pan">
                            </li> 

                            <li>
                              <label for="phone">PAN Card Upload <span class="required">*</span></label>
                              <br>
                                @error('pan_card_file')
                                <span class="text-danger">{{$message}}</span>
                                @enderror                                                         
                              <input type="file" title="pan_card_file" class="input-text required-entry" id="pan_card_file"  name="pan_card_file">
                            </li> 
                            
                            <li>
                              <label for="email">Email Address <span class="required">*</span></label>
                              <br>
                                @error('email')
                                <span class="text-danger">{{$message}}</span>
                                @enderror                                                            
                              <input type="text" title="Email Address" class="input-text required-entry" id="email" value="" name="email">
                            </li>
                            <li>
                              <label for="phone">Phone No. <span class="required">*</span></label>
                              <br>
                                @error('phone')
                                <span class="text-danger">{{$message}}</span>
                                @enderror                                                         
                              <input type="text" title="Phone" class="input-text required-entry" id="phone" value="" name="phone">
                            </li> 


                            
                            
                            <!-- <li>
                              <label for="phone">Phone No. <span class="required">*</span></label>
                              <br>
                                @error('phone')
                                <span class="text-danger">{{$message}}</span>
                                @enderror                                                         
                              <input type="text" title="Phone"  class="input-text required-entry" id="phone" value="" name="phone">

                               <button  type="button" class="button " onclick="send_otp();" id="send_otp"><span>Send OTP</span></button> 
                            </li>  -->

                            <!-- <li id="verify_otp" style="display:none;">
                              <label for="otp">OTP <span class="required">*</span></label>
                              <br>
                                                                                         
                              <input type="text" title="otp" class="input-text required-entry" id="otp" value="" name="otp">

                              <button  type="button" class="button "><span>Verify </span></button>
                            </li>  -->


                            <li>
                              <label for="pass">Password <span class="required">*</span></label>
                              <br>
                                @error('password')
                                <span class="text-danger">{{$message}}</span>
                                @enderror                                                         
                              <input type="password" title="Password" id="pass" class="input-text required-entry validate-password" name="password">
                            </li>
                            <li>
                              <label for="pass">Confirm Password <span class="required">*</span></label>
                              <br>
                                @error('password')
                                <span class="text-danger">{{$message}}</span>
                                @enderror                                                         
                              <input type="password" title="Password" id="confirm-pass" class="input-text required-entry validate-password" name="password_confirmation">
                            </li>                            
                          </ul>
                          <p class="required">* Required Fields</p>
                          <div class="buttons-set">
                            <button id="send2" name="send" type="submit" class="button login"><span>Register</span></button>
                        </div>
                            @php
                              $status = !empty(Request::get('check')) ? 1 : 0;
                            @endphp
                            <input type="hidden" name="is_checking_out" value="{{$status}}"> 
                        </div>
                      </div>
                  </form>
        </fieldset>
      </div>
      <br>
      <br>
      <br>
      <br>
      <br>
    </div>
  </section>

<script>

//  function send_otp(){

//   $("#send_otp").hide();
//   $("#verify_otp").show();
//  } 
function check_blocked(str){
                var value=str;
                //  console.log(value);
                var auth_id = 1;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "post",
                    url:  '/public/is_user_blocked',
                    dataType: 'json',
                    data: {'email_id': value,'auth_id': auth_id},
                    success: function (data) 
                    {
                     
                        if(data.code == 401)
                        {
                            // console.log("error show");
                        }
                        else if(data.code == 200)
                        { 
                            let res=data.response;
                            if(res==1){
                                  alert("This user is blocked , please contact admin")
                                document.getElementById("password").disabled=true;
                              
                            }
                            }
                            else{
                               
                                alert_message(data.alert_message);
                               
                            }
                            
                        }
                
                });
            }
            
            </script>
@endsection