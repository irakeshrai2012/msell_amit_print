@extends('layouts.lander')
  @section('content')
  <!-- main-container -->
  <div class="main-container col2-right-layout">
    <div class="main container">
      <div class="row">
        <section class="col-main col-sm-9 wow">
          <div class="page-title">
            <h1>Checkout</h1>
          </div>
          <ol class="one-page-checkout" id="checkoutSteps">
            <li id="opc-billing" class="section allow active">
              <div onclick="showonclick('opc-billing-content')" class="step-title"> <span class="number">1</span>
                <h3>Checkout Method</h3>
                <!--<a href="#">Edit</a> --> 
              </div>
              <div id="opc-billing-content" >
              <div id="checkout-step-billing" class="step a-item" style="">
                <form id="co-billing-form" action="">
                  <fieldset class="group-select">
                    <ul>
                      <li>
                        <label for="billing-address-select">Select a billing address from your address book or enter a new address.</label>
                        <br>
                        <select onchange="check_if_new(this.value)" name="billing_address_id" id="billing-address-select" class="address-select" title="">
                          <option value="">Select</option>
                          @foreach($address as $key => $value)
                            <option value="{{ $value->id }}"> {{!empty($value->addr) ? $value->addr : ''}} </option>
                          @endforeach
                          <option value="new">New Address</option>
                        </select>
                      </li>
                      <li id="billing-new-address-form"  style="display: none;">
                        <fieldset>
                          <legend>New Address</legend>
                          <input type="hidden" name="billing[address_id]" value="4269" id="billing:address_id">
                          <ul>
                            <li>
                              <div class="customer-name">
                                <div class="input-box name-firstname">
                                  <label for="billing:firstname"> First Name <span class="required">*</span> </label>
                                  <br>
                                  <input type="text" id="billing:firstname" name="billing[firstname]" value="pranali" title="First Name" class="input-text required-entry">
                                </div>
                                <div class="input-box name-lastname">
                                  <label for="billing:lastname"> Last Name <span class="required">*</span> </label>
                                  <br>
                                  <input type="text" id="billing:lastname" name="billing[lastname]" value="d" title="Last Name" class="input-text required-entry">
                                </div>
                              </div>
                            </li>
                            <li>
                              <div class="input-box">
                                <label for="billing:company">Company</label>
                                <br>
                                <input type="text" id="billing:company" name="billing[company]" value="" title="Company" class="input-text">
                              </div>
                            </li>
                            <li>
                              <label for="billing:street1">Address <span class="required">*</span></label>
                              <br>
                              <input type="text" title="Street Address" name="billing[street][]" id="billing:street1  street1" value="aundh" class="input-text required-entry">
                            </li>
                            <li>
                              <input type="text" title="Street Address 2" name="billing[street][]" id="billing:street2 street2" value="" class="input-text">
                            </li>
                            <li>
                              <div class="input-box">
                                <label for="billing:city">City <span class="required">*</span></label>
                                <br>
                                <input type="text" title="City" name="billing[city]" value="tyyrt" class="input-text required-entry" id="billing:city">
                              </div>
                              <div id="" class="input-box">
                                <label for="billing:region">State/Province <span class="required">*</span></label>
                                <br>
                                <select defaultvalue="1" id="billing:region_id" name="billing[region_id]" title="State/Province" class="validate-select" style="">
                                  <option value="">Please select region, state or province</option>
                                  <option value="1">Alabama</option>
                                </select>
                          
                                <input type="text" id="billing:region" name="billing[region]" value="Alabama" title="State/Province" class="input-text required-entry" style="display: none;">
                              </div>
                            </li>
                            <li>
                              <div class="input-box">
                                <label for="billing:postcode">Zip/Postal Code <span class="required">*</span></label>
                                <br>
                                <input type="text" title="Zip/Postal Code" name="billing[postcode]" id="billing:postcode" value="46532" class="input-text validate-zip-international required-entry">
                              </div>
                              <div class="input-box">
                                <label for="billing:country_id">Country <span class="required">*</span></label>
                                <br>
                                <select name="billing[country_id]" id="billing:country_id" class="validate-select" title="Country">
                                  <option value=""> </option>
                                  <option value="AF">Afghanistan</option>
                                </select>
                              </div>
                            </li>
                            <li>
                              <div class="input-box">
                                <label for="billing:telephone">Telephone <span class="required">*</span></label>
                                <br>
                                <input type="text" name="billing[telephone]" value="454541" title="Telephone" class="input-text required-entry" id="billing:telephone">
                              </div>
                              <div class="input-box">
                                <label for="billing:fax">Fax</label>
                                <br>
                                <input type="text" name="billing[fax]" value="" title="Fax" class="input-text" id="billing:fax">
                              </div>
                            </li>
                            <li>
                              <input type="checkbox" name="billing[save_in_address_book]" value="1" title="Save in address book" id="billing:save_in_address_book" onchange="shipping.setSameAsBilling(false);" class="checkbox">
                              <label for="billing:save_in_address_book">Save in address book</label>
                            </li>
                          </ul>
                        </fieldset>
                      </li>
                      <li>
                        <input type="radio" name="billing[use_for_shipping]" id="billing:use_for_shipping_yes" value="1" onclick="$('shipping:same_as_billing').checked = true;" class="radio">
                        <label for="billing:use_for_shipping_yes">Ship to this address</label>
                        <input type="radio" name="billing[use_for_shipping]" id="billing:use_for_shipping_no" value="0" checked="checked" onclick="$('shipping:same_as_billing').checked = false;" class="radio">
                        <label for="billing:use_for_shipping_no">Ship to different address</label>
                      </li>
                    </ul>
                    <p class="require"><em class="required">* </em>Required Fields</p>
                    <button type="button" class="button continue" onclick="tabnext('opc-shipping' , 'opc-billing')"><span>Continue</span></button>
                  </fieldset>
                </form>
              </div>
            </div>
            </li>
            <li id="opc-shipping" class="section">
              <div onclick="showonclick('opc-shipping-content')" class="step-title"> <span class="number">2</span>
                <h3 class="one_page_heading"> Shipping Information</h3>
                <!--<a href="#">Edit</a>--> 
              </div>
              <div id="opc-shipping-content" style="display: none;">
              <div id="checkout-step-shipping" class="step a-item" >
                <form action="" id="co-shipping-form">
                  <fieldset class="group-select">
                    <ul>
                      <li>
                        <label for="shipping-address-select">Select a shipping address from your address book or enter a new address.</label>
                        <br>
                        <select name="shipping_address_id" id="shipping-address-select" class="address-select" title="" onchange="shipping.newAddress(!this.value)">
                          <option value="1" selected="selected">Shahadra , Delhi ,  Delhi</option>
                          <option value="">New Address</option>
                        </select>
                      </li>
                      <li id="shipping-new-address-form" style="display: none;">
                        <fieldset>
                          <input type="hidden" name="shipping[address_id]" value="" id="shipping:address_id">
                          <ul>
                            <li>
                              <div class="customer-name">
                                <div class="input-box name-firstname">
                                  <label for="shipping:firstname"> First Name <span class="required">*</span> </label>
                                  <br>
                                  <input type="text" id="shipping:firstname" name="shipping[firstname]" value="" title="First Name" class="input-text required-entry" onchange="shipping.setSameAsBilling(false)">
                                </div>
                                <div class="input-box name-lastname">
                                  <label for="shipping:lastname"> Last Name <span class="required">*</span> </label>
                                  <br>
                                  <input type="text" id="shipping:lastname" name="shipping[lastname]" value="" title="Last Name" class="input-text required-entry" onchange="shipping.setSameAsBilling(false)">
                                </div>
                              </div>
                            </li>
                            <li>
                              <div class="input-box">
                                <label for="shipping:company">Company</label>
                                <br>
                                <input type="text" id="shipping:company" name="shipping[company]" value="" title="Company" class="input-text" onchange="shipping.setSameAsBilling(false);">
                              </div>
                            </li>
                            <li>
                              <label for="shipping:street1">Address <span class="required">*</span></label>
                              <br>
                              <input type="text" title="Street Address" name="shipping[street][]" id="shipping:street1" value="" class="input-text required-entry" onchange="shipping.setSameAsBilling(false);">
                            </li>
                            <li>
                              <input type="text" title="Street Address 2" name="shipping[street][]" id="shipping:street2" value="" class="input-text" onchange="shipping.setSameAsBilling(false);">
                            </li>
                            <li>
                              <div class="input-box">
                                <label for="shipping:city">City <span class="required">*</span></label>
                                <br>
                                <input type="text" title="City" name="shipping[city]" value="" class="input-text required-entry" id="shipping:city" onchange="shipping.setSameAsBilling(false);">
                              </div>
                              <div id="" class="input-box">
                                <label for="shipping:region">State/Province <span class="required">*</span></label>
                                <br>
                                <select defaultvalue="" id="shipping:region_id" name="shipping[region_id]" title="State/Province" class="validate-select" style="">
                                  <option value="">Please select region, state or province</option>

                                </select>
                                <input type="text" id="shipping:region" name="shipping[region]" value="" title="State/Province" class="input-text required-entry" style="display: none;">
                              </div>
                            </li>
                            <li>
                              <div class="input-box">
                                <label for="shipping:postcode">Zip/Postal Code <span class="required">*</span></label>
                                <br>
                                <input type="text" title="Zip/Postal Code" name="shipping[postcode]" id="shipping:postcode" value="" class="input-text validate-zip-international required-entry" onchange="shipping.setSameAsBilling(false);">
                              </div>
                              <div class="input-box">
                                <label for="shipping:country_id">Country <span class="required">*</span></label>
                                <br>
                                <select name="shipping[country_id]" id="shipping:country_id" class="validate-select" title="Country" onchange="shipping.setSameAsBilling(false);">
                                  <option value=""> </option>
                                </select>
                              </div>
                            </li>
                            <li>
                              <div class="input-box">
                                <label for="shipping:telephone">Telephone <span class="required">*</span></label>
                                <br>
                                <input type="text" name="shipping[telephone]" value="" title="Telephone" class="input-text required-entry" id="shipping:telephone" onchange="shipping.setSameAsBilling(false);">
                              </div>
                              <div class="input-box">
                                <label for="shipping:fax">Fax</label>
                                <br>
                                <input type="text" name="shipping[fax]" value="" title="Fax" class="input-text" id="shipping:fax" onchange="shipping.setSameAsBilling(false);">
                              </div>
                            </li>
                            <li>
                              <input type="checkbox" name="shipping[save_in_address_book]" value="1" title="Save in address book" id="shipping:save_in_address_book" onchange="shipping.setSameAsBilling(false);" class="checkbox">
                              <label for="shipping:save_in_address_book">Save in address book</label>
                            </li>
                            <li>
                              <input type="checkbox" name="shipping[same_as_billing]" id="shipping:same_as_billing" value="1" onclick="shipping.setSameAsBilling(this.checked)" class="checkbox">
                              <label for="shipping:same_as_billing">Use Billing Address</label>
                            </li>
                          </ul>
                        </fieldset>
                      </li>
                    </ul>
                    <p class="require"><em class="required">* </em>Required Fields</p>
                    <div class="buttons-set1" id="shipping-buttons-container">
                      <button type="button" class="button" onclick="tabnext('opc-shipping_method' , 'opc-shipping')"><span>Continue</span></button>
                      <a href="#" onclick="checkout.back(); return false;" class="back-link">« Back</a> </div>
                  </fieldset>
                </form>
              </div>
            </div>
            </li>
            <li id="opc-shipping_method" class="section">
              <div onclick="showonclick('opc-shipping_method-content')"  class="step-title"> <span class="number">3</span>
                <h3 class="one_page_heading">Shipping Method</h3>
                <!--<a href="#">Edit</a>--> 
              </div>
              <div id="opc-shipping_method-content" style="display: none;">
              <div id="checkout-step-shipping_method" class="step a-item" >
                <form id="co-shipping-method-form" action="">
                  <fieldset>
                    <div id="checkout-shipping-method-load">
                      <dl class="shipping-methods">
                        <dt>Flat Rate</dt>
                        <dd>
                          <ul>
                            <li>
                              <input type="radio" name="shipping_method" value="flatrate_flatrate" id="s_method_flatrate_flatrate" checked="checked" class="radio">
                              <label for="s_method_flatrate_flatrate">Fixed <span class="price">RS {{!empty($total) ? $total : 0}}</span> </label>
                            </li>
                          </ul>
                        </dd>
                      </dl>
                    </div>
                    {{--
                    <div id="onepage-checkout-shipping-method-additional-load">
                      <div class="add-gift-message">
                        <h4>Do you have any gift items in your order?</h4>
                        <p>
                          <input type="checkbox" name="allow_gift_messages" id="allow_gift_messages" value="1" onclick="toogleVisibilityOnObjects(this, ['allow-gift-message-container']);" class="checkbox">
                          <label for="allow_gift_messages">Check this checkbox if you want to add gift messages.</label>
                        </p>
                      </div>
                      <div style="display: none;" class="gift-message-form" id="allow-gift-message-container">
                        <div class="inner-box"> </div>
                      </div>
                    </div>
                    --}}
                    <div class="buttons-set1" id="shipping-method-buttons-container">
                      <button type="button" class="button" onclick="tabnext('opc-payment' , 'opc-shipping_method')"><span>Continue</span></button>
                      <a href="#" onclick="checkout.back(); return false;" class="back-link">« Back</a> </div>
                  </fieldset>
                </form>
              </div>
            </div>
            </li>
            <li id="opc-payment" class="section">
              <div onclick="showonclick('opc-payment-content')" class="step-title"> <span class="number">4</span>
                <h3 class="one_page_heading">Payment Information</h3>
                <!--<a href="#">Edit</a>--> 
              </div>
              <div id="opc-payment-content" style="display: none;">
              <div id="checkout-step-payment" class="step a-item">

                <form action="" id="co-payment-form">
                  <dl id="checkout-payment-method-load">
                    <dt>
                      <input type="radio" id="p_method_checkmo" value="checkmo" name="payment[method]" title="Check / Money order" onclick="payment.switchMethod('checkmo')" class="radio">
                      <label for="p_method_checkmo">Cash On Delivery</label>
                    </dt>
                    {{--
                    <dd>
                      <fieldset class="form-list">
                      </fieldset>
                    </dd>
                    <dt>
                      <input type="radio" id="p_method_ccsave" value="ccsave" name="payment[method]" title="Credit Card (saved)" onclick="payment.switchMethod('ccsave')" class="radio">
                      <label for="p_method_ccsave">Credit Card (saved)</label>
                    </dt>
                    <dd>
                      <fieldset class="form-list">
                        <ul id="payment_form_ccsave" >
                          <li>
                            <div class="input-box">
                              <label for="ccsave_cc_owner">Name on Card <span class="required">*</span></label>
                              <br>
                              <input type="text" disabled="" title="Name on Card" class="input-text required-entry" id="ccsave_cc_owner" name="payment[cc_owner]" value="">
                            </div>
                          </li>
                          <li>
                            <div class="input-box">
                              <label for="ccsave_cc_type">Credit Card Type <span class="required">*</span></label>
                              <br>
                              <select disabled="" id="ccsave_cc_type" name="payment[cc_type]" class="required-entry validate-cc-type-select">
                                <option value="">--Please Select--</option>
                                <option value="AE">American Express</option>
                                <option value="VI">Visa</option>
                                <option value="MC">MasterCard</option>
                                <option value="DI">Discover</option>
                              </select>
                            </div>
                          </li>
                          <li>
                            <div class="input-box">
                              <label for="ccsave_cc_number">Credit Card Number <span class="required">*</span></label>
                              <br>
                              <input type="text" disabled="" id="ccsave_cc_number" name="payment[cc_number]" title="Credit Card Number" class="input-text validate-cc-number validate-cc-type" value="">
                            </div>
                          </li>
                          <li>
                            <div class="input-box">
                              <label for="ccsave_expiration">Expiration Date <span class="required">*</span></label>
                              <br>
                              <div class="v-fix">
                                <select disabled="" id="ccsave_expiration" style="width: 140px;" name="payment[cc_exp_month]" class="required-entry">
                                  <option value="" selected="selected">Month</option>
                                  <option value="1">01 - January</option>
                                  <option value="2">02 - February</option>
                                  <option value="3">03 - March</option>
                                  <option value="4">04 - April</option>
                                  <option value="5">05 - May</option>
                                  <option value="6">06 - June</option>
                                  <option value="7">07 - July</option>
                                  <option value="8">08 - August</option>
                                  <option value="9">09 - September</option>
                                  <option value="10">10 - October</option>
                                  <option value="11">11 - November</option>
                                  <option value="12">12 - December</option>
                                </select>
                              </div>
                              <div class="v-fix">
                                <select disabled="" id="ccsave_expiration_yr" style="width: 103px;" name="payment[cc_exp_year]" class="required-entry">
                                  <option value="" selected="selected">Year</option>
                                  <option value="2011">2011</option>
                                  <option value="2012">2012</option>
                                  <option value="2013">2013</option>
                                  <option value="2014">2014</option>
                                  <option value="2015">2015</option>
                                  <option value="2016">2016</option>
                                  <option value="2017">2017</option>
                                  <option value="2018">2018</option>
                                  <option value="2019">2019</option>
                                  <option value="2020">2020</option>
                                  <option value="2021">2021</option>
                                </select>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="input-box">
                              <label for="ccsave_cc_cid">Card Verification Number <span class="required">*</span></label>
                              <br>
                              <div class="v-fix">
                                <input type="text" disabled="" title="Card Verification Number" class="input-text required-entry validate-cc-cvn" id="ccsave_cc_cid" name="payment[cc_cid]" style="width: 3em;" value="">
                              </div>
                              <a href="#" class="cvv-what-is-this">What is this?</a> </div>
                          </li>
                        </ul>
                      </fieldset>
                    </dd>
                  </dl>
                </form>
                --}}
                <p class="require"><em class="required">* </em>Required Fields</p>
                <div class="buttons-set1" id="payment-buttons-container">
                  <button type="button" class="button" onclick="tabnext('opc-review' , 'opc-payment')"><span>Continue</span></button>
                  <a href="#" onclick="checkout.back(); return false;" class="back-link">« Back</a> </div>
                <div style="clear: both;"></div>
              </div>
            </div>
            </li>
            <li id="opc-review" class="section">
              <div onclick="showonclick('opc-review-content')" class="step-title"> <span class="number">5</span>
                <h3 class="one_page_heading">Order Review</h3>
                <!--<a href="#">Edit</a>--> 
              </div>
              <div id="opc-review-content" style="display: none;">
              <div id="checkout-step-review" class="step a-item" >
                <div class="order-review" id="checkout-review-load"> </div>
                <div class="buttons-set13" id="review-buttons-container">
                  <p class="f-left">Forgot an Item? <a href="#cart/">Edit Your Cart</a></p>
                  <div class="row table-responsive">
                    <table class="table" data-toogle="table">
                      <thead></thead>                      
                    </table>
                  </div>
                  <button type="submit" class="button"  onclick="review.save();"><span>Place Order</span></button>
                </div>
              </div>
            </div>
            </li>
          </ol>
        </section>
        <aside class="col-right sidebar col-sm-3 wow">
          <div class="block block-progress">
            <div class="block-title ">Your Checkout</div>
            <div class="block-content">
              <dl>
                <dt class="complete"> Billing Address <span class="separator">|</span> <a onclick="checkout.gotoSection('billing'); return false;" href="#billing">Change</a> </dt>
                <dd class="complete">
                  <address>
                  swapna taru<br>
                  Better Technology Labs.<br>
                  23 North Main Stree<br>
                  Windsor<br>
                  Holtsville,  New York, 00501<br>
                  United States<br>
                  T: 5465465 <br>
                  F: 466523
                  </address>
                </dd>
                <dt class="complete"> Shipping Address <span class="separator">|</span> <a onclick="checkout.gotoSection('shipping');return false;" href="#payment">Change</a> </dt>
                <dd class="complete">
                  <address>
                  swapna taru<br>
                  Better Technology Labs.<br>
                  23 North Main Stree<br>
                  Windsor<br>
                  Holtsville,  New York, 00501<br>
                  United States<br>
                  T: 5465465 <br>
                  F: 466523
                  </address>
                </dd>
                <dt class="complete"> Shipping Method <span class="separator">|</span> <a onclick="checkout.gotoSection('shipping_method'); return false;" href="#shipping_method">Change</a> </dt>
                <dd class="complete"> Flat Rate - Fixed <br>
                  <span class="price">$15.00</span> </dd>
                <dt> Payment Method </dt>
              </dl>
            </div>
          </div>
        </aside>
      </div>
    </div>
  </div>
  <!--End main-container --> 
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
    alert(val);
    if(val == 'new'){
        $("#billing-new-address-form").css('display' , 'block');
    }
  }
</script>
@endsection