@extends('layouts.app')
@section('title')
<title> Terms - Sanlive Pharmacy  </title>
@endsection
@section('head')
<link rel="canonical" href="{{ url()->current() }}">
@endsection
@section('content')

<div class="ps-about">
    <div class="container">
    
        <ul class="ps-breadcrumb"> 
        <div class="bg-img"><img src="{{ asset('frontend/images/backgrounds/im.jpg') }}" alt="background"></div>
            <li class="ps-breadcrumb__item"><a href="" style="color:white;">Home</a></li>
            <li class="ps-breadcrumb__item active" aria-current="page" style="color:white;">Terms and Conditions</li>
        </ul>
    
    <div class="ps-about__content">
        <section class="ps-about__project">
            <div class="container">
                {{-- <h2 class="ps-about__title">Your home medical provider now also online</h2> --}}
                <section class="ps-section">
                    <div class="ps-section__cntent">
                        <div class="ps-section__desc" style="color:#09376e">    {!! $terms->content !!}</div>
                    </div>
                </section>
            </div>
        </section>
       
    </div>
 
</div>

@endsection