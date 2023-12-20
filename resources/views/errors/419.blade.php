@extends('layouts.app')
@section('content')
<div class="ps-page__content">
    <div class="row">
        <div class="col-12 col-md-6 col-lg-5"><img src="{{asset('frontend/img/cartoon-doctor.jpg')}}" alt="cartoon-doctor"></div>
        <div class="col-12 col-md-6 col-lg-7">
            <h1 class="ps-page__name">419</h1>
            <h5>Something went wrong, please refresh page</h5>
            <p>Please back to homepage</p>
            <div><a class="ps-btn ps-btn--primary" href="{{route('users.index')}}">Back to homepage</a></div>
        </div>
    </div>
</div>
@endsection