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
      <div class="bg-img"><img src="{{ asset('frontend/images/backgrounds/im.jpg') }}" alt="background"></div>
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h5 >About Us</h5>
            <nav>
              <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('users.index') }}" style="color:white !important;"> Home</a></li>
                <li class="breadcrumb-item active" aria-current="page" style="color:white !important;">About Us</li>
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
                  Meet Our Team</a>
                <img src="{{asset('images/'.$settings->site_logo)}}" class="logo-dark" width="120px" alt="singnture">
              </div>
            </div>
          </div><!-- /.col-lg-6 -->
          <div class="col-sm-12 col-md-12 col-lg-6">
            <div class="video-banner">
              <img src="{{asset('frontend/images/about/1.jpg')}}" alt="about">
              
              <a class="video__btn video__btn-white popup-video" href="https://www.youtube.com/watch?v=nrJtHemSPW4">
                <div class="video__player">
                  <i class="fa fa-play"></i>
                </div>
              </a>
            </div><!-- /.video-banner -->
          </div><!-- /.col-lg-6 -->

        </div><!-- /.row -->
      </div><!-- /.container -->

<div class="container my-5">
  <div class="card p-4 shadow-lg border-0 rounded-4">
    <div class="card-body">
      <h6 class="card-text">Who We Are</h6>
      <p class="mb-30">
        <strong>GEMAU</strong> is a trusted provider of in-home support services, dedicated to helping individuals maintain independence and dignity in the comfort of their own homes.
      </p>

      <h6 class="card-text">Our Mission</h6>
      <p class="mb-30">
        To deliver compassionate, personalized, and professional care that promotes wellness, safety, and peace of mind for our clients and their families.
      </p>

      <h6 class="card-text">What We Offer</h6>
      <ul class="mb-30">
        <li>✔️ Skilled nursing care</li>
        <li>✔️ Chronic illness care</li>
        <li>✔️ Medication support</li>
        <li>✔️ Daily living Assistance</li>
        <li>✔️ Meal Prep & companionship</li>
      </ul>
    </div>
  </div>
</div>

    </section><!-- /.About Layout 1 -->

@endsection