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
                <a href="{{url('register')}}"><button  class="button create-account" type="button"><span>Create an Account</span></button></a>
              </div>
            </div>
          </div>
          <form id="loginform" method="POST" action="{{ route('login') }}">
              @csrf
          <div class="col-2 registered-users"><strong>Registered Customers</strong>

            <div class="content">
              <p>If you have an account with us, please log in.</p>
              <ul class="form-list">
                <li>
                  <label for="email">Email Address <span class="required">*</span></label>
                  <br>
                  <input type="text" title="Email Address" class="input-text required-entry" id="email" value="" name="username">
                </li>
                <li>
                  <label for="pass">Password <span class="required">*</span></label>
                  <br>
                  <input type="password" title="Password" id="pass" class="input-text required-entry validate-password" name="password">
                </li>
              </ul>
              <p class="required">* Required Fields</p>
              <div class="buttons-set">
                <button id="send2" name="send" type="submit" class="button login"><span>Login</span></button>
                <a class="forgot-word" href="http://demo.magentomagik.com/computerstore/customer/account/forgotpassword/">Forgot Your Password?</a> </div>
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