  <!-- Header -->
  <header class="header-container">
    <div class="header-top">
      <div class="container">
        <div class="row"> 
          <!-- Header Language -->
          <div class="col-xs-6">
            <!-- <div class="dropdown block-language-wrapper"> <a role="button" data-toggle="dropdown" data-target="#" class="block-language dropdown-toggle" href="#"> <img src="images/english.png" alt="language"> English <span class="caret"></span> </a>
              <ul class="dropdown-menu" role="menu">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><img src="images/english.png" alt="language"> English </a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><img src="images/francais.png" alt="language"> French </a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><img src="images/german.png" alt="language"> German </a></li>
              </ul>
            </div> -->
            <!-- End Header Language --> 
            <!-- Header Currency -->
           <!--  <div class="dropdown block-currency-wrapper"> <a role="button" data-toggle="dropdown" data-target="#" class="block-currency dropdown-toggle" href="#"> USD <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#"> $ - Dollar </a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#"> £ - Pound </a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#"> € - Euro </a></li>
              </ul>
            </div> -->
            <!-- End Header Currency -->
            <div class="welcome-msg hidden-xs"> Default welcome msg! </div>
          </div>
          <div class="col-xs-6"> 
            <!-- Header Top Links -->
            <div class="toplinks">
              <div class="links">
                <!--<div class="myaccount"><a title="My Account" href="login.html"><span class="hidden-xs">My Account</span></a></div>-->
                <!--<div class="wishlist"><a title="My Wishlist" href="wishlist.html"><span class="hidden-xs">Wishlist</span></a></div>-->
                <!--<div class="check"><a title="Checkout" href="checkout.html"><span class="hidden-xs">Checkout</span></a></div>-->
                <div class="phone hidden-xs">+91 981-1901-500</div>
              </div>
            </div>
            <!-- End Header Top Links --> 
          </div>
        </div>
      </div>
    </div>
    <div class="header container">
      <div class="row">
        <div class="col-lg-2 col-sm-3 col-md-2 col-xs-12"> 
          <!-- Header Logo --> 
          <a class="logo" title="Magento Commerce" href="{{url('home')}}">
            <img alt="Magento Commerce" src="{{asset('images/logo-small.png')}}" style="width:110px"></a> 
          <!-- End Header Logo --> 
        </div>
        <!-- Top Cart -->
        @php
          $cart  =  !empty(session()->get('cart')) ? session()->get('cart') : [];
          $subtotal = 0;
        @endphp        
        <div class="col-md-7 col-xs-12">
          <div class="top-cart-contain" style="display:flex;">
           
            <div id="ajaxconfig_info" style="display:none"> <a href="#/"></a>
              <input value="" type="hidden">
              <input id="enable_module" value="1" type="hidden">
              <input class="effect_to_cart" value="1" type="hidden">
              <input class="title_shopping_cart" value="Go to shopping cart" type="hidden">
            </div>
          @if(Auth::check())
            
            <form method="post" action ="{{route('logout')}}">
                @csrf
                <input title="logout" type="submit" value="Logout" style="background: none;border: none;color:red">
            </form>
            @endif
          </div>
          
          @if(!Auth::check())
          <div class="signup"><a title="Login" href="{{url('register')}}"><span>Sign up Now</span></a></div>
          <span class="or"> | </span>
          <div class="login"><a title="Login" href="{{url('login')}}"><span>Log In</span></a></div>
          @else
          <div class="signup"><a title="Login" href="#"><span>Profile</span></a></div>
          @endif
            
        </div>
            
        <div class="col-md-3 col-xs-12" style="padding-top: 20px;"> 
         <p><b>A/C Balance :</b> RS. {{!empty($ac_bal) ? $ac_bal  :0}} <button onclick="window.location.href='{{url('Add-Amount')}}'" class="btn">Add Amount</button></p>
        </div>
        <!-- End Top Cart --> 
      </div>
    </div>
  </header>
  <!-- end header --> 
  <!-- Navbar -->
  <nav>
    <div class="container">
      <div class="nav-inner"> 
        
        <!-- mobile-menu -->
        <div class="hidden-desktop" id="mobile-menu">
          <ul class="navmenu">
            <li>
              <div class="menutop">
                <div class="toggle"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></div>
                <h2>Menu</h2>
              </div>
              <ul style="display:none;" class="submenu">
                <li>
                  <ul class="topnav">
                    <li class="level0 nav-6 level-top parent"> <a class="level-top" href="{{url('/home')}}"> <span>Home</span> </a>
                    </li>
                    <li class="level0 nav-6 level-top parent"> <a class="level-top" href="{{url('/custumer_orders')}}"> <span>My Orders</span> </a>
                    </li>                    
                    <li class="level0 nav-6 level-top"> <a class="level-top" href="#"> <span>Corporate</span> </a>
                      <ul class="level0">
                       
                        <li class="level1"> <a href="{{url('about_us')}}"> <span>About us</span> </a> </li>
                        <li class="level1"><a href="{{url('core_team')}}"><span>Core Team</span></a></li>
                    
                      </ul>
                    </li>
                    <li class="level0 nav-7 level-top"> <a class="level-top" href="grid.html"> <span>All Services</span> </a> </li>
                   
                    <li class="level0 parent "><a href="blog.html"><span>Join Us</span> </a>
                     
                    </li>
                    <li class="level0 nav-9 level-top last parent "> <a class="level-top" href="{{url('contact')}}"> <span>Contact</span> </a> </li>
                  </ul>
                </li>
              </ul>
            </li>
          </ul>
          <!--navmenu--> 
        </div>
        <!--End mobile-menu --> 
        <a class="logo-small" title="Magento Commerce" href="{{ url('home') }}"><img alt="Magento Commerce" src="images/bg-whitelogo(1).png" style="width:100px"></a>
        <ul id="nav" class="hidden-xs">
          <li class="level0 parent "><a href="{{url('home')}}" class=""><span>Home</span> </a>
           
          </li>
          <li class="level0 parent "><a href="{{url('custumer_orders')}}" ><span>My Orders</span> </a>
           
          </li>          
          <li class="level0 parent drop-menu"><a href="#"><span>Corporate</span> </a>
            <ul class="level1">
            
              <li class="level1"> <a href="about_us.html"> <span>About us</span> </a> </li>
              <li class="level1"><a href="team.html"><span>Core Team</span></a></li>
             
            </ul>
          </li>
          <li class="level0 nav-5 parent"> <a href="service.html" class="level-top"> <span>All Services</span> </a>
             
          </li>
     
          <li class="level0 nav-5 parent"> <a class="level-top" href="grid.html"> <span>Join Us</span> </a>
           
          </li>
          <li class="level0 nav-5 parent"><a href="grid.html"><span>Contact Us </span> </a>
          </li>
       
        </ul>
      </div>
    </div>
  </nav>
  <!-- end nav --> 
  <!-- Slider -->