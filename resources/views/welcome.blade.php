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
<link rel="stylesheet" href="css/style.css" type="text/css">
<link rel="stylesheet" href="css/revslider.css" type="text/css">
<link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="css/owl.theme.css" type="text/css">
<link rel="stylesheet" href="css/font-awesome.css" type="text/css">
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
            <div class="welcome-msg hidden-xs"> sssDefault welcome msg! </div>
          </div>
          <div class="col-xs-6"> 
            <!-- Header Top Links -->
            <div class="toplinks">
              <div class="links">
                <div class="myaccount"><a title="My Account" href="login.html"><span class="hidden-xs">My Account</span></a></div>
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
          <a class="logo" title="Magento Commerce" href="index.html">
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
                    <li class="item even"> <a class="product-image" href="#" title="Downloadable Product "><img alt="Downloadable Product " src="products-images/product1.jpg" width="80"></a>
                      <div class="detail-item">
                        <div class="product-details"> <a href="#" title="Remove This Item" onclick="" class="glyphicon glyphicon-remove">&nbsp;</a> <a class="glyphicon glyphicon-pencil" title="Edit item" href="#">&nbsp;</a>
                          <p class="product-name"> <a href="#" title="Downloadable Product">Downloadable Product </a> </p>
                        </div>
                        <div class="product-details-bottom"> <span class="price">$100.00</span> <span class="title-desc">Qty:</span> <strong>1</strong> </div>
                      </div>
                    </li>
                    <li class="item last odd"> <a class="product-image" href="#" title="  Sample Product "><img alt="  Sample Product " src="products-images/product11.jpg" width="80"></a>
                      <div class="detail-item">
                        <div class="product-details"> <a href="#" title="Remove This Item" onclick="" class="glyphicon glyphicon-remove">&nbsp;</a> <a class="glyphicon glyphicon-pencil" title="Edit item" href="#">&nbsp;</a>
                          <p class="product-name"> <a href="#" title="  Sample Product "> Sample Product </a> </p>
                        </div>
                        <div class="product-details-bottom"> <span class="price">$320.00</span> <span class="title-desc">Qty:</span> <strong>2</strong> </div>
                      </div>
                    </li>
                  </ul>
                  <div class="top-subtotal">Subtotal: <span class="price">$420.00</span></div>
                  <div class="actions">
                    <button class="btn-checkout" type="button"><span>Checkout</span></button>
                    <button class="view-cart" type="button"><span>View Cart</span></button>
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
          <!-- <div class="signup"><a title="Login" href="login.html"><span>Sign up Now</span></a></div>
          <span class="or"> | </span>
          <div class="login"><a title="Login" href="login.html"><span>Log In</span></a></div> -->
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
                    <li class="level0 nav-6 level-top parent"> <a class="level-top" href="index.html"> <span>Home</span> </a>
                      
                    </li>
                    <li class="level0 nav-6 level-top"> <a class="level-top" href="#"> <span>Corporate</span> </a>
                      <ul class="level0">
                       
                        <li class="level1"> <a href="about_us.html"> <span>About us</span> </a> </li>
                        <li class="level1"><a href="team.html"><span>Core Team</span></a></li>
                    
                      </ul>
                    </li>
                    <li class="level0 nav-7 level-top"> <a class="level-top" href="grid.html"> <span>All Services</span> </a> </li>
                   
                    <li class="level0 parent "><a href="blog.html"><span>Join Us</span> </a>
                     
                    </li>
                    <li class="level0 nav-9 level-top last parent "> <a class="level-top" href="contact.html"> <span>Contact</span> </a> </li>
                  </ul>
                </li>
              </ul>
            </li>
          </ul>
          <!--navmenu--> 
        </div>
        <!--End mobile-menu --> 
        <a class="logo-small" title="Magento Commerce" href="index.html"><img alt="Magento Commerce" src="{{asset('images/logo-small.png')}}" style="width:50px"></a>
        <ul id="nav" class="hidden-xs">
          <li class="level0 parent "><a href="index.html" class="active"><span>Home</span> </a>
           
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
  <div id="magik-slideshow" class="magik-slideshow">
      <div id='rev_slider_4_wrapper' class='rev_slider_wrapper fullwidthbanner-container'>
        <div id='rev_slider_4' class='rev_slider fullwidthabanner'>
          <ul>
            <li data-transition='random' data-slotamount='7' data-masterspeed='1000' data-thumb='images/slider_img_1.jpg'><img src='https://printersclub.in/can_images/slider/swiper/Buy_Sell_Printing_Machines_Free_Advertising_Service.jpg' data-bgposition='left top' data-bgfit='cover' data-bgrepeat='no-repeat' alt="banner">
             <!--  <div class='tp-caption ExtraLargeTitle sft  tp-resizeme ' data-x='15' data-y='80' data-endspeed='500' data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:2; white-space:nowrap;'>The Spring!</div>
              <div class='tp-caption LargeTitle sfl  tp-resizeme ' data-x='15' data-y='135' data-endspeed='500' data-speed='500' data-start='1300' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:3; white-space:nowrap;'>Handbags <span>Sale</span></div>
              <div class='tp-caption sfb  tp-resizeme ' data-x='15' data-y='360' data-endspeed='500' data-speed='500' data-start='1500' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4; white-space:nowrap;'><a href='#' class="view-more">View More</a> <a href='#' class="buy-btn">Buy Now</a></div>
              <div class='tp-caption Title sft  tp-resizeme ' data-x='15' data-y='230' data-endspeed='500' data-speed='500' data-start='1500' data-easing='Power2.easeInOut' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4; white-space:nowrap;'>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus diam arcu.</div>
              <div class='tp-caption Title sft  tp-resizeme ' data-x='15' data-y='400' data-endspeed='500' data-speed='500' data-start='1500' data-easing='Power2.easeInOut' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4; white-space:nowrap;font-size:11px'>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div> -->
            </li>
            <li data-transition='random' data-slotamount='7' data-masterspeed='1000' data-thumb='images/slider_img_2.jpg' class="black-text"><img src='https://cms.cloudinary.vpsvc.com/image/upload/c_scale,dpr_auto,f_auto,fl_progressive,w_1000/India%20LOB/NVHP/New%20Home%20Page/Production/IN_Top_Homepage-Marquee_Calendars-_new' data-bgposition='left top' data-bgfit='cover' data-bgrepeat='no-repeat' alt="banner">
              <div class='tp-caption ExtraLargeTitle sft  tp-resizeme ' data-x='15' data-y='80' data-endspeed='500' data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:2; white-space:nowrap;'>Share new year wishes </div>
              <div class='tp-caption LargeTitle sfl  tp-resizeme ' data-x='15' data-y='135' data-endspeed='500' data-speed='500' data-start='1300' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:3; white-space:nowrap;'><span>with Custom </span> Calendars</div>
             <!--  <div class='tp-caption sfb  tp-resizeme ' data-x='15' data-y='360' data-endspeed='500' data-speed='500' data-start='1500' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4; white-space:nowrap;'><a href='#' class="view-more">View More</a> <a href='#' class="buy-btn">Buy Now</a></div>
              <div class='tp-caption Title sft  tp-resizeme ' data-x='15' data-y='230' data-endspeed='500' data-speed='500' data-start='1500' data-easing='Power2.easeInOut' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4; white-space:nowrap;'>In augue urna, nunc, tincidunt, augue,
                augue facilisis facilisis.</div>
              <div class='tp-caption Title sft  tp-resizeme ' data-x='15' data-y='400' data-endspeed='500' data-speed='500' data-start='1500' data-easing='Power2.easeInOut' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4; white-space:nowrap;font-size:11px'>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div> -->
            </li>
          </ul>
          <div class="tp-bannertimer"></div>
        </div>
      </div>

  </div>
  <!-- end Slider --> 
  <!-- header service -->
  <div class="header-service">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="content">
            <div class="icon-truck">&nbsp;</div>
            <span><strong>FREE SHIPPING</strong> on order over $99</span></div>
        </div>
        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="content">
            <div class="icon-support">&nbsp;</div>
            <span><strong>Customer Support</strong> Service</span></div>
        </div>
        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="content">
            <div class="icon-money">&nbsp;</div>
            <span><strong>3 days Money Back</strong> Guarantee</span></div>
        </div>
        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="content">
            <div class="icon-dis">&nbsp;</div>
            <span><strong class="orange">5% discount</strong> on order over $199</span></div>
        </div>
      </div>
    </div>
  </div>
  <!-- end header service --> 
  
  <!-- offer banner section -->
  <div class="offer-banner-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-xs-12 col-md-4 col-sm-4 wow" style="border: 1px solid #d8d6d7;">
          <h3 class="text-center"> Free Design Files</h3>
          <a href="#" style="display: flex;justify-content: center;align-items: center;height: 200px;">

          <img alt="offer banner1" src="https://printersclub.in/images/login_Free_Tamplate.png"></a>
          <p class="text-center">Free Design & Graphic Resources for Printers & Advertising Agencies.</p>
        </div>
        <div class="col-lg-3 col-xs-12 col-md-4 col-sm-4 wow">
          <a href="#" style="border: 1px solid #d8d6d7;display: flex;justify-content: center;align-items: center;height: 280px;">
          <img alt="offer banner1" src="https://printersclub.in/images/login_Free_Tamplate.png"></a>
        </div>
        <div class="col-lg-3 col-xs-12 col-md-4 col-sm-4 wow">
          <a href="#" style="border: 1px solid #d8d6d7;display: flex;justify-content: center;align-items: center;height: 280px;">
          <img alt="offer banner1" src="https://printersclub.in/images/login_Free_Tamplate.png"></a>
        </div>
         <div class="col-lg-3 col-xs-12 col-md-4 col-sm-4 wow">
          <a href="#" style="border: 1px solid #d8d6d7;display: flex;justify-content: center;align-items: center;height: 280px;">
          <img alt="offer banner1" src="https://printersclub.in/images/login_Free_Tamplate.png"></a>
        </div>
      </div>
    </div>
  </div>
  <!-- end offer banner section --> 
  <!-- main container -->
  <section class="main-container col1-layout home-content-container">
    <div class="container">
      <div class="row">
        <div class="std">
          <div class="col-lg-8 col-xs-12 col-sm-8 best-seller-pro wow">
            <div class="slider-items-products">
              <div class="new_title center">
                <h2>Our Most Popular Products</h2>
              </div>
              <div id="best-seller-slider" class="product-flexslider hidden-buttons">
                <div class="slider-items slider-width-col4"> 
                  <!-- Item -->
                  <div class="item">
                    <div class="col-item">
                      <div class="sale-label sale-top-right">Sale</div>
                      <div class="images-container"> <a class="product-image" title="Sample Product" href="product_detail.html"> <img src="https://cms.cloudinary.vpsvc.com/image/upload/c_scale,dpr_auto,f_auto,fl_progressive,w_450/India%20LOB/NVHP/New%20Home%20Page/NVHP%20Tiles%20-%20Blue%20Price%20Tag/Our%20Most%20Popular%20Products/IN_NVHPTiles_VistingCards_01" class="img-responsive" alt="product-image"> </a>
                        <div class="actions">
                          <div class="actions-inner">
                            <button type="button" title="Add to Cart" class="button btn-cart"><span>Add to Cart</span></button>
                            <ul class="add-to-links">
                              <li><a href="wishlist.html" title="Add to Wishlist" class="link-wishlist"><span>Add to Wishlist</span></a></li>
                              <li><a href="compare.html" title="Add to Compare" class="link-compare "><span>Add to Compare</span></a></li>
                            </ul>
                          </div>
                        </div>
                        <div class="qv-button-container"> <a href="quick_view.html" class="qv-e-button btn-quickview-1"><span><span>Quick View</span></span></a> </div>
                      </div>
                      <div class="info">
                        <div class="info-inner">
                          <div class="item-title"> <a title=" Sample Product" href="product_detail.html"> Sample Product </a> </div>
                          <!--item-title-->
                          <div class="item-content">
                            <div class="ratings">
                              <div class="rating-box">
                                <div style="width:60%" class="rating"></div>
                              </div>
                            </div>
                            <div class="price-box">
                              <p class="special-price"> <span class="price"> $45.00 </span> </p>
                              <p class="old-price"> <span class="price-sep">-</span> <span class="price"> $50.00 </span> </p>
                            </div>
                          </div>
                          <!--item-content--> 
                        </div>
                        <!--info-inner--> 
                        
                        <!--actions-->
                        <div class="clearfix"> </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Item --> 
                  <!-- Item -->
                  <div class="item">
                    <div class="col-item">
                      <div class="new-label new-top-right">New</div>
                      <div class="images-container"> <a class="product-image" title="Sample Product" href="product_detail.html"> <img src="https://cms.cloudinary.vpsvc.com/image/upload/c_scale,dpr_auto,f_auto,fl_progressive,w_450/India%20LOB/NVHP/New%20Home%20Page/NVHP%20Tiles%20-%20Blue%20Price%20Tag/Our%20Most%20Popular%20Products/IN_NVHPTiles_VistingCards_01" class="img-responsive" alt="a"> </a>
                        <div class="actions">
                          <div class="actions-inner">
                            <button type="button" title="Add to Cart" class="button btn-cart"><span>Add to Cart</span></button>
                            <ul class="add-to-links">
                              <li><a href="wishlist.html" title="Add to Wishlist" class="link-wishlist"><span>Add to Wishlist</span></a></li>
                              <li><a href="compare.html" title="Add to Compare" class="link-compare "><span>Add to Compare</span></a></li>
                            </ul>
                          </div>
                        </div>
                        <div class="qv-button-container"> <a href="quick_view.html" class="qv-e-button btn-quickview-1"><span><span>Quick View</span></span></a> </div>
                      </div>
                      <div class="info">
                        <div class="info-inner">
                          <div class="item-title"> <a title=" Sample Product" href="product_detail.html"> Sample Product </a> </div>
                          <!--item-title-->
                          <div class="item-content">
                            <div class="ratings">
                              <div class="rating-box">
                                <div style="width:60%" class="rating"></div>
                              </div>
                            </div>
                            <div class="price-box"> <span class="regular-price"> <span class="price">$422.00</span> </span> </div>
                          </div>
                          <!--item-content--> 
                        </div>
                        <!--info-inner--> 
                        
                        <!--actions-->
                        <div class="clearfix"> </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Item --> 
                  <!-- Item -->
                  <div class="item">
                    <div class="col-item">
                      <div class="images-container"> <a class="product-image" title="Sample Product" href="product_detail.html"> <img alt="a" class="img-responsive" src="https://cms.cloudinary.vpsvc.com/image/upload/c_scale,dpr_auto,f_auto,fl_progressive,w_450/India%20LOB/NVHP/New%20Home%20Page/NVHP%20Tiles%20-%20Blue%20Price%20Tag/Our%20Most%20Popular%20Products/IN_NVHPTiles_VistingCards_01"> </a>
                        <div class="actions">
                          <div class="actions-inner">
                            <button type="button" title="Add to Cart" class="button btn-cart"><span>Add to Cart</span></button>
                            <ul class="add-to-links">
                              <li><a href="wishlist.html" title="Add to Wishlist" class="link-wishlist"><span>Add to Wishlist</span></a></li>
                              <li><a href="compare.html" title="Add to Compare" class="link-compare "><span>Add to Compare</span></a></li>
                            </ul>
                          </div>
                        </div>
                        <div class="qv-button-container"> <a href="quick_view.html" class="qv-e-button btn-quickview-1"><span><span>Quick View</span></span></a> </div>
                      </div>
                      <div class="info">
                        <div class="info-inner">
                          <div class="item-title"> <a title=" Sample Product" href="product_detail.html"> Sample Product </a> </div>
                          <!--item-title-->
                          <div class="item-content">
                            <div class="ratings">
                              <div class="rating-box">
                                <div class="rating" style="width:0%"></div>
                              </div>
                            </div>
                            <div class="price-box"> <span class="regular-price"> <span class="price">$50.00</span> </span> </div>
                          </div>
                          <!--item-content--> 
                        </div>
                        <!--info-inner--> 
                        
                        <!--actions-->
                        <div class="clearfix"> </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Item --> 
                  <!-- Item -->
                  <div class="item">
                    <div class="col-item">
                      <div class="sale-label sale-top-right">Sale</div>
                      <div class="images-container"> <a class="product-image" title="Sample Product" href="product_detail.html"> <img alt="a" class="img-responsive" src="https://cms.cloudinary.vpsvc.com/image/upload/c_scale,dpr_auto,f_auto,fl_progressive,w_450/India%20LOB/NVHP/New%20Home%20Page/NVHP%20Tiles%20-%20Blue%20Price%20Tag/Our%20Most%20Popular%20Products/IN_NVHPTiles_VistingCards_01"> </a>
                        <div class="actions">
                          <div class="actions-inner">
                            <button type="button" title="Add to Cart" class="button btn-cart"><span>Add to Cart</span></button>
                            <ul class="add-to-links">
                              <li><a href="wishlist.html" title="Add to Wishlist" class="link-wishlist"><span>Add to Wishlist</span></a></li>
                              <li><a href="compare.html" title="Add to Compare" class="link-compare "><span>Add to Compare</span></a></li>
                            </ul>
                          </div>
                        </div>
                        <div class="qv-button-container"> <a href="quick_view.html" class="qv-e-button btn-quickview-1"><span><span>Quick View</span></span></a> </div>
                      </div>
                      <div class="info">
                        <div class="info-inner">
                          <div class="item-title"> <a title=" Sample Product" href="product_detail.html"> Sample Product </a> </div>
                          <!--item-title-->
                          <div class="item-content">
                            <div class="ratings">
                              <div class="rating-box">
                                <div class="rating" style="width:50%"></div>
                              </div>
                            </div>
                            <div class="price-box">
                              <p class="special-price"> <span class="price"> $45.00 </span> </p>
                              <p class="old-price"> <span class="price-sep">-</span> <span class="price"> $50.00 </span> </p>
                            </div>
                          </div>
                          <!--item-content--> 
                        </div>
                        <!--info-inner--> 
                        
                        <!--actions-->
                        <div class="clearfix"> </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Item --> 
                  <!-- Item -->
                  <div class="item">
                    <div class="col-item">
                      <div class="sale-label sale-top-right">Sale</div>
                      <div class="images-container"> <a class="product-image" title="Sample Product" href="product_detail.html"> <img alt="a" class="img-responsive" src="https://cms.cloudinary.vpsvc.com/image/upload/c_scale,dpr_auto,f_auto,fl_progressive,w_450/India%20LOB/NVHP/New%20Home%20Page/NVHP%20Tiles%20-%20Blue%20Price%20Tag/Our%20Most%20Popular%20Products/IN_NVHPTiles_VistingCards_01"> </a>
                        <div class="actions">
                          <div class="actions-inner">
                            <button type="button" title="Add to Cart" class="button btn-cart"><span>Add to Cart</span></button>
                            <ul class="add-to-links">
                              <li><a href="wishlist.html" title="Add to Wishlist" class="link-wishlist"><span>Add to Wishlist</span></a></li>
                              <li><a href="compare.html" title="Add to Compare" class="link-compare "><span>Add to Compare</span></a></li>
                            </ul>
                          </div>
                        </div>
                        <div class="qv-button-container"> <a href="quick_view.html" class="qv-e-button btn-quickview-1"><span><span>Quick View</span></span></a> </div>
                      </div>
                      <div class="info">
                        <div class="info-inner">
                          <div class="item-title"> <a title=" Sample Product" href="product_detail.html"> Sample Product </a> </div>
                          <!--item-title-->
                          <div class="item-content">
                            <div class="ratings">
                              <div class="rating-box">
                                <div class="rating" style="width:60%"></div>
                              </div>
                            </div>
                            <div class="price-box">
                              <p class="special-price"> <span class="price"> $45.00 </span> </p>
                              <p class="old-price"> <span class="price-sep">-</span> <span class="price"> $50.00 </span> </p>
                            </div>
                          </div>
                          <!--item-content--> 
                        </div>
                        <!--info-inner--> 
                        
                        <!--actions-->
                        <div class="clearfix"> </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Item --> 
                  <!-- Item -->
                  <div class="item">
                    <div class="col-item">
                      <div class="new-label new-top-right">New</div>
                      <div class="images-container"> <a class="product-image" title="Sample Product" href="product_detail.html"> <img alt="a" class="img-responsive" src="https://cms.cloudinary.vpsvc.com/image/upload/c_scale,dpr_auto,f_auto,fl_progressive,w_450/India%20LOB/NVHP/New%20Home%20Page/NVHP%20Tiles%20-%20Blue%20Price%20Tag/Our%20Most%20Popular%20Products/IN_NVHPTiles_VistingCards_01"> </a>
                        <div class="actions">
                          <div class="actions-inner">
                            <button type="button" title="Add to Cart" class="button btn-cart"><span>Add to Cart</span></button>
                            <ul class="add-to-links">
                              <li><a href="wishlist.html" title="Add to Wishlist" class="link-wishlist"><span>Add to Wishlist</span></a></li>
                              <li><a href="compare.html" title="Add to Compare" class="link-compare "><span>Add to Compare</span></a></li>
                            </ul>
                          </div>
                        </div>
                        <div class="qv-button-container"> <a href="quick_view.html" class="qv-e-button btn-quickview-1"><span><span>Quick View</span></span></a> </div>
                      </div>
                      <div class="info">
                        <div class="info-inner">
                          <div class="item-title"> <a title=" Sample Product" href="product_detail.html"> Sample Product </a> </div>
                          <!--item-title-->
                          <div class="item-content">
                            <div class="ratings">
                              <div class="rating-box">
                                <div class="rating" style="width:60%"></div>
                              </div>
                            </div>
                            <div class="price-box"> <span class="regular-price"> <span class="price">$422.00</span> </span> </div>
                          </div>
                          <!--item-content--> 
                        </div>
                        <!--info-inner--> 
                        
                        <!--actions-->
                        <div class="clearfix"> </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Item --> 
                  
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-xs-12 col-sm-4 wow latest-pro small-pr-slider">
            <div class="slider-items-products">
              <div class="new_title center">
                <h2>Latest Products</h2>
              </div>
              <div id="latest-deals-slider" class="product-flexslider hidden-buttons latest-item">
                <div class="slider-items slider-width-col4"> 
                  <!-- Item -->
                  <div class="item">
                    <div class="col-item">
                      <div class="images-container"> <a class="product-image" title="Sample Product" href="product_detail.html"> <img src="https://cms.cloudinary.vpsvc.com/image/upload/c_scale,dpr_auto,f_auto,fl_progressive,w_450/India%20LOB/NVHP/New%20Home%20Page/NVHP%20Tiles%20-%20Blue%20Price%20Tag/Our%20Most%20Popular%20Products/IN_NVHPTiles_VistingCards_01" class="img-responsive" alt="product-image"> </a>
                        <div class="actions">
                          <div class="actions-inner">
                            <ul class="add-to-links">
                              <li><a href="wishlist.html" title="Add to Wishlist" class="link-wishlist"><span>Add to Wishlist</span></a></li>
                              <li><a href="compare.html" title="Add to Compare" class="link-compare "><span>Add to Compare</span></a></li>
                            </ul>
                          </div>
                        </div>
                        <div class="qv-button-container"> <a href="quick_view.html" class="qv-e-button btn-quickview-1"><span><span>Quick View</span></span></a> </div>
                      </div>
                      <div class="info">
                        <div class="info-inner">
                          <div class="item-title"> <a title=" Sample Product" href="product_detail.html"> Sample Product </a> </div>
                          <!--item-title-->
                          <div class="item-content">
                            <div class="ratings">
                              <div class="rating-box">
                                <div style="width:60%" class="rating"></div>
                              </div>
                            </div>
                            <div class="price-box">
                              <p class="special-price"> <span class="price"> $45.00 </span> </p>
                              <p class="old-price"> <span class="price-sep">-</span> <span class="price"> $50.00 </span> </p>
                            </div>
                          </div>
                          <!--item-content--> 
                        </div>
                        <!--info-inner-->
                        <div class="actions">
                          <button class="button btn-cart" title="Add to Cart" type="button"><span>Add to Cart</span></button>
                        </div>
                        <!--actions-->
                        <div class="clearfix"> </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Item --> 
                  <!-- Item -->
                  <div class="item">
                    <div class="col-item">
                      <div class="images-container"> <a class="product-image" title="Sample Product" href="product_detail.html"> <img src="https://cms.cloudinary.vpsvc.com/image/upload/c_scale,dpr_auto,f_auto,fl_progressive,w_450/India%20LOB/NVHP/New%20Home%20Page/NVHP%20Tiles%20-%20Blue%20Price%20Tag/Our%20Most%20Popular%20Products/IN_NVHPTiles_VistingCards_01" class="img-responsive" alt="a"> </a>
                        <div class="actions">
                          <div class="actions-inner">
                            <ul class="add-to-links">
                              <li><a href="wishlist.html" title="Add to Wishlist" class="link-wishlist"><span>Add to Wishlist</span></a></li>
                              <li><a href="compare.html" title="Add to Compare" class="link-compare "><span>Add to Compare</span></a></li>
                            </ul>
                          </div>
                        </div>
                        <div class="qv-button-container"> <a href="quick_view.html" class="qv-e-button btn-quickview-1"><span><span>Quick View</span></span></a> </div>
                      </div>
                      <div class="info">
                        <div class="info-inner">
                          <div class="item-title"> <a title=" Sample Product" href="product_detail.html"> Sample Product </a> </div>
                          <!--item-title-->
                          <div class="item-content">
                            <div class="ratings">
                              <div class="rating-box">
                                <div style="width:60%" class="rating"></div>
                              </div>
                            </div>
                            <div class="price-box"> <span class="regular-price"> <span class="price">$422.00</span> </span> </div>
                          </div>
                          <!--item-content--> 
                        </div>
                        <!--info-inner-->
                        <div class="actions">
                          <button class="button btn-cart" title="Add to Cart" type="button"><span>Add to Cart</span></button>
                        </div>
                        <!--actions-->
                        <div class="clearfix"> </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Item --> 
                  <!-- Item -->
                  <div class="item">
                    <div class="col-item">
                      <div class="images-container"> <a class="product-image" title="Sample Product" href="product_detail.html"> <img alt="a" class="img-responsive" src="https://cms.cloudinary.vpsvc.com/image/upload/c_scale,dpr_auto,f_auto,fl_progressive,w_450/India%20LOB/NVHP/New%20Home%20Page/NVHP%20Tiles%20-%20Blue%20Price%20Tag/Our%20Most%20Popular%20Products/IN_NVHPTiles_VistingCards_01"> </a>
                        <div class="actions">
                          <div class="actions-inner">
                            <ul class="add-to-links">
                              <li><a href="wishlist.html" title="Add to Wishlist" class="link-wishlist"><span>Add to Wishlist</span></a></li>
                              <li><a href="compare.html" title="Add to Compare" class="link-compare "><span>Add to Compare</span></a></li>
                            </ul>
                          </div>
                        </div>
                        <div class="qv-button-container"> <a href="quick_view.html" class="qv-e-button btn-quickview-1"><span><span>Quick View</span></span></a> </div>
                      </div>
                      <div class="info">
                        <div class="info-inner">
                          <div class="item-title"> <a title=" Sample Product" href="product_detail.html"> Sample Product </a> </div>
                          <!--item-title-->
                          <div class="item-content">
                            <div class="ratings">
                              <div class="rating-box">
                                <div class="rating" style="width:0%"></div>
                              </div>
                            </div>
                            <div class="price-box"> <span class="regular-price"> <span class="price">$50.00</span> </span> </div>
                          </div>
                          <!--item-content--> 
                        </div>
                        <!--info-inner-->
                        <div class="actions">
                          <button class="button btn-cart" title="Add to Cart" type="button"><span>Add to Cart</span></button>
                        </div>
                        <!--actions-->
                        <div class="clearfix"> </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Item --> 
                  <!-- Item -->
                  <div class="item">
                    <div class="col-item">
                      <div class="images-container"> <a class="product-image" title="Sample Product" href="product_detail.html"> <img alt="a" class="img-responsive" src="products-images/product15.jpg"> </a>
                        <div class="actions">
                          <div class="actions-inner">
                            <ul class="add-to-links">
                              <li><a href="wishlist.html" title="Add to Wishlist" class="link-wishlist"><span>Add to Wishlist</span></a></li>
                              <li><a href="compare.html" title="Add to Compare" class="link-compare "><span>Add to Compare</span></a></li>
                            </ul>
                          </div>
                        </div>
                        <div class="qv-button-container"> <a href="quick_view.html" class="qv-e-button btn-quickview-1"><span><span>Quick View</span></span></a> </div>
                      </div>
                      <div class="info">
                        <div class="info-inner">
                          <div class="item-title"> <a title=" Sample Product" href="product_detail.html"> Sample Product </a> </div>
                          <!--item-title-->
                          <div class="item-content">
                            <div class="ratings">
                              <div class="rating-box">
                                <div class="rating" style="width:50%"></div>
                              </div>
                            </div>
                            <div class="price-box">
                              <p class="special-price"> <span class="price"> $45.00 </span> </p>
                              <p class="old-price"> <span class="price-sep">-</span> <span class="price"> $50.00 </span> </p>
                            </div>
                          </div>
                          <!--item-content--> 
                        </div>
                        <!--info-inner-->
                        <div class="actions">
                          <button class="button btn-cart" title="Add to Cart" type="button"><span>Add to Cart</span></button>
                        </div>
                        <!--actions-->
                        <div class="clearfix"> </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Item --> 
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End main container --> 
 
  <!-- banner section -->
  <div class="top-offer-banner wow">
    <div class="container">
      <div class="row">
        <div class="offer-inner col-lg-12"> 
          <!--newsletter-wrap-->
          <div class="left">
            
            <div class="col mid">
              <div class="inner-text">
                <h3>Visting Cards</h3>
              </div>
              <a href="#"><img src="images/offer-banner2.jpg" alt="offer banner2"></a></div>
            <div class="col last">
              <div class="inner-text">
                <h3>Stationery, Letterhead & Stamps </h3>
              </div>
              <a href="#"><img src="images/offer-banner3.jpg" alt="offer banner2"></a></div>
          </div>
          <div class="right">
            <div class="col">
              <div class="inner-text">
                <h4 style="color:black">Top COLLECTION</h4>
                <h3 style="color:black">Banners, Posters & Signs</h3>
                <a href="#" class="shop-now1">Shop now</a> </div>
              <a href="#" title=""><img src="https://cms.cloudinary.vpsvc.com/image/upload/c_scale,dpr_auto,f_auto,fl_progressive,w_600/India%20LOB/NVHP/New%20Home%20Page/Explore%20all%20categories/Explore-all-categories_Banners_-Posters-and-Signs-01" alt="" style="width: 450px;"></a> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- End banner section --> 

  <!-- Footer -->
  <footer class="footer">
    <div class="brand-logo ">
 
    </div>
    <div class="footer-middle container">
      <div class="col-md-3 col-sm-4">
        <div class="footer-logo"><a href="index.html" title="Logo"><img src="{{asset('images/logo-small.png')}}" alt="logo" style="width:80px"></a></div>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus diam arcu. </p>
        <div class="payment-accept">
          <div><img src="images/payment-1.png" alt="payment"> <img src="images/payment-2.png" alt="payment"> <img src="images/payment-3.png" alt="payment"> <img src="images/payment-4.png" alt="payment"></div>
        </div>
      </div>
      <div class="col-md-2 col-sm-4">
        <h4>Shopping Guide</h4>
        <ul class="links">
          <li class="first"><a href="#" title="How to buy">How to buy</a></li>
          <li><a href="faq.html" title="FAQs">FAQs</a></li>
          <li><a href="#" title="Payment">Payment</a></li>
          <li><a href="#" title="Shipment&lt;/a&gt;">Shipment</a></li>
          <li><a href="delivery.html" title="delivery">Delivery</a></li>
          <li class="last"><a href="#" title="Return policy">Return policy</a></li>
        </ul>
      </div>
      <div class="col-md-2 col-sm-4">
        <h4>Style Advisor</h4>
        <ul class="links">
          <li class="first"><a title="Your Account" href="login.html">Your Account</a></li>
          <li><a title="Information" href="#">Information</a></li>
          <li><a title="Addresses" href="#">Addresses</a></li>
          <li><a title="Addresses" href="#">Discount</a></li>
          <li><a title="Orders History" href="#">Orders History</a></li>
          <li class="last"><a title=" Additional Information" href="#">Additional Information</a></li>
        </ul>
      </div>
      <div class="col-md-2 col-sm-4">
        <h4>Information</h4>
        <ul class="links">
          <li class="first"><a href="sitemap.html" title="Site Map">Site Map</a></li>
          <li><a href="#/" title="Search Terms">Search Terms</a></li>
          <li><a href="#" title="Advanced Search">Advanced Search</a></li>
          <li><a href="contact_us.html" title="Contact Us">Contact Us</a></li>
          <li><a href="#" title="Suppliers">Suppliers</a></li>
          <li class=" last"><a href="#" title="Our stores" class="link-rss">Our stores</a></li>
        </ul>
      </div>
      <div class="col-md-3 col-sm-4">
        <h4>Contact us</h4>
        <div class="contacts-info">
          <address>
          <i class="add-icon">&nbsp;</i>123 Main Street, Rohini, <br>
          &nbsp;CA 12345  Rohini
          </address>
          <div class="phone-footer"><i class="phone-icon">&nbsp;</i> +1 800 123 1234</div>
          <div class="email-footer"><i class="email-icon">&nbsp;</i> <a href="mailto:support@graphics.com">support@graphics.com</a> </div>
        </div>
      </div>
    </div>
   <!--  <div class="footer-bottom container">
      <div class="col-sm-5 col-xs-12 coppyright"> &copy; 2023 Amit Computer Graphics. All Rights Reserved.</div>
      <div class="col-sm-7 col-xs-12 company-links">
        <ul class="links">
          <li><a href="#" title="Magento Themes">Magento Themes</a></li>
          <li><a href="#" title="Premium Themes">Premium Themes</a></li>
          <li><a href="#" title="Responsive Themes">Responsive Themes</a></li>
          <li class="last"><a href="#" title="Magento Extensions">Magento Extensions</a></li>
        </ul>
      </div>
    </div> -->
  </footer>
  <!-- End Footer --> 
