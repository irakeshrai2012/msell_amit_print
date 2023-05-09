<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="generator" content="Hugo 0.87.0">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
    <meta name="description" content="Nifty is a responsive backend dashboard template based on Bootstrap 5 framework. There are a lot of useful components.">
    <title>Admin </title>

    <!-- STYLESHEETS -->
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~--- -->

    <!-- Fonts [ OPTIONAL ] -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="../../css2?family=Poppins:wght@300;400;500;700&family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS [ REQUIRED ] -->
    <link rel="stylesheet" href="{{asset('backend/css/bootstrap.min.75a07e3a3100a6fed983b15ad1b297c127a8c2335854b0efc3363731475cbed6.css')}}">

    <!-- Nifty CSS [ REQUIRED ] -->
    <link rel="stylesheet" href="{{asset('backend/css/nifty.min.4d1ebee0c2ac4ed3c2df72b5178fb60181cfff43375388fee0f4af67ecf44050.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> 
    @include('layouts.scripts')

    
</head>

<body class="jumping">

    <!-- PAGE CONTAINER -->
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <div id="root" class="root mn--max hd--expanded">

          

        <!-- CONTENTS -->
        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        @yield('content')

        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <!-- END - CONTENTS -->

        <!-- HEADER -->

        @include('admin/common/header')
       
        <!-- END - HEADER -->

        <!-- MAIN NAVIGATION -->
        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        @include('admin/common/sidebar')
        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <!-- END - MAIN NAVIGATION -->

        <!-- SIDEBAR -->
        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        @include('admin/common/right-side')
        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <!-- END - SIDEBAR -->

    </div>
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <!-- END - PAGE CONTAINER -->

    <!-- SCROLL TO TOP BUTTON -->
    <div class="scroll-container">
        <a href="#root" class="scroll-page rounded-circle ratio ratio-1x1" aria-label="Scroll button"></a>
    </div>
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <!-- END - SCROLL TO TOP BUTTON -->

   
    <!-- JAVASCRIPTS -->
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

    <!-- Bootstrap JS [ OPTIONAL ] -->
    <script src="{{asset('backend/js/bootstrap.min.bdf649e4bf3fa0261445f7c2ed3517c3f300c9bb44cb991c504bdc130a6ead19.js')}}" defer=""></script>

    <!-- Nifty JS [ OPTIONAL ] -->
    <script src="{{asset('backend/js/nifty.min.b53472f123acc27ffd0c586e4ca3dc5d83c0670a3a5e120f766f88a92240f57b.js')}}" defer=""></script>

    <!-- Plugin scripts [ OPTIONAL ] -->
    <script src="{{asset('backend/pages/dashboard-1.min.07239cfbfa13a684f5c4668d5282cf217c7793bc57557b4ec22c36740ffb5bf1.js')}}" defer=""></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "Select Module" 
            });
        });
    </script>    

</body>

</html>