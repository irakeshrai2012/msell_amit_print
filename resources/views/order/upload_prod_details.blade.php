@extends('layouts.lander')
  @section('content')
  <section class="main-container col1-layout">
    <div class="main container">
      <div class="col-main">
        <div class="row">
             <div class="product-name text-center" style="border-bottom: 1px #ddd dashed;margin-bottom:10px;">
                <h1 style="font-weight:bold;">Upload Files</h1>
             </div>
        </div>
        <div class="row">
            @foreach($uploadables as $key => $value)
            <form id="uploadable{{$value->id}}">
                @csrf
                <div class="col-md-3">
                    <label>{{ !empty($value->name) ? $value->name : '' }}</label>
                    <input type="hidden" name="uploadable_id" value="{{$value->id}}">
                    <input name="file" class="form-control" type="file">
                    <input type="hidden" name="order_id" value="{{$order->id}}" id="order_id">                    
                    <button type="button" onclick="upload('{{$value->id}}')" class"btn btn-primary">Upload</button>
                </div>
            </form>                
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-2">
                <form method="POST" action="{{url('place_order')}}">
                    @csrf
                    <input type="hidden" name="product_images" id="product_images">
                    <button class="btn btn-primary" type="submit">Place Order</button>
                </form>
            </div>
        </div>
    </div>
    </div>
    </section>
<script>
function upload(id){
    var form  = document.getElementById('uploadable'+id);
    var formData = new FormData(form);
      $.ajax({
        url: "{{url('upload_order_image')}}",
        type: "POST",
        data: formData,
        success: function (data) {
          if(data.res == 200){
                alert('SuccessFully uploaded');
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
</script>
@endsection