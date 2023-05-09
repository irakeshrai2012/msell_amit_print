@extends('layouts.lander')
  @section('content')
  <section class="main-container col1-layout">
    <div class="main container">
      <div class="col-main">
        <div class="row">
             <div class="product-name text-center" style="border-bottom: 1px #ddd dashed;margin-bottom:10px;">
                <h1 style="font-weight:bold;"> {{ !empty($data->name) ? $data->name : '' }} </h1>
             </div>
          <div class="product-view wow bounceInUp animated">
            <div class="product-essential">
              <form action="#" method="post" id="product_addtocart_form">
                  <div class="col-md-6">
                       <img style="width:100%;" class="zoomImg" src="{{ !empty($data->image_name) ? asset($data->image_name) : '' }}">
                      <p>  Dispatch Time :<br>
                       <span style="color:red;"> 4 - 7 working days</span><br><br>
                        
                        <!-- Our Specialization :<br> -->
                        <!-- <span style="color:red;">We are India's No. 1 Die Cut Visiting cards manufacturer.</span><br><br> -->
                        
                        <!-- Product Description :<br> -->
                        <!-- <span style="color:red;">Printed on 400 GSM Art Paper by Komori Lithrone Machine</span> -->
                        </p>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Quantity</label>
                        <input type="text" class="form-control" value="1" placeholder="Quantity">
                      </div>
                   
                       <div class="form-group text-center">
                          <button type= "button" onclick="add_to_cart('{{$data->id}}')" class="btn btn-primary">Add To Cart</button>
                        </div>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--End main-container --> 

@include('layouts.footer')
<script type="text/javascript">
  function add_to_cart(prod){
    $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

    $.ajax({
        type: "POST",
        url:  '{{url("add_to_cart")}}',
        dataType: 'json',
        data: {'product': prod,
                "_token": "{{ csrf_token() }}"},
        success: function (data) 
        {
          if(data.res == 200){
            var url_prefix = "{{asset('product-images')}}" + '/';
            var arr = data.arr;
            var html = '';
            var subtotal = 0;
            arr.forEach(function(key){
              subtotal += key.price;
              html += `<li class="item even"> <a class="product-image" href="#" title="${key.name}"><img alt="${key.name}" src="${url_prefix}${key.image}" width="80"></a>
                      <div class="detail-item">
                        <div class="product-details"> <a href="#" title="Remove This Item" onclick="" class="glyphicon glyphicon-remove">&nbsp;</a> <a class="glyphicon glyphicon-pencil" title="Edit item" href="#">&nbsp;</a>
                          <p class="product-name"> <a href="#" title="Downloadable Product">${key.name} </a> </p>
                        </div>
                        <div class="product-details-bottom"> <span class="price">RS. ${key.price}</span> <span class="title-desc">Qty: </span> <strong>${key.quantity}</strong> </div>
                      </div>
                    </li>`;
            });
            $("#cart-sidebar").html('');
            $("#cart-sidebar").html(html);
            $("#subtotal").html('RS. '+subtotal);
          }
        }
    });            
  }  
</script>
@endsection