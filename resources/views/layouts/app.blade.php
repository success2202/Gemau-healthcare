<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="title" content="sanlive pharmacy Online Health Store, Medicines, Vitamins etc ">
    <meta name="description" content="Get your healthcare needs delivered at your doorstep from the No one online Pharmacy store  Sanlive Pharmacy. Fast delivery, affordable prices ">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="{{ asset('images/'.$settings->fav)}}" rel="shortcut icon" type="image/png">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="author" content="sanlive pharmacy ">
    <meta name="application-name" content="sanlive pharmacy Web-App">
    <meta property="og:site_name" content="sanlive pharmacy: Online Pharmacy in Nigeria">
    <meta property="og:image" content="{{asset('images/'.$settings->site_logo)}}">
    <meta name="twitter:description" content="Online Pharmacy in Nigeria">
    <meta name="twitter:image" content="{{asset('images/'.$settings->site_logo)}}">
    <meta property="og:description" content="sanlive pharmacy is a wholesale, retail, and dispensing healthcare platform established for the distribution and retailing of locally manufactured and imported drugs, Easily get affordable medication and prescription drugs delivered to your doorstep.">
    <meta name="keywords" content="Shop wellness tablets, injections, and health essentials online. Add to cart now for reliable healthcare solutions. Your trusted health and wellness shop, online doctor prescription, online medicine delivery, medicine online, online medication prescription,  medical prescription, prescription doctor, medicine home delivery, medicine delivery, doctor prescription
    chemists near me,  mail order pharmacy, dr online prescription, medical store near me,  rx doctor, rx pharmacy,  rx prescriptions, prescription medication online, medicine delivery near me, delivery pharmacy,  online medical store, rx online doctor, rx online, prescription delivery, pharmacy prescription, pharmacy, drug, eccomerce, buy drugs online, online pharmacy, doctors prescription">
    <meta property="og:title" content="sanlive pharmacy: Online Pharmacy in Nigeria">
      <meta property="og:url" content=" sanlive pharmacy">
    <title>{{$settings->title}} </title>
    <link rel="stylesheet" href="{{asset('/frontend/plugins/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/fonts/Linearicons/Font/demo-files/demo.css')}}">
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Jost:400,500,600,700&amp;display=swap&amp;ver=1607580870">
    <link rel="stylesheet" href="{{asset('/frontend/plugins/bootstrap4/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/plugins/owl-carousel/assets/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/plugins/slick/slick/slick.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/plugins/lightGallery/dist/css/lightgallery.min.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/plugins/select2/dist/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/plugins/noUiSlider/nouislider.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/home-8.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <meta name="p:domain_verify" content="41e4054dd47a348a28e771a36e9e5092"/>
    @yield('head')
    @yield('styles')
 
<style>
    .textcolor{
        color:#000;
    }
</style>

    <!-- Google tag (gtag.js) -->
<!--<script async src="https://www.googletagmanager.com/gtag/js?id=AW-11172431606"></script>-->
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-G8Q4Z4SFSQ">
    google-site-verification=C_cQyxouQa2uttVZE64GP2PeP7YnVzPWoonTiyvsebE
</script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-G8Q4Z4SFSQ');
</script>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-0QPD7YQNP1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-0QPD7YQNP1');
</script>
</head>
<body>
    <div class="ps-page">

@include('partials.header')
@include('partials.header_mobile')
@yield('content')


@include('partials.footer')
@include('partials.mobile_nav')
@include('partials.search_modal')
@include('partials.mobile_sidebar')
@include('partials.preloader')

<script src="{{asset('/frontend/plugins/jquery.min.js')}}"></script>
    <script src="{{asset('/frontend/plugins/popper.min.js')}}"></script>
    <script src="{{asset('/frontend/plugins/bootstrap4/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/frontend/plugins/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{asset('/frontend/plugins/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('/frontend/plugins/jquery-bar-rating/dist/jquery.barrating.min.js')}}"></script>
    <script src="{{asset('/frontend/plugins/lightGallery/dist/js/lightgallery-all.min.js')}}"></script>
    <script src="{{asset('/frontend/plugins/slick/slick/slick.min.js')}}"></script>
    <script src="{{asset('/frontend/plugins/noUiSlider/nouislider.min.js')}}"></script>
    <script src="{{asset('/frontend/js/main.js')}}"></script>
    @yield('script')


    
    <script type="text/javascript">


let message = {!! json_encode(Session::get('msg')) !!};
let msg = {!! json_encode(Session::get('alert')) !!};
//alert(msg);
toastr.options = {
        timeOut: 6000,
        progressBar: true,
        showMethod: "slideDown",
        hideMethod: "slideUp",
        showDuration: 200,
        hideDuration: 600
    };
if(message != null && msg == 'success'){
toastr.success(message);
}else if(message != null && msg == 'error'){
    toastr.error(message);
}        
     </script>
     <!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/6575ebf907843602b800450a/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
</body>
</html>

