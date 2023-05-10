<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>Amit Computer Graphics</title>
<!-- Favicons Icon -->
<!-- <link rel="icon" href="../../../skin/frontend/base/default/favicon.ico" type="image/x-icon"> -->
<!-- <link rel="shortcut icon" href="../../../skin/frontend/base/default/favicon.ico" type="image/x-icon"> -->
<!-- Mobile Specific -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!-- CSS Style -->

<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('css/revslider.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('css/owl.theme.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('css/font-awesome.css')}}" type="text/css">
<!-- Google Fonts -->
<link href='../../../css?family=Roboto:400,500,700' rel='stylesheet' type='text/css'>
</head>
<body class="cms-index-index">
<div class="page"> 
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
          @php
             if(!empty(Auth::user())){
             $user = Auth::user();
             }
          @endphp
          <div class="col-xs-6"> 
            <!-- Header Top Links -->
            <div class="toplinks">
              <div class="links">
                 @if(!empty($user))
                <div class="myaccount"><a title="My Account" href="###"><span class="hidden-xs">{{$user->name}}</span></a></div>
                @endif
                <div class="wishlist"><a title="My Wishlist" href="wishlist.html"><span class="hidden-xs">Wishlist</span></a></div>
                <div class="check"><a title="Checkout" href="checkout.html"><span class="hidden-xs">Checkout</span></a></div>
                <div class="phone hidden-xs">1 800 123 1234</div>
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
          <a class="logo" title="Magento Commerce" href="{{ url('home') }}">
            <img alt="Magento Commerce" src="images/logo.jpg" style="width:60px"></a> 
          <!-- End Header Logo --> 
        </div>
        <div class="col-lg-7 col-sm-4 col-md-6 col-xs-12" style="padding-top: 20px;"> 
          <!-- Search-col -->
          <form action="/action_page.php">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search" name="search">
              <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
              </div>
            </div>
          </form>
          <!-- <div class="search-box">
            <form action="cat" method="POST" id="search_mini_form" name="Categories">
              <select name="category_id" class="cate-dropdown hidden-xs">
                <option value="0">All Categories</option>
                <option value="36">Camera</option>
                <option value="37">Electronics</option>
                <option value="42">&nbsp;&nbsp;&nbsp;Cell Phones</option>
                <option value="43">&nbsp;&nbsp;&nbsp;Cameras</option>
                <option value="44">&nbsp;&nbsp;&nbsp;Laptops</option>
                <option value="45">&nbsp;&nbsp;&nbsp;Hard Drives</option>
                <option value="46">&nbsp;&nbsp;&nbsp;Monitors</option>
                <option value="47">&nbsp;&nbsp;&nbsp;Mouse</option>
                <option value="48">&nbsp;&nbsp;&nbsp;Digital Cameras</option>
                <option value="38">Desktops</option>
                <option value="39">Computer Parts</option>
                <option value="40">Televisions</option>
                <option value="41">Featured</option>
              </select>
              <input type="text" placeholder="Search here..." value="" maxlength="70" class="" name="search" id="search">
              <button id="submit-button" class="search-btn-bg"><span>Search</span></button>
            </form>
          </div> -->
          <!-- End Search-col --> 
        </div>
        <!-- Top Cart -->
        <div class="col-lg-3 col-sm-5 col-md-4 col-xs-12">
          <div class="top-cart-contain">
            <div class="mini-cart">
              <div data-toggle="dropdown" data-hover="dropdown" class="basket dropdown-toggle"> <a href="shopping_cart.html"> <i class="icon-cart"></i>
                <div class="cart-box"><span class="title">My Cart</span><span id="cart-total"> 2 </span></div>
                </a></div>
              <div>
                <div class="top-cart-content arrow_box">
                  <div class="block-subtitle">Recently added item(s)</div>
                  <ul id="cart-sidebar" class="mini-products-list">
                    @php
                      $cart  =  !empty(session()->get('cart')) ? session()->get('cart') : [];
                      $subtotal = 0;
                    @endphp
                    @if(!empty($cart))
                    @foreach($cart as $key=>$value)
                    <li class="item even"> <a class="product-image" href="#" title="{{ !empty($value['name']) ? $value['name'] : '' }}"><img alt="{{ !empty($value['name']) ? $value['name'] : '' }} " src="{{ !empty($value['image']) ? asset($value['image']) : ''}}" width="80"></a>
                      <div class="detail-item">
                        <div class="product-details"> <a href="#" title="Remove This Item" onclick="remove_from_cart('{{$value['id']}}')" class="glyphicon glyphicon-remove">&nbsp;</a> <a class="glyphicon glyphicon-pencil" title="Edit item" href="#">&nbsp;</a>
                          <p class="product-name"> <a href="#" title="Downloadable Product">{{ !empty($value['name']) ? $value['name'] : '' }} </a> </p>
                        </div>
                        <div class="product-details-bottom"> <span class="price">RS. {{!empty($value['price']) ? $value['price'] : ''}}</span> <span class="title-desc">Qty: </span> <strong>{{!empty($value['quantity']) ? $value['quantity'] : 0}}</strong> </div>
                      </div>
                    </li>
                    @php
                      $subtotal  += !empty($value['price']) ? $value['price'] : 0;
                    @endphp
                    @endforeach
                    @endif
                  </ul>
                  <div id="cart_subtotal" class="top-subtotal">Subtotal: <span id="subtotal" class="price">RS. {{$subtotal}}</span></div>
                  <div class="actions">
                    <button class="btn-checkout" type="button"><span>Checkout</span></button>
                    <a href="{{url(('cartview'))}}"><button class="view-cart" type="button"><span>View Cart</span></button></a>
                  </div>
                </div>
              </div>
            </div>
            <div id="ajaxconfig_info" style="display:none"> <a href="#/"></a>
              <input value="" type="hidden">
              <input id="enable_module" value="1" type="hidden">
              <input class="effect_to_cart" value="1" type="hidden">
              <input class="title_shopping_cart" value="Go to shopping cart" type="hidden">
            </div>
          </div>
          <div class="signup"><a title="Login" href="{{url('register')}}"><span>Sign up Now</span></a></div>
          <span class="or"> | </span>
          <div class="login"><a title="Login" href="{{url('login')}}"><span>Log In</span></a></div>
        </div>
        <div  class="login mt-0">
            <form method="post" action ="{{route('logout')}}">
                @csrf
                <input class="btn btn-primary" title="logout" type="submit" value="Logout">
            </form>
        </div>
        
        </div>        
        <!-- End Top Cart --> 
      </div>
    </div>
  </header>
  <!-- end header --> 
  <!-- Navbar -->
  
  <nav >
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
                    <li class="level0 nav-6 level-top parent"> <a class="level-top" href="{{ url('home') }}"> <span>Home</span> </a>
                    </li>
                    <li class="level0 nav-6 level-top"> <a class="level-top" href="{{url('/products')}}"> <span>Products</span> </a>
