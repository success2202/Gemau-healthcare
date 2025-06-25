<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
{{-- <title>@if(isset($breadcrum)){{$breadcrum}} @else {{$settings->site_name}} @endif </title> --}}
<!-- Stylesheets -->

<link rel="stylesheet"
href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&amp;family=Roboto:wght@400;700&amp;display=swap">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap 5 scripts -->

<!-- Bootstrap JS for carousel functionality -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
<link rel="stylesheet" href="{{asset('/frontend/css/libraries.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">

<link rel="shortcut icon" href="{{asset('images/'.$settings->fav)}}" type="image/x-icon">
@yield('styles')


</head>
<body>
@if (Cookie::has('cookie_consent'))
<div id="cookie-banner" class="fixed bottom-0 inset-x-0 bg-gray-800 text-white p-4 z-50 text-sm">
    <div class="flex justify-between items-center max-w-6xl mx-auto">
        <p>We use cookies to improve your experience and deliver personalized healthcare services. By continuing to browse, you agree to our use of cookies.</p>
        <form method="POST" action="{{ route('cookie.accept') }}">
            @csrf
            <button type="submit" class="ml-4 bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
                Accept
            </button>
        </form>
    </div>
</div>
@endif

    <div class="wrapper">
      {{-- <div class="preloader">
        <div class="loading"><span></span><span></span><span></span><span></span></div>
      </div><!-- /.preloader --> --}}
      @include('layouts.header_top')
   @include('layouts.header')
    @yield('content')

<!--== Start Footer Area Wrapper ==-->
@include('layouts.footer')
<!-- End Off Canvas Menu Wrapper -->
