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
<style>
#cookie-banner {
  position: fixed;
  bottom: 0;
  left: 0; right: 0;
  background: #222;
  color: #fff;
  padding: 15px;
  font-size: 14px;
  z-index: 9999;
  display: flex;
  justify-content: space-between;
  align-items: center;
}
#cookie-banner button {
  background: #28a745;
  color: white;
  padding: 8px 16px;
  border: none;
  border-radius: 5px;
}
</style>


</head>
<body>
@if (!Cookie::has('cookie_consent'))
<div id="cookie-banner" class="fixed bottom-0 inset-x-0 bg-gray-900 text-white text-sm p-4 z-50 shadow-lg">
    <div class="max-w-7xl mx-auto flex justify-between items-center flex-wrap gap-2">
        <p class="m-0">
            We use cookies to enhance your browsing experience, serve personalized content, and analyze our traffic.
        </p>
        <form action="{{ route('cookie.accept') }}" method="POST">
            @csrf
            <button type="submit" class="bg-green-500 hover:bg-green-600 px-4 py-2 rounded text-white text-sm">
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
