@extends('layouts.app')
@section('title')
<title> About Us - Sanlive Pharmacy  </title>
@endsection
@section('head')
<link rel="canonical" href="{{ url()->current() }}">
@endsection
@section('content')

  <!-- ========================
       page title 
    =========================== -->
    <section class="page-title page-title-layout5 text-center">
      <div class="bg-img"><img src="{{ asset('frontend/images/backgrounds/6.jpg') }}" alt="background"></div>
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h1 class="pagetitle__heading">About Us</h1>
            <nav>
              <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">About Us</li>
              </ol>
            </nav>
          </div><!-- /.col-xl-6 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.page-title -->


    <section class="about-layout1 pb-0">
      <div class="container">     
        <div class="row" >
          <div class="col-sm-14 col-md-14 col-lg-6">
            <div class="about__Text">
              <p class="mb-30">{!! $aboutUs->content !!}</p>
              <div class="d-flex align-items-center mb-30">
                <a href="doctors-grid.html" class="btn btn__primary btn__outlined btn__rounded mr-30">
                  Meet Our Professionals</a>
                <img src="{{asset('images/'.$settings->site_logo)}}" class="logo-dark" width="120px" alt="singnture">
              </div>
            </div>
          </div><!-- /.col-lg-6 -->
          <div class="col-sm-12 col-md-12 col-lg-6">
            <div class="video-banner">
              <img src="{{asset('images/Picture2.png')}}" alt="about">
              <img src="{{asset('images/pp.jpg')}}" alt="about">
              <a class="video__btn video__btn-white popup-video" href="https://www.youtube.com/watch?v=nrJtHemSPW4">
                <div class="video__player">
                  <i class="fa fa-play"></i>
                </div>
              </a>
            </div><!-- /.video-banner -->
          </div><!-- /.col-lg-6 -->

        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.About Layout 1 -->

@endsection