</div>
<div class="social">
  <ul>
    <li class="fb"><a href="#"></a></li>
    <li class="tw"><a href="#"></a></li>
    <li class="googleplus"><a href="#"></a></li>
    <li class="rss"><a href="#"></a></li>
    <li class="pintrest"><a href="#"></a></li>
    <li class="linkedin"><a href="#"></a></li>
    <li class="youtube"><a href="#"></a></li>
  </ul>
</div>

<!-- JavaScript --> 
<script type="text/javascript" src="js/jquery.min.js"></script> 
<script type="text/javascript" src="js/bootstrap.min.js"></script>  
<script type="text/javascript" src="js/common.js"></script> 
<script type="text/javascript" src="js/revslider.js"></script> 
<script type="text/javascript" src="js/owl.carousel.min.js"></script> 
<script type='text/javascript'>
jQuery(document).ready(function(){
jQuery('#rev_slider_4').show().revolution({
dottedOverlay: 'none',
delay: 5000,
startwidth: 1170,
startheight: 580,

hideThumbs: 200,
thumbWidth: 200,
thumbHeight: 50,
thumbAmount: 2,

navigationType: 'thumb',
navigationArrows: 'solo',
navigationStyle: 'round',

touchenabled: 'on',
onHoverStop: 'on',

swipe_velocity: 0.7,
swipe_min_touches: 1,
swipe_max_touches: 1,
drag_block_vertical: false,

spinner: 'spinner0',
keyboardNavigation: 'off',

navigationHAlign: 'center',
navigationVAlign: 'bottom',
navigationHOffset: 0,
navigationVOffset: 20,

soloArrowLeftHalign: 'left',
soloArrowLeftValign: 'center',
soloArrowLeftHOffset: 20,
soloArrowLeftVOffset: 0,

soloArrowRightHalign: 'right',
soloArrowRightValign: 'center',
soloArrowRightHOffset: 20,
soloArrowRightVOffset: 0,

shadow: 0,
fullWidth: 'on',
fullScreen: 'off',

stopLoop: 'off',
stopAfterLoops: -1,
stopAtSlide: -1,

shuffle: 'off',

autoHeight: 'off',
forceFullWidth: 'on',
fullScreenAlignForce: 'off',
minFullScreenHeight: 0,
hideNavDelayOnMobile: 1500,

hideThumbsOnMobile: 'off',
hideBulletsOnMobile: 'off',
hideArrowsOnMobile: 'off',
hideThumbsUnderResolution: 0,

hideSliderAtLimit: 0,
hideCaptionAtLimit: 0,
hideAllCaptionAtLilmit: 0,
startWithSlide: 0,
fullScreenOffsetContainer: ''
});
});
</script>
</body>
</html>
