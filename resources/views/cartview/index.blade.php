@extends('layouts.lander')
  @section('content')
  <section class="main-container col1-layout">
    <div class="main container">
      <div class="col-main">
        <div class="cart wow">
          <div class="page-title">
            <h2>Shopping Cart</h2>
          </div>
          @csrf
          <div class="table-responsive">
              <input type="hidden" value="Vwww7itR3zQFe86m" name="form_key">
              <fieldset>
                <table class="data-table cart-table" id="shopping-cart-table">
                  <colgroup>
                  <col width="1">
                  <col>
                  <col width="1">
                  <col width="1">
                  <col width="1">
                  <col width="1">
                  <col width="1">
                  </colgroup>
                  <thead>
                    <tr class="first last">
                      <th rowspan="1">&nbsp;</th>
                      <th rowspan="1"><span class="nobr">Product Name</span></th>
                      <th rowspan="1"></th>
                      <th colspan="1" class="a-center"><span class="nobr">Unit Price</span></th>
                      <th class="a-center" rowspan="1">Qty</th>
                      <th colspan="1" class="a-center">Subtotal</th>
                      <th class="a-center" rowspan="1">&nbsp;</th>
                    </tr>
                  </thead>
                  <form action="{{url('cartupdate')}}" method="post">
                      @csrf
                  <tbody>
                    @php
                      $grand_total = 0;
                    @endphp
                    @if(!empty($data))
                      @foreach($data as $key => $value)
                      <tr class="last even">
                        <td class="image"><a class="product-image" title="Sample Product" href="#women-s-u-tank-top/"><img width="75" alt="Sample Product" src="{{ !empty($value['image']) ? asset($value['image']) : ''}}"></a></td>
                        <td><h2 class="product-name"> <a href="#women-s-u-tank-top/">{{ !empty($value['name']) ? $value['name'] : '' }}</a> </h2></td>
                        <td class="a-center"><a title="Edit item parameters" class="edit-bnt" href="#configure/id/15946/"></a></td>
                        <td class="a-right"><span class="cart-price"> <span class="price">RS. {{ !empty($value['price']) ? $value['price'] :'' }}</span> </span></td>
                        <td class="a-center movewishlist"><input type="number" maxlength="12" class="input-text qty" title="Qty" size="4" value="{{ !empty($value['quantity']) ? $value['quantity'] : '' }}" name="cart[{{$value['id']}}]"></td>
                        @php
                          if(isset($value['quantity']) && isset($value['price'])){
                            $rowtotal = $value['quantity'] * $value['price'];
                          }
                          else{
                            $rowtotal = 0;
                          }
                          $grand_total += $rowtotal;
                        @endphp
                        <td class="a-right movewishlist"><span class="cart-price"> <span class="price">RS .{{$rowtotal}}</span> </span></td>
                        <td class="a-center last"><a class="button remove-item" title="Remove item" href="#"><span><span>Remove item</span></span></a></td>
                      </tr>
                      @endforeach
                    @endif
                  </tbody>
                  <tfoot>
                    <tr class="first last">
                      <td class="a-right last" colspan="50"><button onclick="setLocation('#')" class="button btn-continue" title="Continue Shopping" type="button"><span><span>Continue Shopping</span></span></button>
                        <button class="button btn-update" title="Update Cart" value="update_qty" name="update_cart_action" type="submit"><span><span>Update Cart</span></span></button>
                        <button id="empty_cart_button" class="button btn-empty" title="Clear Cart" value="empty_cart" name="update_cart_action" type="submit"><span><span>Clear Cart</span></span></button></td>
                    </tr>
                  </tfoot>                  
                </form>                  
                </table>
              </fieldset>
          </div>
        <form method="post" action="{{url('checkout')}}">  
        @csrf        
          <!-- BEGIN CART COLLATERALS -->
          <div class="cart-collaterals row">
            <div class="col-sm-4">
              <div class="shipping">
                <h3>Estimate Shipping and Tax</h3>
                <div class="shipping-form">
                    <p>Enter your destination to get a shipping estimate.</p>
                    <ul class="form-list">
                      <li>
                        <label class="required" for="country"><em>*</em>Country</label>
                        <div class="input-box">
                          <select title="Country" class="validate-select" id="country" name="country_id">
                            <option value="">Select</option>
                              @if(!empty($country))
                                @foreach($country as $key2 => $value2)
                                  <option value="{{$key2}}">{{$value2}}</option>
                                @endforeach
                              @endif
                          </select>
                        </div>
                      </li>
                      <li>
                        <label for="region_id">State/Province</label>
                        <div class="input-box">
                          <select style="" title="State/Province" name="state_id" id="region_id" defaultvalue="" class="required-entry validate-select">
                              <option value="">Select</option>
                              @if(!empty($state))
                                @foreach($state as $st => $state)
                                  <option value="{{$st}}">{{$state}}</option>
                                @endforeach
                              @endif
                          </select>
                          <input type="text" style="display:none;" class="input-text required-entry" title="State/Province" value="" name="region" id="region">
                        </div>
                      </li>
                      <li>
                        <label for="postcode">Zip/Postal Code</label>
                        <div class="input-box">
                          <input type="text" value="" name="estimate_postcode" id="postcode" class="input-text validate-postcode">
                        </div>
                      </li>
                    </ul>
                    <div class="buttons-set11">
                      <button class="button get-quote" onclick="coShippingMethodForm.submit()" title="Get a Quote" type="button"><span>Get a Quote</span></button>
                    </div>
                    <!--buttons-set11-->
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="discount">
                <h3>Discount Codes</h3>
                  <label for="coupon_code">Enter your coupon code if you have one.</label>
                  <input type="hidden" value="0" id="remove-coupone" name="remove">
                  <input type="text" value="" name="coupon_code" id="coupon_code" class="input-text fullwidth">
                  <button value="Apply Coupon" onclick="discountForm.submit(false)" class="button coupon " title="Apply Coupon" type="button"><span>Apply Coupon</span></button>
              </div>
            </div>
            <div class="totals col-sm-4">
              <h3>Shopping Cart Total</h3>
              <div class="inner">
                <table class="table shopping-cart-table-total" id="shopping-cart-totals-table">
                  <colgroup>
                  <col>
                  <col width="1">
                  </colgroup>
                  <tfoot>
                    <tr>
                      <td colspan="1" class="a-left" style=""><strong>Grand Total</strong></td>
                      <td class="a-right" style=""><strong><span class="price">RS . {{$grand_total}}</span></strong></td>
                    </tr>
                  </tfoot>
                  <tbody>
                    <tr>
                      <td colspan="1" class="a-left" style=""> Subtotal </td>
                      <td class="a-right" style=""><span class="price">RS. {{$grand_total}}</span></td>
                    </tr>
                  </tbody>
                </table>
                <ul class="checkout">
                  <li>
                    @php
                      $user = \Auth::user();
                    @endphp
                    @if(!empty($user))
                    <button class="button btn-proceed-checkout" type="submit" title="Proceed to Checkout"><span>Proceed to Checkout</span></button>
                    @else
                    <button class="button btn-proceed-checkout" onclick="show_loginmodal()" title="Proceed to Checkout" data-toogle="modal" type="button"><span>Proceed to Checkout</span></button>
                    @endif
                  </li>
                  <br>
                  <li><a title="Checkout with Multiple Addresses" href="multiple_addresses.html">Checkout with Multiple Addresses</a> </li>
                  <br>
                </ul>
              </div>
              <!--inner--> 
              
            </div>
          </div>
            </form>
          
          <!--cart-collaterals--> 
          
        </div>
        <div class="crosssel">
          <div class="new_title center">
            <h2>Based on your selection, you may be interested in the following items:</h2>
          </div>
          <div class="category-products">
            <ul id="crosssell-products-list" class="products-grid first odd">
              <li class="item col-md-3 col-sm-6 col-xs-6">
                <div class="col-item">
                  <div class="sale-label sale-top-right">Sale</div>
                  <div class="images-container"> <a class="product-image" title="Sample Product" href="product_detail.html"> <img alt="a" class="img-responsive" src="products-images/product2.jpg"> </a>
                    <div class="actions">
                      <div class="actions-inner">
                        <button type="button" title="Add to Cart" class="button btn-cart"><span>Add to Cart</span></button>
                        <ul class="add-to-links">
                          <li><a href="wishlist.html" title="Add to Wishlist" class="link-wishlist"><span>Add to Wishlist</span></a></li>
                          <li><a href="compare.html" title="Add to Compare" class="link-compare "><span>Add to Compare</span></a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="qv-button-container"> <a class="qv-e-button btn-quickview-1"><span><span>Quick View</span></span></a> </div>
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
              </li>
              <li class="item col-md-3 col-sm-6 col-xs-6">
                <div class="col-item">
                  <div class="sale-label sale-top-right">Sale</div>
                  <div class="images-container"> <a class="product-image" title="Sample Product" href="product_detail.html"> <img alt="a" class="img-responsive" src="products-images/product5.jpg"> </a>
                    <div class="actions">
                      <div class="actions-inner">
                        <button type="button" title="Add to Cart" class="button btn-cart"><span>Add to Cart</span></button>
                        <ul class="add-to-links">
                          <li><a href="wishlist.html" title="Add to Wishlist" class="link-wishlist"><span>Add to Wishlist</span></a></li>
                          <li><a href="compare.html" title="Add to Compare" class="link-compare "><span>Add to Compare</span></a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="qv-button-container"> <a class="qv-e-button btn-quickview-1" href="quick_view.html"><span><span>Quick View</span></span></a> </div>
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
              </li>
              <li class="item col-md-3 col-sm-6 col-xs-6">
                <div class="col-item">
                  <div class="sale-label sale-top-right">Sale</div>
                  <div class="images-container"> <a class="product-image" title="Sample Product" href="product_detail.html"> <img alt="a" class="img-responsive" src="products-images/product4.jpg"> </a>
                    <div class="actions">
                      <div class="actions-inner">
                        <button type="button" title="Add to Cart" class="button btn-cart"><span>Add to Cart</span></button>
                        <ul class="add-to-links">
                          <li><a href="wishlist.html" title="Add to Wishlist" class="link-wishlist"><span>Add to Wishlist</span></a></li>
                          <li><a href="compare.html" title="Add to Compare" class="link-compare "><span>Add to Compare</span></a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="qv-button-container"> <a class="qv-e-button btn-quickview-1"><span><span>Quick View</span></span></a> </div>
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
              </li>
              <li class="item col-md-3 col-sm-6 col-xs-6">
                <div class="col-item">
                  <div class="sale-label sale-top-right">Sale</div>
                  <div class="images-container"> <a class="product-image" title="Sample Product" href="product_detail.html"> <img alt="a" class="img-responsive" src="products-images/product6.jpg"> </a>
                    <div class="actions">
                      <div class="actions-inner">
                        <button type="button" title="Add to Cart" class="button btn-cart"><span>Add to Cart</span></button>
                        <ul class="add-to-links">
                          <li><a href="wishlist.html" title="Add to Wishlist" class="link-wishlist"><span>Add to Wishlist</span></a></li>
                          <li><a href="compare.html" title="Add to Compare" class="link-compare "><span>Add to Compare</span></a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="qv-button-container"> <a class="qv-e-button btn-quickview-1"><span><span>Quick View</span></span></a> </div>
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
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Footer -->
  <footer class="footer">
    <div class="brand-logo ">
      <div class="container">
        <div class="slider-items-products">
          <div id="brand-logo-slider" class="product-flexslider hidden-buttons">
            <div class="slider-items slider-width-col6"> 
              <!-- Item -->
              <div class="item"> <a href="#x"><img src="images/b-logo1.png" alt="Image"></a> </div>
              <!-- End Item --> 
              <!-- Item -->
              <div class="item"> <a href="#x"><img src="images/b-logo2.png" alt="Image"></a> </div>
              <!-- End Item --> 
              <!-- Item -->
              <div class="item"> <a href="#x"><img src="images/b-logo3.png" alt="Image"></a> </div>
              <!-- End Item --> 
              <!-- Item -->
              <div class="item"> <a href="#x"><img src="images/b-logo4.png" alt="Image"></a> </div>
              <!-- End Item --> 
              <!-- Item -->
              <div class="item"> <a href="#x"><img src="images/b-logo5.png" alt="Image"></a> </div>
              <!-- End Item --> 
              <!-- Item -->
              <div class="item"> <a href="#x"><img src="images/b-logo6.png" alt="Image"></a> </div>
              <!-- End Item --> 
              <!-- Item -->
              <div class="item"> <a href="#x"><img src="images/b-logo1.png" alt="Image"></a> </div>
              <!-- End Item --> 
              <!-- Item -->
              <div class="item"> <a href="#x"><img src="images/b-logo4.png" alt="Image"></a> </div>
              <!-- End Item --> 
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-middle container">
      <div class="col-md-3 col-sm-4">
        <div class="footer-logo"><a href="index.html" title="Logo"><img src="images/footer-logo.png" alt="logo"></a></div>
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
          <i class="add-icon">&nbsp;</i>123 Main Street, Anytown, <br>
          &nbsp;CA 12345  USA
          </address>
          <div class="phone-footer"><i class="phone-icon">&nbsp;</i> +1 800 123 1234</div>
          <div class="email-footer"><i class="email-icon">&nbsp;</i> <a href="mailto:support@magikcommerce.com">support@magikcommerce.com</a> </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom container">
      <div class="col-sm-5 col-xs-12 coppyright"> &copy; 2015 Magikcommerce. All Rights Reserved.</div>
      <div class="col-sm-7 col-xs-12 company-links">
        <ul class="links">
          <li><a href="#" title="Magento Themes">Magento Themes</a></li>
          <li><a href="#" title="Premium Themes">Premium Themes</a></li>
          <li><a href="#" title="Responsive Themes">Responsive Themes</a></li>
          <li class="last"><a href="#" title="Magento Extensions">Magento Extensions</a></li>
        </ul>
      </div>
    </div>
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
    <div class="modal fade" id="login-modal">
        <div class="modal-dialog modal-dialog-zoom">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title fw-600">Login</h6>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="p-1">
                        <form class="form-default" role="form" action="{{url('login')}}" method="POST">
                            @csrf
                                <div class="form-group">
                                    <input  type="text"
                                        class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }} input-text"
                                        value="{{ old('email') }}" placeholder="Email" name="username"
                                        id="email" autocomplete="off">
                                    <input type="hidden" name="is_checking_out" value="1">
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            <div class="form-group">
                                <input type="password"
                                    class="form-control input-text {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                    placeholder="Password" name="password" id="password">
                            </div>

                            <div class="row mb-2">
                                <div class="col-6">
                                    <label class="aiz-checkbox">
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <span class=opacity-60>Remember Me</span>
                                        <span class="aiz-square-check"></span>
                                    </label>
                                </div>
                                <div class="col-6 text-right">
                                    <a href="#"
                                        class="text-reset opacity-60 fs-14">Forgot password?</a>
                                </div>
                            </div>

                            <div class="mb-5 col-md-3">
                                <button type="submit"
                                    class="button btn-proceed-checkout">Login</button>
                            </div>
                        </form>

                    </div>
                    <div class="text-center mb-3">
                        <p class="text-muted mb-0">Dont have an account?</p>
                        <a href="#">Register Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!-- JavaScript --> 
<script type="text/javascript" src="js/jquery.min.js"></script> 
<script type="text/javascript" src="js/bootstrap.min.js"></script> 
 
<script type="text/javascript" src="js/common.js"></script> 
<script type="text/javascript" src="js/owl.carousel.min.js"></script>
</body>
</html>
<script type="text/javascript">
  function show_loginmodal(){
    $("#login-modal").modal();
  }
</script>
@endsection