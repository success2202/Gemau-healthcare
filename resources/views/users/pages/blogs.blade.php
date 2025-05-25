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


 
 <!-- ========================
       page title 
    =========================== -->
    <section class="page-title pt-30 pb-30 text-center">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12">
              <nav>
                <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{ route('users.blogs') }}">Blog</a></li>
                 
                </ol>
              </nav>
            </div><!-- /.col-12 -->
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
                  <a href="{{route('blogs.details',$item->hashid)}}">
                    <img src="{{asset('frontend/images/blog/grid/Picture1.png')}}" class="logo-dark" height="200px" width="300px" alt="post image" loading="lazy">
                  </a>
                </div><!-- /.post__img -->
                <div class="post__body">
                  <div class="post__meta-cat">
                    <a href="#">Roisola</a>
                  </div><!-- /.blog-meta-cat -->
                  <div class="post__meta d-flex">
                    <span class="post__meta-date">{{$item->created_at->format('M d, Y')}}.</span>
                    <a class="post__meta-author" href="#">{{_('By'). ' '.$settings->site_name}}</a>
                  </div>
                  <h4 class="post__title"><a href="{{route('blogs.details',$item->hashid)}}">{{$item->title}}</a></h4>
  
                  <p class="post__desc">{{!! $item->content !!}}
                  </p>
                  <a href="{{route('blogs.details',$item->hashid)}}" class="btn btn__secondary btn__link btn__rounded">
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
            <!-- Post Item #3 -->
            <div class="col-sm-12 col-md-6 col-lg-4">
              <div class="post-item">
                <div class="post__img">
                  <a href="blog-single-post.html">
                    <img src="{{ asset('frontend/images/blog/grid/Picture1.png') }}" class="logo-dark" height="200px" width="300px" alt="post image" loading="lazy">
                  </a>
                </div><!-- /.post__img -->
                <div class="post__body">
                  <div class="post__meta-cat">
                    <a href="#">Life Style</a><a href="#">Nutrition</a>
                  </div><!-- /.blog-meta-cat -->
                  <div class="post__meta d-flex">
                    <span class="post__meta-date">Jan 28, 2022</span>
                    <a class="post__meta-author" href="#">Saul Wade</a>
                  </div>
                  <h4 class="post__title"><a href="#">Tips for Eating Healthy When You’re Working From Home </a></h4>
  
                  <p class="post__desc">It’s normal to feel anxiety, worry and grief any time you’re diagnosed with a
                    condition that’s certainly true if you test positive for COVID-19, or are presumed to be positive...
                  </p>
                  <a href="blog-single-post.html" class="btn btn__secondary btn__link btn__rounded">
                    <span>Read More</span>
                    <i class="icon-arrow-right"></i>
                  </a>
                </div><!-- /.post__body -->
              </div><!-- /.post-item -->
            </div><!-- /.col-lg-4 -->


            <!-- Post Item #4 -->
            <div class="col-sm-12 col-md-6 col-lg-4">
              <div class="post-item">
                <div class="post__img">
                  <a href="blog-single-post.html">
                    <img src="assets/images/blog/grid/4.jpg" alt="post image" loading="lazy">
                  </a>
                </div><!-- /.post__img -->
                <div class="post__body">
                  <div class="post__meta-cat">
                    <a href="#">Disease</a><a href="#">Flu</a>
                  </div><!-- /.blog-meta-cat -->
                  <div class="post__meta d-flex">
                    <span class="post__meta-date">Jan 30, 2022</span>
                    <a class="post__meta-author" href="#">Mark Ezak</a>
                  </div>
                  <h4 class="post__title"><a href="#">Why Coronavirus Cases Among Adults Is Bad News</a></h4>
                  <p class="post__desc">A new surge of coronavirus cases has spread across the country and while there’s
                    still so much to learn about virus, how it’s transmitted and its long-term effects
                  </p>
                  <a href="blog-single-post.html" class="btn btn__secondary btn__link btn__rounded">
                    <span>Read More</span>
                    <i class="icon-arrow-right"></i>
                  </a>
                </div><!-- /.post__body -->
              </div><!-- /.post-item -->
            </div><!-- /.col-lg-4 -->
            <!-- Post Item #5 -->
            <div class="col-sm-12 col-md-6 col-lg-4">
              <div class="post-item">
                <div class="post__img">
                  <a href="blog-single-post.html">
                    <img src="assets/images/blog/grid/5.jpg" alt="post image" loading="lazy">
                  </a>
                </div><!-- /.post__img -->
                <div class="post__body">
                  <div class="post__meta-cat">
                    <a href="#">Mental Health</a><a href="#">Sales</a>
                  </div><!-- /.blog-meta-cat -->
                  <div class="post__meta d-flex">
                    <span class="post__meta-date">Jan 30, 2022</span>
                    <a class="post__meta-author" href="#">Martin King</a>
                  </div>
                  <h4 class="post__title"><a href="#">Why Do People Get Kidney Stones in the Summer? </a></h4>
                  <p class="post__desc">Summer may have just officially started, but kidney stone season began a couple of
                    weeks ago. Doctors see an increase in kidney stone cases when the weather warms up...
                  </p>
                  <a href="blog-single-post.html" class="btn btn__secondary btn__link btn__rounded">
                    <span>Read More</span>
                    <i class="icon-arrow-right"></i>
                  </a>
                </div><!-- /.post__body -->
              </div><!-- /.post-item -->
            </div><!-- /.col-lg-4 -->
            <!-- Post Item #6 -->
            <div class="col-sm-12 col-md-6 col-lg-4">
              <div class="post-item">
                <div class="post__img">
                  <a href="blog-single-post.html">
                    <img src="assets/images/blog/grid/6.jpg" alt="post image" loading="lazy">
                  </a>
                </div><!-- /.post__img -->
                <div class="post__body">
                  <div class="post__meta-cat">
                    <a href="#">Infectious</a><a href="#">Disease</a>
                  </div><!-- /.blog-meta-cat -->
                  <div class="post__meta d-flex">
                    <span class="post__meta-date">Feb 07, 2022</span>
                    <a class="post__meta-author" href="#">Marie Black</a>
                  </div>
                  <h4 class="post__title"><a href="#">Do Any Drugs Really Work to Treat Coronavirus? </a></h4>
                  <p class="post__desc">While most people who get COVID-19 are able to recover at home, the rush is on to
                    find a treatment that’s safe and effective against life-threatening cases of the disease...
                  </p>
                  <a href="blog-single-post.html" class="btn btn__secondary btn__link btn__rounded">
                    <span>Read More</span>
                    <i class="icon-arrow-right"></i>
                  </a>
                </div><!-- /.post__body -->
              </div><!-- /.post-item -->
            </div><!-- /.col-lg-4 -->
          </div><!-- /.row --> --}}
          <div class="row">
            <div class="col-12 text-center">
              <nav class="pagination-area">
                <ul class="pagination justify-content-center">
                  <li><a class="current" href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#"><i class="icon-arrow-right"></i></a></li>
                </ul>
              </nav><!-- .pagination-area -->
            </div><!-- /.col-12 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </section><!-- /.blog Grid -->
  

@endsection