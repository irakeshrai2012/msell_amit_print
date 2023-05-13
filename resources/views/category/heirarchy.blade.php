@extends('layouts.lander')
  @section('content')
  <!-- end nav -->
  
  <section id="page-title" class="page-title-center text-center">
    <h1>{{ !empty($catg->name) ? $catg->name : '' }}</h1>
        <span> {{ !empty( $catg->desc)  ? $catg->desc : '' }} </span>
        <!-- <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="Default.aspx">Home</a></li>
            <li class="breadcrumb-item"><a href="t_ViewTemplatesMainCategories.aspx">Free Designs</a></li>
            <li class="breadcrumb-item active" aria-current="page">Visiting Card</li>
        </ol> -->
    </section>
  <!-- Two columns content -->
  <section class="main-container col2-left-layout">
    <div class="main container">
      <div class="row">
        <section class="col-main col-sm-12 wow">
          <!--<div class="category-title">-->
          <!--  <h1>Free Designs</h1>-->
          <!--  <p>We are happy to help printing press / advertising agencies</p>-->
          <!--</div>-->
          <div class="category-products">
            <ul class="products-grid">
              @if(!empty($data))
                @foreach($data as $key => $value)
                
                <a href="{{url('Category' ,['slug'=>encrypt($value->id)])}}">
                  <li class="item col-lg-4 col-md-4 col-sm-6 col-xs-6" style="display: flex;justify-content: center;align-items: center;">
                    <div class="col-item">
                      <div class="">
    
                           <a class="product-image" href="{{url('Category' ,['slug'=>encrypt($value->id)])}}"> 
                            <img alt="a" class="img-responsive" src="{{asset($value->image_name)}}"> 
                           </a>
                      </div>
                      <div class="info" style="border-top: 1px solid #c4c4d4;">
                        <div class="info-inner">
                          <div class="item-title"> <a href="{{url('Category',['slug'=>encrypt($value->id)])}}">{{ !empty($value->name) ? $value->name : '' }}<br>
                                    <span style="color:orange;"> {{ !empty($value->desc) ?$value->desc  : ''}} </span></a> </div>
                          
                        <div class="clearfix"> </div>
                      </div>
                    </div>
                    </div>
                  </li>
                </a>
                @endforeach
              @endif
              @if(!empty($products))
                @foreach($products as $key => $value)
                <a href="{{url('ProductsDetails' , ['slug'=>encrypt($value->id)])}}">
                  <li class="item col-lg-4 col-md-4 col-sm-6 col-xs-6" style="display: flex;justify-content: center;align-items: center;">
                    <div class="col-item">
                      <div class="">
                           <a class="product-image" href="{{url('ProductsDetails' ,['slug'=>encrypt($value->id)])}}"> 
                           <img alt="a" class="img-responsive" src="{{ !empty( $value->image_name ) ? asset($value->image_name) : '' }}">
                           </a>
                      </div>  
                      <div class="info" style="border-top: 1px solid #c4c4d4;">
                        <div class="info-inner">
                          <div class="item-title"> <a href="{{url('ProductsDetails' ,['slug'=>encrypt($value->id)])}}">{{ !empty($value->name) ? $value->name : '' }}<br>
                                    <span style="color:orange;">RS.{{ !empty($value->price) ?$value->price  : ''}} </span></a> </div>
                          
                        <div class="clearfix"> </div>
                      </div>
                    </div>
                    </div>
                  </li>
                </a>                  
                @endforeach
              @endif
            </ul>
          </div>
        </section>
    
      </div>
    </div>
  </section>
  <!-- End Two columns content -->
@endsection
