<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<title>Amit Computer Graphics</title>
<!-- Favicons Icon -->
<!-- <link rel="icon" href="../../../skin/frontend/base/default/favicon.ico" type="image/x-icon"> -->
<!-- <link rel="shortcut icon" href="../../../skin/frontend/base/default/favicon.ico" type="image/x-icon"> -->
<!-- Mobile Specific -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!-- CSS Style -->

<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('css/revslider.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('css/owl.theme.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('css/font-awesome.css')}}" type="text/css">

<!-- Google Fonts -->
<link href='../../../css?family=Roboto:400,500,700' rel='stylesheet' type='text/css'>
</head>
<body class="cms-index-index">
    <div class="page">
        @php
            $user = Auth::user();
            if(empty($user)){
                $bal = 0;
            }
            else{
            $bal = App\Models\Transactions::where('user_id' , $user->id)
                               ->groupBy('user_id')
                               ->SelectRaw('SUM(amount) as bal')
                               ->first();
                $ac_bal = !empty($bal->bal) ? $bal->bal  : 0;
            }            
            @endphp
        
        @if(empty($user))
            @include('layouts.menu')
        @elseif($user->type == 'Custumer')
            @include('layouts.menu')
        @elseif($user->type == 'Admin')
            @include('layouts.auth_menu')
        @else
            @include('layouts.menu')        
        @endif

        @if (\Session::has('success'))
            <div class="alert alert-success">
                
                    <p>{!! \Session::get('success') !!}</p>
                
            </div>
        @endif

         @if (\Session::has('error'))
            <div class="alert">
                
                    <p class="alert alert-danger text-center"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> {!! \Session::get('error') !!}</p>
                
            </div>
        @endif
        @yield('content')
    </div>
</body>
@include('layouts.footer')
@include('layouts.scripts')
</html>