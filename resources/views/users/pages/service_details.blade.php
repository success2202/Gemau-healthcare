@extends('layouts.app')
@section('title')
<title> Product Details - Sanlive Pharmacy  </title>
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
.image-container {
  width: 300px;
  height: 200px;
  border: 2px solid #ccc;
  overflow: hidden;
}

.image-container img {
  width: 100%;
  height: 100%;
  object-fit: cover; /* or 'contain' or 'fill' */
}
</style>
@endsection

@section('content')
    

<section id="content" class=" pb-80">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-8">
          <div class="text-block mb-50">
            
            
           
              <div class="container my-5">
              <div class="card p-4 shadow-lg border-0 rounded-4">
                <div class="card-body">
                  <h5 class="card-title mb-3 text-primary">{{$service->title}}</h5>
                  <div class="video-banner-layout3 bg-overlay mb-50">
                          <img src="{{asset('images/services/'.$service->images)}}" alt="banner">
                          <a class="video__btn video__btn-white popup-video" href="https://www.youtube.com/watch?v=nrJtHemSPW4">
                            <div class="video__player">
                              <i class="fa fa-play"></i>
                </div>
              </a>
            </div><!-- /.video-banner -->
      <p class="card-text ">
        {{ trim(strip_tags($service->contents)) }}
      </p>

      <h5 class="mt-4">Our Mission</h5>
      <p class="card-text">
        To deliver compassionate, personalized, and professional care that promotes wellness, safety, and peace of mind for our clients and their families.
      </p>

      <h5 class="mt-4">What We Offer</h5>
      <ul class="list-unstyled card-text">
        <li>✔️ Skilled nursing care</li>
        <li>✔️ Personal assistance with daily activities</li>
        <li>✔️ Companionship and emotional support</li>
        <li>✔️ 24/7 home health monitoring</li>
      </ul>
    </div>
  </div>
</div>
            </div><!-- /.text-block -->

          {{-- <div class="widget-plan mb-60">
            <div class="widget__body">
              <h5 class="widget__title">Health Care Plans</h5>
              <p>Our doctors include highly qualified male and female practitioners who come from a range of
                backgrounds
                and bring with a diversity of skills and special interests. Our administration and support staff all
                have exceptional people skills and trained to assist you with all medical enquiries.
              </p>
              <div class="row">
                <div class="col-sm-12 col-md-6">
                  <div class="plan__items">
                    <ul class="list-items list-items-layout2 list-unstyled mb-0">
                      <li>Review your medical records.</li>
                      <li>Check and test blood pressure.</li>
                      <li>Run tests such as blood tests.</li>
                    </ul>
                  </div>
                </div><!-- /.col-md-6 -->
                <div class="col-sm-12 col-md-6">
                  <div class="plan__items">
                    <ul class="list-items list-items-layout2 list-unstyled mb-0">
                      <li>Check and test lung function.</li>
                      <li>Narrowing of the arteries.</li>
                      <li>Other specialized tests.</li>
                    </ul>
                  </div>
                </div><!-- /.col-md-6 -->
              </div><!-- /.row -->
            </div><!-- /.widget__body -->
            <div class="widget__footer d-flex flex-wrap justify-content-between align-items-center">
              <div class="plan__price">$50<span class="period">/Month</span></div>
              <div class="d-flex align-items-center">
                <a href="#" class="btn btn__secondary btn__rounded mr-30">
                  <span>Purchase Now</span> <i class="icon-arrow-right"></i>
                </a>
                <a href="#" class="btn btn__primary btn__link">
                  <i class="icon-arrow-right icon-filled"></i> <span>Explore Other Plans</span>
                </a>
              </div>
            </div><!-- /.widget__footer -->
          </div><!-- /.widget-plan --> --}}
          <div class="text-block card-text">
            <h5 class="text-block__title">Our Core Values</h5>
            <p class=" card-text">Today the hospital is recognised as a world renowned institution, not
              only providing outstanding care and treatment, but improving the outcomes for all through a
              comprehensive medical research. For over 20 years, our hospital has touched lives of millions of people,
              and provide care and treatment for the sickest in our community including rehabilitation and aged care.
            </p>
          </div>
          <!-- ======================
               Team
           ========================= -->
          <section class="team-layout2 pt-0 pb-30">
            <div class="heading mb-40">
              <h5 class="card-text">Meet Our Team</h5>
              <p class="card-text">Our administration and support staff all have exceptional people skills and
                trained to assist you with all medical enquiries.
              </p>
            </div><!-- /.heading -->
            <div class="slick-carousel"
            
              data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "autoplay": true, "arrows": false, "dots": false, "responsive": [ {"breakpoint": 992, "settings": {"slidesToShow": 2}}, {"breakpoint": 767, "settings": {"slidesToShow": 1}}, {"breakpoint": 480, "settings": {"slidesToShow": 1}}]}'>
              <!-- Member #1 -->
              @foreach ($team as $item)
              <div class="member">
                <div class="member__img image-container">
                  <img src="{{ asset('images/team/'.$item->image) }}" alt="member img">
                </div><!-- /.member-img -->
                <div class="member__info">
                  <h5 class="member__name"><a href="doctors-single-doctor1.html">{{ $item->name }}</a></h5>
                  <p class="member__job">{{ $item->title }}</p>
                </div><!-- /.member-info -->
              </div><!-- /.member -->
              @endforeach
             
            </div><!-- /.carousel -->
          </section><!-- /.Team -->
        </div><!-- /.col-lg-8 -->
        <div class="col-sm-12 col-md-12 col-lg-4">
          <aside class="sidebar has-marign-left sticky-top">
            <div class="widget widget-services bg">
              <h5 class="widget__title" style="color:white;">Our Services</h5>
              <div class="widget-content">
                <ul class="list-unstyled mb-0">
                    @forelse ($se as $item)
                    <li><a href="{{ route('service.details',encrypt($item->id)) }}"><span style="font-size:12px!important; ">{{ $item->title }}</span></a></li>  
                    @empty
                   
                    @endforelse
                  
                  
                </ul>
              </div><!-- /.widget-content -->
            </div><!-- /.widget-services -->
            <div class="widget widget-help bg-overlay bg-overlay-secondary-gradient bg">
              
              <div class="widget-content">
                <div class="widget__icon">
                  <i class="icon-call3"></i>
                </div>
                <h4 class="widget__title">Emergency Cases</h4>
                <p class="widget__desc">Please feel welcome to contact our friendly reception staff with any general
                   enquiry about our product call us.
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
            <div class="widget widget-reports">
              {{-- <a href="#" class="btn btn__primary btn__block">
                <i class="icon-pdf-file"></i>
                <span>2024 Client Reports</span>
              </a> --}}
               <a href="{{ route('users.bookAppointment') }}" class="btn btn-primary mt-2 bg">Book Appointment</a>
            </div>
          </aside><!-- /.sidebar -->
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->
    </div><!-- /.container -->
  </section>

@endsection