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
            <div class="product-essential">
              <!--new stucture-->
              <div id="image_appendable" class="col-md-4" style="height:100px;">
                  
              </div>
              <form action="{{url('submit_order')}}" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Party Name</label>
                        <input type="text" id="party_name" name="party_name" class="form-control" placeholder="Party Name" value="{{Auth::user()->name}}">
                      </div>
                    </div>
                    <hr>
                   <div class="col-md-12">
                     <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">Item Name</th>
                          <th scope="col">Qty</th>
                          <th scope="col">Rate</th>
                          <th scope="col">Tax</th>
                          <th scope="col">Amount</th>
                          <th scope="col">Description</th>
                        </tr>
                      </thead>
                      <tbody id="ordered">
                        
                      </tbody>

                      <tfoot>
                        <tr>
                          <th scope="col" colspan="4">Total amount</th>
                          
                          <th scope="col" colspan="2" id="total_order_amount">0.00</th>
                        </tr>
                      </tfoot>

                    </table>
                   </div>
                    <hr>
                    <div class="col-md-12">
                        <div class="row">
                           
                        <div class="col-md-12">
                                <label class="form-label">Category</label>
                                <select id="parent" onchange="change_parents()" class="form-control">
                                    <option value="">Select</option>            
                                    @if(!empty($parents))
                                        @foreach($parents as $key => $value)
                                            <option value="{{$key}}" @if($selected_product) @if($selected_product->category==$key) selected @endif @endif>{{$value}}</option>
                                        @endforeach
                                    @endif                                    
                                </select>
                            </div>
                            

                            <!-- <div class="col-md-4">
                                <label class="form-label">Sub Category</label>
                                <select id="category" onchange="change_items()" class="form-control">
                                    <option value="">Select</option>            
                                    @if(!empty($master_catg_sibblings))
                                        @foreach($master_catg_sibblings as $key => $value)
                                            <option value="{{$key}}" @if($master_of_master->id==$key) selected @endif>{{$value}}</option>
                                        @endforeach
                                    @endif                                    
                                </select>
                            </div>

                            
                            <div class="col-md-4">
                                <label class="form-label">Product Type</label>
                                <select id="subcategory" onchange="change_subitems()" class="form-control">
                                    <option value="">Select</option>
                                    @if(!empty($catg_sibblings))
                                        @foreach($catg_sibblings as $key => $value)
                                            <option value="{{$key}}" @if($id==$key) selected @endif>{{$value}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                        <label>Item</label>
                        <select onchange="get_prod_info(this.value)" id="product" name="product" class="form-control">
                            <option value="">Select</option>
                            @if(!empty($products))
                                @foreach($products as $prod_key => $product)
                                    <option value="{{$product->id}}" @if($selected_product->id==$product->id) selected @endif  >{{$product->name}}</option>
                                @endforeach
                            @endif
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" readonly id="description" class="form-control" placeholder=""></textarea>
                      </div>
                    </div>
                     <div class="col-md-3">
                        <div class="form-group">
                        <label>Qty</label>
                        <input onkeyup="calculate_amount(this.value)" class="form-control" name="qty" id="qty" placeholder="">
                        <input type="hidden" name="order_id" id="order_id" >
                      </div>
                    </div>
                     <div class="col-md-3">
                        <div class="form-group">
                        <label>Rate</label>
                        <input class="form-control" readonly id="rate" name="rate" placeholder="">
                      </div>
                    </div>
                     <div class="col-md-3">
                        <div class="form-group">
                            <label>Base Amount</label>
                            <input id="base_amount" readonly name="base_amount" class="form-control" placeholder="">
                        </div>
                    </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Tax</label>
                              <input class="form-control" readonly id="tax" name="tax" placeholder="" >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Discount</label>
                              <input class="form-control" id="discount" name="discount" readonly placeholder="" >
                            </div>
                        </div>
                     <div class="col-md-3">
                        <div class="form-group">
                        <label>Total Amount</label>
                        <input class="form-control" id="amount" readonly name="amount" placeholder="">
                      </div>
                    </div>
                    
                   <div class="col-md-3"><br/> <button onclick="fill_order()" type="button" class="btn btn-primary" style="width: 100%;">Add</button> </div>
                </div>
                   
                    <div class="row">
                        <!-- <div class="col-md-6">-->
                        <!--    <div class="form-group">-->
                        <!--        <label>Amt After Tax</label>-->
                        <!--      <input class="form-control" id="amt_after_tax" readonly name="amt_after_tax" placeholder="" style="width:200px">-->
                        <!--    </div>-->
                        <!--</div>-->
                         
                        <!-- <div class="col-md-6">-->
                        <!--    <div class="form-group">-->
                        <!--        <label>Total Amount</label>-->
                        <!--      <input class="form-control" id="tot_amount" placeholder="" readonly style="width:200px">-->
                        <!--    </div>-->
                        <!--</div>-->

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Product Image</label>
                                <input type="file" id="file" name="images[]" class="form-control" placeholder="" multiple>
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                <label>Remark</label>
                                <input id="remark" name="remark" class="form-control" placeholder="">
                            </div>
                        </div>
                    <!-- <div class="col-md-12">
                            <input class="btn btn-primary" placeholder="Place Order" disable style="width:50%">
                        </div> -->
                        <div class="col-md-12">
                            <input class="btn btn-primary" type="submit" placeholder="Place Order" disable style="width:50%">
                        </div>                        
                    </div>
              </div>
              </form>
              <!--end-->
            </div>
          </div>
        </div>
      </div>
          </div>
        </div>
        </div>
    </div>
  </section>
  <!--End main-container -->  
<script>

    var total_order_amount=0;

    get_prod_info({{$selected_product->id}});

    // function change_parents(){
    //     var master = $("#parent").val();
    //     //var catg = $("#category").val();
    //     var ddlSlots = $("#category");
    //     ddlSlots.find('option').remove();
    //       $("#product").find('option').remove();
    //         $("#ordered").append('');
    //         $("#amt_after_tax").val('');
    //         $("#discount").val('');
    //         $("#tot_amount").val('');
    //         $("#base_amount").val('');
    //         $("#tax").val('');
    //         $("#rate").val('');
    //         $("#amount").val('');
    //         $("#qty").val('');
        
        
    //     $.ajaxSetup({
    //                 headers: {
    //                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //                 }
    //             });
    //     $.ajax({
    //         type: "POST",
    //         url:  '{{url("get_catg_items")}}',
    //         data: {'master_catg': "master",
    //                 "_token": "{{ csrf_token() }}",
    //                 "sub_catg": master
    //         },
    //         success: function (data) 
    //         {
    //             ddlSlots.find('option').remove();
    //             ddlSlots.append('<option value="">Select Subcategory</option>');
    //             $.each(data.child, function (index, value) {
    //                     ddlSlots.append('<option value=' +index + '>' + value + '</option>');
                    
    //             });
                 

                
    //         }
    //     });                  
    // }



     function change_parents(){
        var master = $("#parent").val();
        //var catg = $("#category").val();
        var ddlSlots = $("#product");
        ddlSlots.find('option').remove();
        $("#ordered").append('');
        $("#amt_after_tax").val('');
        $("#discount").val('');
        $("#tot_amount").val('');
        $("#base_amount").val('');
        $("#tax").val('');
        $("#rate").val('');
        $("#amount").val('');
        $("#qty").val('');
        
        $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
        $.ajax({
            type: "POST",
            url:  '{{url("get_product_items")}}',
            data: {'master_catg': "master",
                    "_token": "{{ csrf_token() }}",
                    "sub_catg": master
            },
            success: function (data) 
            {
                ddlSlots.find('option').remove();
                ddlSlots.append('<option value="">Select Products</option>');
                $.each(data.products, function (index, value) {
                        ddlSlots.append('<option value=' +index + '>' + value + '</option>');
                    
                });
                 

                
            }
        }); 
    }


    function change_items(){
        var master = $("#category").val();
        //var catg = $("#category").val();
        var ddlSlots = $("#subcategory");
        ddlSlots.find('option').remove();

          $("#product").find('option').remove();
            $("#ordered").append('');
            $("#amt_after_tax").val('');
            $("#discount").val('');
            $("#tot_amount").val('');
            $("#base_amount").val('');
            $("#tax").val('');
            $("#rate").val('');
            $("#amount").val('');
            $("#qty").val('');
        
        
        $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
        $.ajax({
            type: "POST",
            url:  '{{url("get_catg_items")}}',
            data: {'master_catg': "master",
                    "_token": "{{ csrf_token() }}",
                    "sub_catg": master
            },
            success: function (data) 
            {
                ddlSlots.find('option').remove();
                ddlSlots.append('<option value="">Select Subcategory</option>');
                $.each(data.child, function (index, value) {
                        ddlSlots.append('<option value=' +index + '>' + value + '</option>');
                    
                });
                 

                
            }
        });                  
    }


    function change_subitems(){
        var master = $("#subcategory").val();
        //var catg = $("#category").val();
        var ddlSlots = $("#product");
        ddlSlots.find('option').remove();

        $("#ordered").append('');
        $("#amt_after_tax").val('');
        $("#discount").val('');
        $("#tot_amount").val('');
        $("#base_amount").val('');
        $("#tax").val('');
        $("#rate").val('');
        $("#amount").val('');
        $("#qty").val('');
        
        $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
        $.ajax({
            type: "POST",
            url:  '{{url("get_product_items")}}',
            data: {'master_catg': "master",
                    "_token": "{{ csrf_token() }}",
                    "sub_catg": master
            },
            success: function (data) 
            {
                ddlSlots.find('option').remove();
                ddlSlots.append('<option value="">Select Products</option>');
                $.each(data.products, function (index, value) {
                        ddlSlots.append('<option value=' +index + '>' + value + '</option>');
                    
                });
                 

                
            }
        });                  
    }
    function get_prod_info(val){
        var catg = $("#subcategory").val();
        $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
        $.ajax({
            type: "POST",
            url:  '{{url("get_product_details")}}',
            data: {'category': '{{$catg}}',
                    "_token": "{{ csrf_token() }}",
                    "product": val
            },
            success: function (data) 
            {
                $("#rate").val(data.price);
                $("#decription").val(data.description);
                $("#base_amount").val(data.price);
                $("#tax").val(data.tax?data.tax:0 +'%');            
                
                var after_tax_amt = (parseInt(data.price)*parseInt(data.tax))/100;
                $("#amt_after_tax").val(after_tax_amt + parseInt(data.price));
                $("#tot_amount").val(after_tax_amt + parseInt(data.price));
                $("#discount").val(data.discount);
                $("#image_appendable").html(`<img src="${data.image_full_url}" style="height:100px;">`)
            }
        });          
    }
    function calculate_amount(val){
        var rate = $("#rate").val();
        if(rate != ''){
            var amt = parseInt(val)*parseInt(rate);
            $("#base_amount").val(amt);
            var tax = $("#tax").val();
            
            var amt_after_tax = amt*parseInt(tax)/100;
            $("#amount").val(parseInt(amt_after_tax) + parseInt(amt));
            $("#amt_after_tax").val(parseInt(amt_after_tax) + parseInt(amt));
            $("#tot_amount").val(parseInt(amt_after_tax) + parseInt(amt));
        }
    }
    function fill_order(){
        var product = $("#product").val();
        var qty =  $("#qty").val();
        var order_id = $("#order_id").val();

    $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
        $.ajax({
            type: "POST",
            url:  '{{url("fill_order")}}',
            data: {'category': "{{$catg->id}}",
                    "_token": "{{ csrf_token() }}",
                    "product": product,
                    "qty" : qty,
                    "order_id":order_id,
            },
            success: function (data) 
            {
                if(data.res == 200){
                    $("#order_id").val(data.order_id);
                    var arr = data.data;
                    
                    var html = `<tr>
                                <td>${arr.name}</td>
                                <td>${arr.qty}</td>
                                <td>${arr.rate}</td>
                                <td>${arr.tax}</td>
                                <td>${arr.amount}</td>
                                <td></td>
                            </tr>`;

                            total_order_amount=total_order_amount+arr.amount;
                            $("#ordered").append(html);
                            $("#amt_after_tax").val('');
                            $("#discount").val('');
                            $("#tot_amount").val('');
                            $("#base_amount").val('');
                            $("#tax").val('');
                            $("#rate").val('');
                            $("#amount").val('');
                            $("#qty").val('');
                            $("#total_order_amount").text(total_order_amount);
                }
                else if(data.res == 400){
                  alert(data.msg);
                }
            }
        });        
    }
</script>
@endsection