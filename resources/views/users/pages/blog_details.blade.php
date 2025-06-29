@extends('layouts.app')
@section('title')
<title> Blog Details - Gemau  </title>
@endsection
@section('head')
<link rel="canonical" href="{{ url()->current() }}">
@endsection
@section('styles')
  <style>
    .bg{
      color:whitesmoke !important;
 background-color:rgb(40, 85, 74);
}

  .tx{
    color: whitesmoke !important;
  }
  </style>
@endsection
@section('content')


{{-- <div class="ps-post ps-post--sidebar">
    <div class="container">
        <ul class="ps-breadcrumb">
            <li class="ps-breadcrumb__item"><a href="{{route('index')}}">Home</a></li>
            <li class="ps-breadcrumb__item active" aria-current="page">Blog</li>
        </ul>
        <div class="ps-post__content">
            <div class="row">
                <div class="col-12 col-md-9">
                    <div class="ps-blog__banner">
                            <img src="{{asset('images/blog/'.$blog->image)}}" alt="{{asset($blog->title)}}" style="width: 400px">
                             </div>
                    <h1 class="ps-post__title">{{$blog->title}}</h1>
                    <div class="ps-blog__meta"> <span class="ps-blog__date">Created: {{$blog->created_at->format('M d, Y')}}.</span>
                        <a class="ps-blog__author" href="">{{_('By'). ' '.$settings->site_name}}</a></div>
                    
                    <p class="ps-blog__text">{!! $blog->content !!}</p>
                </div>
                <div class="col-12 col-md-3">
                    <div class="ps-widget ps-widget--blog">
                        <div class="ps-widget__block">
                            <h4 class="ps-widget__title">Latest Blogs</h4><a class="ps-block-control" href="#"><i class="fa fa-angle-down"></i></a>
                            <div class="ps-widget__content">
                                <div class="ps-widget__product">

                                    @forelse ($blogs as $item)
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail">
                                            <a class="ps-product__image" href="{{route('blogs.details',$item->hashid)}}">
                                                <figure><img src="{{asset('images/blog/'.$item->image)}}" alt="{{$item->title}}"><img src="{{asset('images/blog/'.$item->image)}}" alt="{{$item->title}}">
                                                </figure>
                                            </a>
                                        </div>
                                        <div class="ps-product__content">
                                            <h5 class="ps-product__title"><a href="{{route('blogs.details',$item->hashid)}}">{!! $item->title !!}</a></h5>
                                            </div>
                                        </div>

                                        
                                    @empty
                                        
                                    @endforelse


                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                  <li class="breadcrumb-item"><a href="{{route('users.index')}}">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{route('users.blogs')}}">Blog</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{$blog->title}}</li>
                </ol>
              </nav>
            </div><!-- /.col-12 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </section><!-- /.page-title -->
  
      <!-- ======================
        Blog Single
      ========================= -->
      <section class="blog blog-single pt-0 pb-80">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-8">
              <div class="post-item mb-0">
                <div class="post__img">
                  <a href="#">
                    <img src="{{asset('images/blog/'.$blog->image)}}" alt="post image" loading="lazy">
                  </a>
                </div><!-- /.post-img -->
                <div class="post__body pb-0">
                  {{-- <div class="post__meta-cat">
                    <a href="#">Consulting</a><a href="#">Sales</a>
                  </div><!-- /.blog-meta-cat --> --}}
                  <div class="post__meta d-flex align-items-center mb-20">
                    <span class="post__meta-date">{{$blog->created_at->format('M d, Y')}}.</span>
                    <a class="post__meta-author" href="#">{{_('By'). ' '.$settings->site_name}}</a>
                    <a class="post__meta-comments" href="#">{{ $blog->comments->count() }} comments</a>
                  </div><!-- /.blog-meta -->
                  <h1 class="post__title mb-30">
                    {{$blog->title}}
                  </h1>
                  <div class="post__desc">
                    <p>{!! $blog->content !!} </p>
                  </div><!-- /.blog-desc -->
                </div>
              </div><!-- /.post-item -->
              <div class="d-flex flex-wrap justify-content-between border-top border-bottom pt-30 pb-30 mb-40">
                <div class="blog-share d-flex flex-wrap align-items-center">
                  <strong class="mr-20 color-heading">Share</strong>
                  <ul class="list-unstyled social-icons d-flex mb-0">
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-google"></i></a></li>
                  </ul>
                </div><!-- /.blog-share -->
                
              </div>
              
              
              <div class="blog-comments mb-70">
                <h5 class="blog-widget__title">{{ $blog->comments->count() }} Comments </h5>
                @foreach ($blog->comments as $comment)
                <ul class="comments-list list-unstyled">
                  <li class="comment__item">
                    <div class="comment__avatar">
                      <img src="{{ asset('frontend/images/blog/author/2.jpg') }}" alt="avatar">
                    </div>
                 
                    <div class="comment__content">
                      <h5 class="comment__author">{{ $comment->name }}</h5>
                      <span class="comment__date">{{ $comment->created_at }}</span>
                      <p class="comment__desc">{{ $comment->comment }}.</p>
                      <a class="comment__reply" href="#">reply</a>
                    </div>
                    @endforeach
                    {{-- <ul class="nested__comment list-unstyled">
                      <li class="comment__item">
                        <div class="comment__avatar">
                          <img src="{{ asset('frontend/images/blog/author/3.jpg') }}" alt="avatar">
                        </div> --}}
                        
                        {{-- <div class="comment__content">
                          <h5 class="comment__author">Mike Dooley</h5>
                          <span class="comment__date">Feb 28, 2017 - 08:22 pm</span>
                          <p class="comment__desc">The example about the mattress sizing page you mentioned in the last
                            WBF can be a perfect
                            example of new keywords and content, and broadening the funnel as well. I can only imagine the
                            sale numbers if that was the site of a mattress selling company.</p>
                          <a class="comment__reply" href="#">reply</a>
                        </div> --}}
                      </li><!-- /.comment -->
                    </ul><!-- /.nested-comment -->
                  </li><!-- /.comment -->
                </ul><!-- /.comments-list -->
              </div><!-- /.blog-comments -->
              <div class="blog-widget blog-comments-form mb-30">
                <h5 class="blog-widget__title">Leave A Reply</h5>
                <form action="{{ route('comment.submit',$blog->id) }}" method="post">
                  @csrf
                  <div class="row">
                    <div class="col-sm-12 col-md-4 col-lg-4">
                      
                      <div class="form-group">
                        <input name="name" type="text" class="form-control" placeholder="Name:">
                      </div><!-- /.form-group -->
                    </div><!-- /.col-lg-6 -->
                    <div class="col-sm-12 col-md-4 col-lg-4">
                      <div class="form-group">
                        <input name="email" type="email" class="form-control" placeholder="Email:">
                      </div><!-- /.form-group -->
                    </div><!-- /.col-lg-6 -->
                    {{-- <div class="col-sm-12 col-md-4 col-lg-4">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Website:">
                      </div><!-- /.form-group -->
                    </div><!-- /.col-lg-6 --> --}}
                    <div class="col-12">
                      <div class="form-group">
                        <textarea name="comment" class="form-control" placeholder="Comment"></textarea>
                      </div><!-- /.form-group -->
                    </div><!-- /.col-lg-12 -->
                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex flex-wrap align-items-center">
                      <button type="submit" class="btn btn__primary btn__rounded btn__xl">
                        <span>Submit Comment</span> <i class="icon-arrow-right"></i>
                      </button>
                    </div><!-- /.col-lg-12 -->
                  </div><!-- /.row -->
                </form>
              </div><!-- /.blog-comments-form -->
            </div><!-- /.col-lg-8 -->
            <div class="col-sm-12 col-md-12 col-lg-4">
              <aside class="sidebar">
                {{-- <div class="widget widget-search">
                  <h5 class="widget__title">Search</h5>
                  <div class="widget__content">
                    <form class="widget__form-search">
                      <input type="text" class="form-control" placeholder="Search...">
                      <button class="btn" type="submit"><i class="icon-search"></i></button>
                    </form>
                  </div><!-- /.widget-content -->
                </div><!-- /.widget-search --> --}}
                <div class="widget widget-posts bg">
                  <h5 class="widget__title tx">Recent Posts</h5>
                  <div class="widget__content">
                    <!-- post item #1 -->

                    @forelse ($blogs as $item)
                        
                      <div class="widget-post-item d-flex align-items-center">
                      <div class="widget-post__img">
                        <a href="{{route('blogs.details',encrypt($item->id))}}"><img src="{{asset('images/blog/'.$item->image)}}" alt="thumb"></a>
                      </div><!-- /.widget-post-img -->
                      <div class="widget-post__content">
                        <span class="widget-post__date">{{$item->created_at->format('M d, Y')}}.</span>
                        <h4 class="widget-post__title "><a href="{{route('blogs.details',encrypt($item->id))}}" class="tx">{{ $item->title }}</a>
                        </h4>
                      </div><!-- /.widget-post-content -->
                    </div><!-- /.widget-post-item -->

                    @empty
                        
                    @endforelse
                   
                  </div><!-- /.widget-content -->
                </div><!-- /.widget-posts -->
                
              </aside><!-- /.sidebar -->
            </div><!-- /.col-lg-4 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </section><!-- /.blog Single -->
@endsection