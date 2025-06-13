@extends('layouts.app')
@section('title')
<title> My Account | Sanlive Pharmarcy</title>
@endsection
@section('head')

<link rel="canonical" href="{{ url()->current() }}">
@endsection
@section('content')
@section('styles')
    <style>
        .navIL {
            padding: 15px;
            padding-left: 10px
        }

        .dropdown-item:hover {
            background: rgb(219, 218, 218);
        }
    </style>
@endsection

<div class="ps-shopping" style="background: #eee; ">
    <div class="container">
        <div class="ps-shopping__content">
            <div class="row">
              @include('includes.accountSidebar')
                <div class="col-12 col-md-7 col-lg-8 mt-5" style="background: #8a8282; border-radius: 8px">
                    <div class="row">
                        

<div class="container my-5">
  <div class="card mx-auto" style="max-width: 540px;">
    <div class="row g-0">
      
      <div class="col-md-8">
        <img src="{{ asset('frontend/images/team/1.jpg') }}"
     alt="Profile"
     class="img-thumbnail rounded-circle border border-primary"
     style="width: 150px; height: 150px;">

        <div class="card-body">
          <h5 class="card-title">{{ucfirst($account->first_name .' '.$account->last_name )}}</h5>
          <p class="card-text"><strong>Email:</strong> {{ $account->email }}</p>
          <p class="card-text"><strong>Phone:</strong> {{ $account->phone }}</p>
          <p class="card-text"><strong>Location:</strong> {{ $account->address }}</p>
          <p class="card-text"><small class="text-muted">{{ $account->created_at }}</small></p>
        </div>
      </div>
    </div>
  </div>
</div>

                        
                    </div>

                </div>



            </div>

        </div>
    </div>
</div>
<div style="height: 2em; background:#eee"></div>

@endsection

@section('script')
@endsection
