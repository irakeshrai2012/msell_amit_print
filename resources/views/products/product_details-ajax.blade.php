            <div class="product-essential">
              <form action="{{url('order_summision')}}" method="post">
                  @csrf
                  @php
                    if(!empty($product->product_images_json)){
                        $decoded = json_decode($product->product_images_json);
                    }
                    else{
                        $decoded = [];
                    }
                  @endphp
                  <div class="col-md-4">
                        @if(count($decoded) > 0 )
                            @foreach($decoded as $key => $value)
                            <img style="width:100%;" class="zoomImg" src="{{asset($value)}}">
                            @endforeach
                        @endif
                      <p>  Dispatch Time :<br>
                       <span style="color:red;"> {{!empty($product->dispatch_days) ? $product->dispatch_days : ''}} Working Days</span><br><br>
                        
                        <!--Our Specialization :<br>-->
                        <!--<span style="color:red;">We are India's No. 1 Die Cut Visiting cards manufacturer.</span><br><br>-->
                        Product Description :{{ $product->name }}<br>
                        <span style="color:red;"></span>
                        </p>
                  </div>
                  <div class="col-md-8">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Order Name</label>
                        <input type="text" class="form-control" name = "order_name" placeholder="">
                      </div>
                   
                       <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Product</label>
                        <select onchange="refresh_view(this.value)" class="form-control" name = "product_id" id="exampleFormControlSelect1">
                            <option value="">Select</option>
                            @if(!empty($all_products))
                                @foreach($all_products as $key => $value)
                                    @if($key == $product->id)
                                        <option selected="true" value="{{$key}}">{{$value}}</option>                                    
                                    @else
                                        <option value="{{$key}}">{{$value}}</option>                                    
                                    @endif
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="red box">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th scope="col">Select Detail </th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>Quantity</td>
                              <td><input type="number" id="quantity" value="{{!empty($product->min_pur_quantity) ? $product->min_pur_quantity : 0}}" name="quantity" min="{{!empty($product->min_pur_quantity) ? $product->min_pur_quantity : 0}}" >
                              <!--(Min Qty. : 500)-->
                              </td>
                            </tr>
                            {{--
                            <tr>
                              <td>Printing</td>
                              <td> 
                              <select class="form-control" id="exampleFormControlSelect1">
                                  <option>1</option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
                                  <option>5</option>
                                </select>
                            </td>
                            </tr>

                            <tr>
                              <td>Gold Foil</td>
                               <td> 
                                  <select class="form-control" id="exampleFormControlSelect1">
                                      <option>1</option>
                                      <option>2</option>
                                      <option>3</option>
                                      <option>4</option>
                                      <option>5</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                              <td>Spot UV</td>
                               <td> 
                                  <select class="form-control" id="exampleFormControlSelect1">
                                      <option>1</option>
                                      <option>2</option>
                                      <option>3</option>
                                      <option>4</option>
                                      <option>5</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                              <td>Die Shape</td>
                               <td> 
                                  <select class="form-control" id="exampleFormControlSelect1">
                                      <option>1</option>
                                      <option>2</option>
                                      <option>3</option>
                                      <option>4</option>
                                      <option>5</option>
                                    </select>
                                </td>
                            </tr>
                            --}}                            
                            <tr>
                              <td colspan="2"><label><input name="upload_file" onclick="close_modal()" value="1" type="radio">  Attach file Online(Allowed File : 94 x 57 mm, 30.00 MB, PDF Only) <a href="#">more info</a></label><br>
                              <label><input onclick="open_modal()" name="upload_file" value="0" type="radio"> Send file via Email(Extra Charges - Rs.{{!empty($product->email_charge) ? $product->email_charge : 0 }} is applicable)  <a href="#">more info</a></label></td>
                            </tr>
                            <tr id="email_input" style="display:none">
                              <td>
                                  <label>Enter Email Here</label>
                              </td>
                              <td>
                                  <input class="input-text" id="mail_input_feild" placeholder = "Ener Email" colspan="2"></td>
                            </tr>
                            <tr>
                                <td>Cost </td>
                                <td>Rs. {{ $product->price }}/-</td>
                            </tr>
                            <tr>
                                <td>GST {{ !empty($product->tax) ? $product->tax : 0 }} %  </td>
                                @php
                                    if(!empty($product->tax) && $product->tax > 0){
                                        $gst = ($product->price/100)*$product->tax;
                                    }
                                    else{
                                        $gst = 0;
                                    }
                                @endphp
                                <td>Rs. {{!empty($gst) ? $gst : 0}}/-</td>
                            </tr>
                            <tr>
                                <td>Amount Payable  </td>
                                <td>Rs. {{!empty($gst) ? ($gst + $product->price) : $product->price }}/-
                                <br> 
                                Free Delivery
                                </td>
                            </tr>
                            <tr>
                            <td>   Special Remark</td>
                            <td><input type="text" class="form-control" name="remark" placeholder="Remarks for order processing team..."></td>
                            </tr>
                            <tr><td colspan="2"><button type="submit" class="btn" style="width:100%">Add Order</button></td></tr>
                          </tbody>
                        </table>
                    </div>
                  </div> 
              </form>
              
              
              <!--new stucture-->
              <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Party Name</label>
                        <input type="text" class="form-control" placeholder="">
                      </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                        <label>Item</label>
                        <select class="form-control">
                            <option>Letter Heads</option>
                            <option>Multi Color</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" placeholder=""></textarea>
                      </div>
                    </div>
                     <div class="col-md-3">
                        <div class="form-group">
                        <label>Qty</label>
                        <input class="form-control" placeholder="">
                      </div>
                    </div>
                     <div class="col-md-3">
                        <div class="form-group">
                        <label>Rate</label>
                        <input class="form-control" placeholder="">
                      </div>
                    </div>
                     <div class="col-md-3">
                        <div class="form-group">
                        <label>Amount</label>
                        <input class="form-control" placeholder="">
                      </div>
                    </div>
                   <div class="col-md-3"> <button class="btn btn-primary" style="width: 100%;">Add</button> </div>
                </div>
                   <hr>
                   <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">Item Name</th>
                          <th scope="col">Qty</th>
                          <th scope="col">Rate</th>
                          <th scope="col">Amount</th>
                          <th scope="col">Description</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>Mark</td>
                          <td>Otto</td>
                          <td>@mdo</td>
                          <td>@mdo</td>
                        </tr>
                        
                      </tbody>
                    </table>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Base Amount</label>
                                <input class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tax</label>
                                <select class="form-control" style="width:200px">
                                    <option>test</option>
                                </select>
                              <input class="form-control" placeholder="" style="width:200px">
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                <label>Amt After Tax</label>
                               <select class="form-control" style="width:200px">
                                    <option>test</option>
                                </select>
                              <input class="form-control" placeholder="" style="width:200px">
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                <label>Discount</label>
                                <select class="form-control" style="width:200px">
                                    <option>test</option>
                                </select>
                              <input class="form-control" placeholder="" style="width:200px">
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                <label>Advance</label>
                                <select class="form-control" style="width:200px">
                                    <option>test</option>
                                </select>
                              <input class="form-control" placeholder="" style="width:200px">
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                <label>Total Amount</label>
                             <select class="form-control" style="width:200px">
                                    <option>test</option>
                                </select>
                              <input class="form-control" placeholder="" style="width:200px">
                            </div>
                        </div>
                         <div class="col-md-12">
                            <div class="form-group">
                                <label>Remark</label>
                                <input class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
              </div>
              
              <!--end-->
            </div>
          </div>
        </div>
      </div>
      <!-- email Modal -->
<div id="email-modal" class="modal fade">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title h6">Enter Email</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            </div>
                <div class="modal-body text-center">
                    <input name="tracking_code" required="true" class="form-control w-100">
                    <button type="button" class="btn btn-link mt-2" data-dismiss="modal">Cacel</button>
                    <button type="button" id="delete-link" data-dismiss="modal" class="btn btn-primary mt-2"></button>
                </div>
        </div>
    </div>
</div><!-- /.modal -->
<script>
    function open_modal(){
        $("#email_input").css('display' , 'block');
        $("#mail_input_feild").prop('required' , 'true');
    }
    function close_modal(){
        $("#email_input").css('display' , 'none');
        $("#mail_input_feild").prop('required' , 'false');
    }
</script>
