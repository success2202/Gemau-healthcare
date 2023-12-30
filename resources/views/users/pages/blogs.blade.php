@extends('layouts.app')
@section('content')

<div class="ps-blog ps-blog--masonry">
    <div class="container">
        <ul class="ps-breadcrumb">
            <li class="ps-breadcrumb__item"><a href="index.html">Home</a></li>
            <li class="ps-breadcrumb__item active" aria-current="page">Blog </li>
        </ul>
        <div class="ps-blog__content">
            <div class="row">

                @forelse ($blogs as $item)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="ps-blog--latset">
                        <div class="ps-blog__thumbnail"><a href="{{route('blogs.details',$item->hashid)}}">
                            <img src="{{$item->image}}" alt="alt"></a>
                          
                        </div>
                        <div class="ps-blog__content">
                            <div class="ps-blog__meta"> <span class="ps-blog__date">Created: {{$item->created_at->format('M d, Y')}}.</span>
                                <a class="ps-blog__author" href="{{route('blogs.details',$item->hashid)}}">{{_('By'). ' '.$settings->site_name}}</a></div>
                                <a class="ps-blog__title" href="{{route('blogs.details',$item->hashid)}}">{{$item->title}} </a>

                        </div>
                    </div>
                </div>
                @empty

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="ps-blog--latset">
                        <div class="ps-blog__content">
                            <p class="ps-blog__desc">No data found</p>
                        </div>
                    </div>
                </div>
                    
                @endforelse

            </div>
        </div>
    </div>
</div>


@endsection