@extends('layouts.lander')
  @section('content')
  
  <section class="main-container col1-layout">
    <div class="main container">
      <div class="col-main">
        <div class="row">
             <div class="product-name text-center" style="border-bottom: 1px #ddd dashed;margin-bottom:10px;">
                <h1 style="font-weight:bold;">Add Order</h1>
             </div>
          <div id="appendable" class="product-view wow bounceInUp animated">      
          </div>
             {{-- <div class="product-essential">
              <form action="{{url('order_summision')}}" method="get" id="product_addtocart_form">
                  @method('GET')
                  @csrf
                  <div class="col-md-6">
                      <img style="width:100%;" class="zoomImg" src="images/New Project.png">
                      <p>  Dispatch Time :<br>
                       <span style="color:red;"> 4 - 7 working days</span><br><br>
                        
                        Our Specialization :<br>
                        <span style="color:red;">We are India's No. 1 Die Cut Visiting cards manufacturer.</span><br><br>
                        
                        Product Description :<br>
                        <span style="color:red;">Printed on 400 GSM Art Paper by Komori Lithrone Machine</span>
                        </p>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Order Name</label>
                        <input type="text" class="form-control" placeholder="">
                      </div>
                   
                       <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Product</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option>Choose Product</option>
                          <option value="red">Gold Foil Cards + Die Cut</option>
                            <option value="green">Gold Foil Cards</option>
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
                              <td><input type="number" id="quantity" name="quantity" min="0" max="100"> (Min Qty. : 500)</td>
                            </tr>
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
                            <tr>
                              <td colspan="2"><label><input type="checkbox">  Attach file Online(Allowed File : 94 x 57 mm, 30.00 MB, PDF Only) <a href="#">more info</a></label><br>
                              <label><input type="checkbox"> Send file via Email(Extra Charges - Rs.20.00 is applicable)  <a href="#">more info</a></label></td>
                            </tr>
                            <tr>
                                <td>Cost </td>
                                <td>Rs. 0/-</td>
                            </tr>
                            <tr>
                                <td>GST (18.00%)  </td>
                                <td>Rs. 0/-</td>
                            </tr>
                            <tr>
                                <td>Amount Payable  </td>
                                <td>Rs. 0/-
                                <br> 
                                Free Delivery
                                </td>
                            </tr>
                            <tr>
                            <td>   Special Remark</td>
                            <td><input type="text" class="form-control" placeholder="Remarks for order processing team..."></td>
                            </tr>
                            <tr><td colspan="2"><button class="btn" style="width:100%">Add Order</button></td></tr>
                          </tbody>
                        </table>
                    </div>
                    <div class="green box">
                         <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th scope="col">Select Detail </th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>Quantity</td>
                              <td><input type="number" id="quantity" name="quantity" min="0" max="100"> (Min Qty. : 500)</td>
                            </tr>
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
                              <td colspan="2"><label><input name="attach_file" value="1" type="checkbox">  Attach file Online(Allowed File : 94 x 57 mm, 30.00 MB, PDF Only) <a href="#">more info</a></label><br>
                              <label><input name="via_mail" value="1" type="checkbox">  Send file via Email(Extra Charges - Rs.20.00 is applicable) <a href="#">more info</a></label></td>
                            </tr>
                            <tr>
                                <td>Cost </td>
                                <td>Rs. 0/-</td>
                            </tr>
                            <tr>
                                <td>GST (18.00%)  </td>
                                <td>Rs. 0/-</td>
                            </tr>
                            <tr>
                                <td>Amount Payable  </td>
                                <td>Rs. 0/-
                                <br> 
                                Free Delivery
                                </td>
                            </tr>
                            <tr>
                            <td>   Special Remark</td>
                            <td><input type="text" name="remarks" class="form-control" placeholder="Remarks for order processing team..."></td>
                            </tr>
                            <tr><td colspan="2"><button class="btn" style="width:100%">Add Order</button></td></tr>
                          </tbody>
                        </table>
                    </div>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>  --}}
  </section>
  <!--End main-container --> 
  <script type="text/javascript">
$(document).ready(function(){
    $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

    $.ajax({
        type: "POST",
        url:  '{{url("get_product_order_view")}}',
        data: {'category': "{{$catg->id}}",
                "_token": "{{ csrf_token() }}"},
        success: function (data) 
        {
            $("#appendable").html('');
            $("#appendable").html(data);
        }
    });    
});

function refresh_view(val){
    $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

    $.ajax({
        type: "POST",
        url:  '{{url("get_product_order_view")}}',
        data: {'category': "{{$catg->id}}",
                "_token": "{{ csrf_token() }}",
                "product": val
        },
        success: function (data) 
        {
            $("#appendable").html('');            
            $("#appendable").html(data);
        }
    });    
}
</script>
@endsection