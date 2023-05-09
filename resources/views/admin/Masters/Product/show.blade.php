@extends('admin.layouts.admin')
  @section('content')
  <section id="content" class="content">
    <div class="content__header content__boxed rounded-0">
        <div class="content__wrap">

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Products</a></li>
                     <li class="breadcrumb-item"><a href="#">Product</a></li>
                     <li class="breadcrumb-item"><a href="#">Show Product</a></li>
                    
                </ol>
            </nav>
            <!-- END : Breadcrumb -->

  
            

        </div>

    </div>
    <div class="content__boxed main container">
      <div class="content__wrap col-main">
        <div class="row">
             <div class="product-name text-center" style="border-bottom: 1px #ddd dashed;margin-bottom:10px;">
                <h1 style="font-weight:bold;">Product Detail</h1>
             </div>
          <div class="card product-view wow bounceInUp animated">
            <div class="card-body product-essential">
                <div class="red box">
                  @php
                    $encrypt_id = encrypt($data->id);
                  @endphp
                   
                    <div class="row form-group">
                      <div class="col-md-2">
                        <label class="">Name</label><br>
                        <input type="text" placeholder="Product Name" required="true" class="form-control input-text required-entry" name="name" value="{{$data->name}}">
                      </div>
<!--                       <div class="col-md-3">
                        <label>Description</label><br>
                        <textarea placeholder="Description" class="col-md-12" name="description"></textarea>
                      </div>        -->
                      <div  class="col-md-2">
                        <label>Cetegory</label><br>
                        <select required="true"  name="category" id="parnet" class="form-select address-select col-md-12" title="">
                          <option value="">Select</option>
                          @if(!empty($categories))
                            @foreach($categories  as $key => $value)
                              <option value="{{ $key }}" @if($data->category==$key) selected @endif>{{ $value }}</option>
                            @endforeach
                          @endif
                        </select>
                      </div>
                      <div class="col-md-2">
                        <label>Price</label><br>
                        <input type="number" placeholder="Price" class="form-control input-text required-entry col-md-12" required="true" name="price" value="{{$data->price}}">
                      </div>
                      <div class="col-md-2">
                        <label>Tax (%)</label><br>
                        
                        <select required="true"  name="tax"  class="form-select address-select col-md-12" title="" required="true">
                          <option value="">Select</option>
                          @if(!empty($taxes))
                            @foreach($taxes  as $key => $value)
                              <option value="{{ $value->tax_per }}" @if($value->tax_per==$data->tax) selected @endif>{{ $value->tax_per }}</option>
                            @endforeach
                          @endif
                        </select>
                      </div>       
                      <div class="col-md-2">
                          <label>Dispach Time (Days)</label><br>
                          <input type="number" class="form-control input-text" name="dispatch_days" value="{{$data->dispatch_days}}">
                      </div>
                      <div>
                          <label>Via Mail Charge</label>
                          <input type="number" class="form-control input-text" name="email_charge" value="{{$data->email_charge}}">
                      </div>
                      <div class="col-md-2">
                          <label>Minimum Purchase Quantity</label>
                          <input type="number" name="min_quantity" value="1" class="form-control input-text" value="{{$data->min_quantity}}">
                      </div>
                      <input type="text" style="display:none;" id="product_images" name="product_images">

                      <div id="uploadable_grid" class="row red-box">
                        <h3>Uplodables</h3>
                        <div class="col-md-4">
                          <label>Type</label><br>
                          <select class="form-select address-select"  name="uploadable_type[]">
                              <option value="image">Image</option>
                              <option value="pdf">PDF</option>                                    
                          </select>
                      </div>                    
                      <div class="col-md-4">
                          <label>Name</label><br>
                          <input type="text" class="form-control input-text" name="uploadable_name[]">
                      </div>
                      <div class="col-md-2">
                          <label>Max File Size</label><br>
                          <input type="number" class="form-control input-text" name="file_size[]">
                      </div>                    
                      <div class="col-md-2">
                          <button type="button" class="btn btn-primary mt-3" onclick="add_row()">Add More</button>
                      </div>
                      </div> 
                      
                      <div class="row">
                      <div class="col-md-10 text-right">
                      
                        </br> 
                        <button type="submit" class="btn btn-primary">
                          Back
                        </button>
                        </br> 
                        </br> 
                      </div>  
                    </div>


                    </div>


                  
                      @csrf
                    <div class="row red-box">
                        <div class="col-md-12">
                            <h3>Add Product images</h3>
                        </div>
                        <div id="uploadables" class="row">
                          
                            <div class="row">      
                                <div class="col-md-8">
                                    <label>Image</label>
                                    <input type="file"  name="image" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    </br>
                                    <button onclick="upload_image()" class="btn btn-primary" type="button">Upload</button>
                                </div>                            
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
  
<!-- JavaScript --> 

<script>
    function upload_image(){
        var form  = document.getElementById('imageform');

        var formData = new FormData(form);
          $.ajax({
            url: "{{url('upload_image')}}",
            type: "POST",
            data: formData,
            success: function (data) {
              if(data.res == 200){
                  var html =  `<div class="col-md-3"><img src="${data.path}" style="height=100px;width=100px";></div>`;
                  var prev = $("#product_images").val();
                  console.log('prev'+prev);
                  console.log('new'+data.storable_path);
                  if(prev == ''){
                      $("#product_images").val(data.storable_path);
                  }
                  else{
                      $("#product_images").val(prev+','+data.storable_path);
                  }
                  $("#uploadables").append(html);
              }
              else if(data.res == 500){
                  alert(data.msg);
              }
            },
            cache: false,
            contentType: false,
            processData: false
          });      
    }
    function add_row(){
        var id = makeid(5);
        var html = `
                      <div  id="${id}" class="row red-box">
                            <div class="col-md-4">
                                <label>Type</label><br>
                                <select class="form-control address-select col-md-12"  name="uploadable_type[]">
                                    <option value="image">Image</option>
                                    <option value="pdf">PDF</option>                                    
                                </select>
                            </div>                    
                            <div class="col-md-4">
                                <label>Name</label><br>
                                <input type="text" class="form-control input-text"  name="uploadable_name[]">
                            </div>
                            <div class="col-md-2">
                                <label>Max File Size</label><br>
                                <input type="number" class="form-control input-text"  name="file_size[]">
                            </div>                    
                            <div class="col-md-2">
                                
                                <br>
                                <button type="button" class="btn btn-danger" onclick="remove_row('${id}')">remove</button>
                            </div>
                        </div>`;
            $("#uploadable_grid").append(html);
    }
    function remove_row(id){
        $("#"+id).remove();
    }
    
    function makeid(length) {
        let result = '';
        const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        const charactersLength = characters.length;
        let counter = 0;
        while (counter < length) {
          result += characters.charAt(Math.floor(Math.random() * charactersLength));
          counter += 1;
        }
        return result;
    }    
</script>
@endsection