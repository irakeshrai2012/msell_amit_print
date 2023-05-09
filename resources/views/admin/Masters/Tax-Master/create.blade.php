@extends('admin.layouts.admin')
  @section('content')
  <section id="content" class="content">
    <div class="content__header content__boxed rounded-0">
        <div class="content__wrap">

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Tax Masters</a></li>
                     <li class="breadcrumb-item"><a href="#">Tax Percent</a></li>
                     <li class="breadcrumb-item"><a href="#">Add Tax Percent</a></li>
                    
                </ol>
            </nav>
            <!-- END : Breadcrumb -->
        </div>

    </div>
    <div class="content__boxed main container">
      <div class="content__wrap col-main">
        <div class="row">
             <div class="product-name text-center" style="border-bottom: 1px #ddd dashed;margin-bottom:10px;">
                <h1 style="font-weight:bold;">Add Tax Percent</h1>
             </div>
          <div class="card product-view wow bounceInUp animated">
            <div class="card-body product-essential">
                <div class="red box">
                  <form method="post" enctype='multipart/form-data' action="{{route('Tax-Master.store')}}">
                		@csrf
                		<div class="row form-group">
                			<div class="col-md-2">
                				<label class="">Tax %</label><br>
                				<input type="text" placeholder="Tax %" required="true" class="form-control input-text required-entry" name="tax_per">
                			</div>
                			<div class="col-md-3">
                				<label>Description</label><br>
                				<textarea placeholder="Description" class="form-control col-md-12" name="description"></textarea>
                			</div>
                		</div>
                		<div class="row">
                			<div class="col-md-12 text-right">
                				<button type="submit" class="btn btn-primary">
                					Create
                				</button>
                			</div>	
                		</div>
                	</form>
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('admin.common.footer')
  </section>
  <!--End main-container --> 
  
<!-- JavaScript --> 


@endsection