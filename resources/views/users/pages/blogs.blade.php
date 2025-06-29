@extends('layouts.app')
@section('title')
<title> Blogs - Sanlive Pharmacy  </title>
@endsection
@section('head')
<link rel="canonical" href="{{ url()->current() }}">
@endsection
@section('content')

{{-- <div class="ps-blog ps-blog--masonry">
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
                            <img src="{{asset('images/blog/'.$item->image)}}" alt="{{$item->title}}"></a>
                          
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
</div> --}}


 
<section class="page-title page-title-layout5 text-center">
  <div class="bg-img"><img src="{{ asset('frontend/images/backgrounds/im.jpg') }}" alt="background"></div>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h5>Our Blogs</h5>
        {{-- <h6 style="color:white !important;">Useful advice for anyone responsible for the care of an elderly or disabled person</h6> --}}
        <nav>
          <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{ route('users.index') }}" style="color:white !important;">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page" style="color:white !important;">  blog</li>
          </ol>
        </nav>
      </div><!-- /.col-xl-6 -->
    </div><!-- /.row -->
  </div><!-- /.container -->
</section><!-- /.page-title -->
  
      <!-- ======================
        Blog Grid
      ========================= -->
      <section class="blog-grid">
        <div class="container">
          <div class="row">
            <!-- Post Item #1 -->
            @forelse ($blogs as $item)
            <div class="col-sm-12 col-md-6 col-lg-4">
              <div class="post-item">
                <div class="post__img">
                  <a href="{{route('blogs.details',encrypt($item->id))}}">
                    <img src="{{asset('images/blog/'.$item->image)}}" class="logo-dark" height="200px" width="300px" alt="post image" loading="lazy">
                                                                          
                </div><!-- /.post__img -->
                <div class="post__body">
                  <div class="post__meta-cat">
                    <a href="#">Gemau</a>
                  </div><!-- /.blog-meta-cat -->
                  <div class="post__meta d-flex">
                    <span class="post__meta-date">{{$item->created_at->format('M d, Y')}}.</span>
                    <a class="post__meta-author" href="#">{{_('By'). ' '.$settings->site_name}}</a>
                  </div>
                  <h4 class="post__title"><a href="{{route('blogs.details',encrypt($item->id))}}">{{$item->title}}</a></h4>
  
                  {{-- <p class="post__desc">{{trim(strip_tags($item->content))}}
                  </p> --}}
                  <a href="{{route('blogs.details',encrypt($item->id))}}" class="btn btn__secondary btn__link btn__rounded">
                    <span>Read More</span>
                    <i class="icon-arrow-right"></i>
                  </a>
                </div><!-- /.post__body -->
              </div><!-- /.post-item -->
            </div><!-- /.col-lg-4 -->

            @empty

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="ps-blog--latset">
                        <div class="ps-blog__content">
                            <p class="ps-blog__desc">No data found</p>
                        </div>
                    </div>
                </div>
                    
                @endforelse

            {{-- <!-- Post Item #2 -->
            <div class="col-sm-12 col-md-6 col-lg-4">
              <div class="post-item">
                <div class="post__img">
                  <a href="blog-single-post.html">
                    <img src="{{ asset('frontend/images/page-titles/back1.jpg') }}" class="logo-dark" height="200px" width="300px" alt="post image" loading="lazy">
                  </a>
                </div><!-- /.post__img -->
                <div class="post__body">
                  <div class="post__meta-cat">
                    <a href="#">Infectious</a><a href="#">Tips</a>
                  </div><!-- /.blog-meta-cat -->
                  <div class="post__meta d-flex">
                    <span class="post__meta-date">Jan 30, 2022</span>
                    <a class="post__meta-author" href="#">John Ezak</a>
                  </div>
                  <h4 class="post__title"><a href="#">Unsure About Wearing a Face Mask? Here’s How and Why</a></h4>
                  <p class="post__desc">That means that you should still be following any shelter-in-place orders in your
                    community. But when you’re venturing out to the grocery store, pharmacy or hospital..
                  </p>
                  <a href="blog-single-post.html" class="btn btn__secondary btn__link btn__rounded">
                    <span>Read More</span>
                    <i class="icon-arrow-right"></i>
                  </a>
                </div><!-- /.post__body -->
              </div><!-- /.post-item -->
            </div><!-- /.col-lg-4 -->
            
          <div class="row">
            <div class="col-12 text-center">
              {{-- <nav class="pagination-area">
                <ul class="pagination justify-content-center">
                  <li><a class="current" href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#"><i class="icon-arrow-right"></i></a></li>
                </ul>
              </nav><!-- .pagination-area --> --}}

              <nav class="pagination-area">
                <ul class="pagination justify-content-center">
                  @php
                  $start = max($blogs->currentPage() - 1, 1);
                  $end = min($blogs->currentPage() + 1, $blogs->lastPage());
                 @endphp
                    {{-- Previous Arrow --}}
                    @if ($blogs->onFirstPage())
                        <li class="disabled"><span><i class="icon-arrow-left"></i></span></li>
                    @else
                        <li><a href="{{ $blogs->previousPageUrl() }}"><i class="icon-arrow-left"></i></a></li>
                    @endif
            
                    {{-- Page Numbers --}}
                    @for ($i = $start; $i <= $end; $i++)
                        <li>
                            <a 
                                href="{{ $blogs->url($i) }}" 
                                class="{{ $blogs->currentPage() == $i ? 'current' : '' }}">
                                {{ $i }}
                            </a>
                        </li>
                    @endfor
            
                    {{-- Next Arrow --}}
                    @if ($blogs->hasMorePages())
                        <li><a href="{{ $blogs->nextPageUrl() }}"><i class="icon-arrow-right"></i></a></li>
                    @else
                        <li class="disabled"><span><i class="icon-arrow-right"></i></span></li>
                    @endif
            
                </ul>
            </nav>

            </div><!-- /.col-12 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </section><!-- /.blog Grid -->
  

@endsection