<!--                       <ul class="level0">
                       
                        <li class="level1"> <a href="about_us.html"> <span>About us</span> </a> </li>
                        <li class="level1"><a href="team.html"><span>Core Team</span></a></li>
                    
                      </ul> -->
                    </li>
<!--                     <li class="level0 nav-7 level-top"> <a class="level-top" href="grid.html"> <span>All Services</span> </a> </li>
                   
                    <li class="level0 parent "><a href="blog.html"><span>Join Us</span> </a>
                     
                    </li>
                    <li class="level0 nav-9 level-top last parent "> <a class="level-top" href="contact.html"> <span>Contact</span> </a> </li>
                  </ul>
                </li> -->
              </ul>
            </li>
          </ul>
          <!--navmenu--> 
        </div>
        <!--End mobile-menu --> 
        <a class="logo-small" title="Magento Commerce" href="{{ url('home') }}"><img alt="Magento Commerce" src="{{asset('images/logo-small.png')}}" style="width:50px"></a>
        <ul id="nav" class="hidden-xs">
          <li class="level0 parent "><a href="{{ url('home') }}" class="active"><span>Home</span> </a>
           
          </li>
<!--           <li class="level0 parent drop-menu"><a href="#"><span>Corporate</span> </a>
            <ul class="level1">
            
              <li class="level1"> <a href="about_us.html"> <span>About us</span> </a> </li>
              <li class="level1"><a href="team.html"><span>Core Team</span></a></li>
             
            </ul>
          </li> -->
                    <li class="level0 nav-6 level-top parent"> <a class="level-top" href="{{url('Categories')}}"> <span>Categories</span> </a>
                    </li>  
                    <li class="level0 nav-6 level-top parent"> <a class="level-top" href="{{url('products')}}"> <span>Products</span> </a>
                    </li>                      
          <li class="level0 nav-5 parent"> <a href="{{url('Order-Summary-Report')}}" class="level-top"> <span>Orders</span> </a>
             
          </li>
          <li class="level0 nav-5 parent"> <a href="{{url('Users')}}" class="level-top"> <span>Users</span> </a>
             
          </li>
          <li class="level0 nav-5 parent"> <a href="{{url('Tax-Master')}}" class="level-top"> <span>Tax Master</span> </a>
             
          </li>          
     
<!--           <li class="level0 nav-5 parent"> <a class="level-top" href="grid.html"> <span>Join Us</span> </a>
           
          </li> -->
<!--           <li class="level0 nav-5 parent"><a href="grid.html"><span>Contact Us </span> </a>
          </li> -->
       
        </ul>
      </div>
    </div>
  </nav>
  <!-- end nav --> 
  <!-- Slider -->