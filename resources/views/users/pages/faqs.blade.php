@extends('layouts.app')
@section('title')
<title>  GEMAU </title>
@endsection
@section('head')
<link rel="canonical" href="https://sanlivepharmacy.com/">
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

 <!-- ========================
       page title 
    =========================== -->
    <section class="page-title page-title-layout5 text-center">
  <div class="bg-img"><img src="{{ asset('frontend/images/backgrounds/im.jpg') }}" alt="background"></div>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h5>Fags</h5>
        
        <nav>
          <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{ route('users.index') }}" style="color:white !important;">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page" style="color:white !important;">blog</li>
          </ol>
        </nav>
      </div><!-- /.col-xl-6 -->
    </div><!-- /.row -->
  </div><!-- /.container -->
</section><!-- /.page-title -->

    <!-- ======================
       FAQ
    ========================= -->
    <section class="faq pt-120 pb-70">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-4">
            <aside class="sidebar has-marign-right">
              <div class="widget widget-help bg-overlay bg-overlay-secondary-gradient">
                <div class="bg-img"><img src="assets/images/banners/5.jpg" alt="background"></div>
                <div class="widget-content">
                  <div class="widget__icon">
                    <i class="icon-call3"></i>
                  </div>
                  <h4 class="widget__title">Emergency Cases</h4>
                  <p class="widget__desc">Please feel welcome to contact our friendly reception staff with any general
                    or medical enquiry call us.
                  </p>
                  <a href="tel:+201061245741" class="phone__number">
                    <i class="icon-phone"></i> <span>{{$settings->site_phone}}</span>
                  </a>
                </div><!-- /.widget-content -->
              </div><!-- /.widget-help -->
              <div class="widget widget-schedule bg">
                <div class="widget-content">
                  <div class="widget__icon tx">
                    <i class="icon-charity2"></i>
                  </div>
                  <h4 class="widget__title tx">Opening Hours</h4>
                  <ul class="time__list list-unstyled mb-0">
                    <li><span>Monday - Friday</span><span>8.00 - 7:00 pm</span></li>
                    <li><span>Saturday</span><span>9.00 - 10:00 pm</span></li>
                    <li><span>Sunday</span><span>10.00 - 12:00 pm</span></li>
                  </ul>
                </div><!-- /.widget-content -->
              </div><!-- /.widget-schedule -->
              {{-- <div class="widget widget-reports">
                <a href="#" class="btn btn__primary btn__block">
                  <i class="icon-pdf-file"></i>
                  <span>2020 Patient Reports</span>
                </a>
              </div> --}}
            </aside><!-- /.sidebar -->
          </div><!-- /.col-lg-4 -->
          <div class="col-sm-12 col-md-12 col-lg-8" id="accordion">
            <div class="accordion-item opened">
              <div class="accordion__header" data-toggle="collapse" data-target="#collapse3">
                <a class="accordion__title" href="#">How long will my appointment take?</a>
              </div><!-- /.accordion-item-header -->
              <div id="collapse3" class="collapse show" data-parent="#accordion">
                <div class="accordion__body">
                  <p>This can vary based on the type of appointment and the reason for your visit.</p>
                </div><!-- /.accordion-item-body -->
              </div>
            </div><!-- /.accordion-item -->
            @foreach ($faqs as $item)
              
            <div class="accordion-item">
              <div class="accordion__header" data-toggle="collapse" data-target="#collapse{{ $loop->index + 1 }}">
                <a class="accordion__title" href="#">{{$item->title}}</a>
              </div><!-- /.accordion-item-header -->
              <div id="collapse{{ $loop->index + 1 }}" class="collapse" data-parent="#accordion">
                <div class="accordion__body">
                  <p>{{trim(strip_tags($item->content))}}</p>
                </div><!-- /.accordion-item-body -->
              </div>
            </div><!-- /.accordion-item -->
            @endforeach

            {{-- <div class="accordion-item">
              <div class="accordion__header" data-toggle="collapse" data-target="#collapse2">
                <a class="accordion__title" href="#">Do I have to commit to a contract?</a>
              </div><!-- /.accordion-item-header -->
              <div id="collapse2" class="collapse" data-parent="#accordion">
                <div class="accordion__body">
                  <p>With any financial product that you buy, it is important that you know you are getting the best
                    advice from a reputable company as often</p>
                </div><!-- /.accordion-item-body -->
              </div>
            </div><!-- /.accordion-item --> --}}
           
          </div><!-- /.col-lg-8 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.FAQ -->


    <!-- ========================
     gallery
    =========================== -->
    <section class="gallery pt-0 pb-90">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="slick-carousel"
              data-slick='{"slidesToShow": 4, "slidesToScroll": 1, "autoplay": true, "arrows": true, "dots": false, "responsive": [ {"breakpoint": 992, "settings": {"slidesToShow": 2}}, {"breakpoint": 767, "settings": {"slidesToShow": 2}}, {"breakpoint": 480, "settings": {"slidesToShow": 1}}]}'>
              <a class="popup-gallery-item" href="{{ asset('frontend/images/gallery/1.jpg') }}">
                <img src="{{ asset('frontend/images/gallery/1.jpg') }}" alt="gallery img">
              </a>
              <a class="popup-gallery-item" href="{{ asset('frontend/images/gallery/2.jpg') }}">
                <img src="{{ asset('frontend/images/gallery/2.jpg') }}" alt="gallery img">
              </a>
              <a class="popup-gallery-item" href="{{ asset('frontend/images/gallery/3.jpg') }}">
                <img src="{{ asset('frontend/images/gallery/3.jpg') }}" alt="gallery img">
              </a>
              <a class="popup-gallery-item" href="{{ asset('frontend/images/gallery/4.jpg') }}">
                <img src="{{ asset('frontend/images/gallery/4.jpg') }}" alt="gallery img">
              </a>
              <a class="popup-gallery-item" href="{{ asset('frontend/images/gallery/5.jpg') }}">
                <img src="{{ asset('frontend/images/gallery/5.jpg') }}" alt="gallery img">
              </a>
              <a class="popup-gallery-item" href="{{ asset('frontend/images/gallery/6.jpg') }}">
                <img src="{{asset('frontend/images/gallery/6.jpg') }}" alt="gallery img">
              </a>
            </div><!-- /.gallery-images-wrapper -->
          </div><!-- /.col-xl-5 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.gallery 2 -->
    
@endsection