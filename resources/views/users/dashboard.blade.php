@extends('layouts.app')
@section('title')
<title>  GEMAU </title>
@endsection
@section('head')
<link rel="canonical" href="https://sanlivepharmacy.com/">
@endsection

@section('styles')
 <style>
  .tit{
    padding: 10px;
    padding-top: 20px
  }

    .card-container {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: center;
      
    }


    .flip-card {
      background-color: transparent;
      width: 250px;
      height: 350px;
      perspective: 1000px;
      
    }

    .flip-card-inner {
      position: relative;
      width: 100%;
      height: 100%;
      text-align: center;
      transition: transform 0.8s;
      transform-style: preserve-3d;
    }

    .flip-card:hover .flip-card-inner {
      transform: rotateY(180deg);
    }

    .flip-card-front, .flip-card-back {
      position: absolute;
      width: 100%;
      height: 100%;
      -webkit-backface-visibility: hidden;
      backface-visibility: hidden;
      border-radius: 12px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.15);
      overflow: hidden;
    }

    .flip-card-front {
      background-color: #fff;
    }

    .flip-card-front img {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }

    .flip-card-front h4 {
      margin: 10px;
      font-size: 1.1rem;
    }

    .flip-card-back {
      background-color: #343a40;
      color: white;
      transform: rotateY(180deg);
      padding: 20px;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .flip-card-back p {
      font-size: 0.95rem;
      line-height: 1.4;
    }

    @media (max-width: 1000px) {
      .card-container {
        flex-direction: row;
        flex-wrap: wrap;
      }
    }

    @media (max-width: 768px) {
      .card-container {
        flex-direction: column;
        align-items: center;
      }
    }


   .marquee-container {
  width: 100%;
  overflow: hidden;
  position: relative;
  
  height: 50px;
}

.marquee-text {
  position: absolute;
  white-space: nowrap;
  color: white;
  animation: moveRight 10s linear infinite;
}

@keyframes moveRight {
  0% {
    left: -100%;
  }
  100% {
    left: 100%;
  }
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

.bg{
 background-color:rgb(40, 85, 74);
}


  </style>
@endsection

@section('content')


@include('users.slider')


 {{-- <section class="team-layout1 pb-80">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
            <div class="heading text-center mb-40">
              <h3 class="heading__title">Our Solutions</h3>
              <p class="heading__desc">
                At ROISOLAR, we deliver customized solar energy systems designed to help you reduce electricity costs, achieve energy independence, and meet your sustainability goals. Whatever your energy needs, we provide smart, scalable solutions built for long-term performance
              </p>
            </div><!-- /.heading -->
          </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="slick-carousel"
              data-slick='{"slidesToShow": 2, "slidesToScroll": 1, "autoplay": true, "arrows": false, "dots": false, "responsive": [ {"breakpoint": 992, "settings": {"slidesToShow": 2}}, {"breakpoint": 767, "settings": {"slidesToShow": 1}}, {"breakpoint": 480, "settings": {"slidesToShow": 1}}]}'>
              <!-- Member #1 -->
              <div class="member">
                  <img src="{{asset('images/Picture1.png')}}" alt="member img">
                <div class="member__info">
                  <h5 class="member__name">Roof Top Solar Solutions</h5>
                  <p class="member__desc">Whether you have an aluminum sheet, corrugated iron, concrete slab, or traditional tile roof, we engineer smart, site-specific solar systems built for Nigeria’s climate and structures. Our customized designs maximize available space, enhance energy output, and deliver strong, reliable returns for years to come</p>
                  <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                  </div>
                </div><!-- /.member-info -->
              </div><!-- /.member -->
              <div class="member">
                <div class="member__img">
                  <img src="{{asset('images/Picture2.png')}}" alt="member img">
                </div>
                <div class="member__info">
                  <h5 class="member__name">Ground-Mounted Solar Solutions</h5>
                  <p class="member__desc">We deliver end-to-end execution for ground-mounted solar projects — from intelligent design and precision installation to seamless operations and maintenance.
                    Whether for open industrial spaces, farms, estates, or remote sites across Nigeria, our ground-mounted systems are engineered for maximum efficiency, durability, and energy yield across the full project lifecycle.
                    Transform your parking areas into clean energy hubs with ROISOLAR’s smart solar car park systems.
                    Our designs not only harness solar energy efficiently but also provide valuable shade and protection for vehicles and assets — turning unused spaces into high-performing energy generators with dual-purpose benefits.</p>
                  <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                  
                  </div>
                </div><!-- /.member-info -->
              </div><!-- /.member -->
              <!-- Member #3 -->
              <div class="member">
                <div class="member__img">
                  <img src="{{asset('images/Picture3.png')}}" alt="member img">
                  <ul class="social-icons list-unstyled mb-0">
                </div><!-- /.member-img -->
                <div class="member__info">
                  <h5 class="member__name"><a href="doctors-single-doctor1.html">Solar Car Park Solutions</a></h5>
                  <p class="member__desc">Transform your parking areas into clean energy hubs with ROISOLAR’s smart solar car park systems.
                    Our designs not only harness solar energy efficiently but also provide valuable shade and protection for vehicles and assets — turning unused spaces into high-performing energy generators with dual-purpose benefits.</p>
                  <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                    
                  </div>
                </div><!-- /.member-info -->
              </div><!-- /.member -->
              <!-- Member #4 -->
              <div class="member">
                <div class="member__img">
                  <img src="{{asset('images/Picture4.png')}}" alt="member img">
                </div><!-- /.member-img -->
                <div class="member__info">
                  <h5 class="member__name">Micro-Grid & Energy Storage Solutions</h5>
                  <p class="member__desc">ROISOLAR’s micro-grid and storage solutions integrate seamlessly with multiple energy sources—solar, batteries, grid power, and diesel generators—to deliver cost-effective and uninterrupted power. Designed for efficiency and energy independence, our systems reduce reliance on diesel, cut electricity costs, and provide critical backup power during grid failures or blackouts</p>
                  <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                  </div>
                </div><!-- /.member-info -->
              </div><!-- /.member -->
            </div><!-- /.carousel -->
          </div><!-- /.col-12 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.Team --> --}}

    <section class="team-layout1 pb-80 lay" >
  
        <div class="row">
          <div class="col-12">
            <div class="slick-carousel"
              data-slick='{"slidesToShow": 2, "slidesToScroll": 1, "autoplay": true, "arrows": false, "dots": false, "responsive": [ {"breakpoint": 992, "settings": {"slidesToShow": 2}}, {"breakpoint": 767, "settings": {"slidesToShow": 1}}, {"breakpoint": 480, "settings": {"slidesToShow": 1}}]}'>
              <!-- Member #1 -->
              <div class="member">
                <p style="text-align: center">A home health agency that specializes in both adult and pediatric patients</p>
                  <img src="{{asset('images/c6.jpg')}}" alt="member img">
                  
              </div><!-- /.member -->
              {{-- <div class="member">
                <div class="member__img">
                  <p style="text-align: center">A home health agency that specializes in both adult and pediatric patients</p>
                  <img src="{{asset('images/bv.jpg')}}" alt="member img">
                </div>
             
              </div><!-- /.member --> --}}
              <!-- Member #3 -->
              <div class="member">
                <div class="member__img">
                  <p style="text-align: center">A home health agency that specializes in both adult and pediatric patients</p>
                  <img src="{{asset('images/c1.jpg')}}" alt="member img">
                  <ul class="social-icons list-unstyled mb-0">
                </div><!-- /.member-img -->
              
              </div><!-- /.member -->
              <!-- Member #4 -->
              <div class="member">
                <div class="member__img">
                  <p style="text-align: center">A home health agency that specializes in both adult and pediatric patients</p>
                  <img src="{{asset('images/c2.webp')}}" alt="member img">
                </div><!-- /.member-img -->
                
                
              </div><!-- /.member -->
            </div><!-- /.carousel -->
          </div><!-- /.col-12 -->
        </div><!-- /.row -->
        <center><a href="{{ route('users.bookAppointment') }}" class="btn btn-primary mt-2 bg">Book Appointment</a></center>
      </div><!-- /.container -->
      
    </section><!-- /.Team -->

  <!-- ========================
          Services Layout 1
      =========================== -->
      <section class="services-layout1 pt-130">
        <div class="bg-img"><img src="{{ asset('frontend/images/backgrounds/1.jpg') }}" alt="background"></div>
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
              <div class="heading text-center mb-60">
                <h3 class="heading__title ">Our Services</h3>
                <div class="bg bg-opacity-50 p-4 rounded">
          <p class="text-white">flexibility of our home care services...</p>
          
          {{-- <a href="/appointment" class="btn btn-primary mt-2">Book Appointment</a> --}}
        </div>
              </div><!-- /.heading -->
            </div><!-- /.col-lg-6 -->
          </div><!-- /.row -->

          <div class="row">
            <!-- service item #1 -->
            @forelse ($service as $serv)
            <div class="col-sm-12 col-md-6 col-lg-4">
              <div class="service-item">
                <div class="service__icon image-container">
                  <img src="{{asset('images/services/'.$serv->images)}}" alt="Product" loading="lazy">
                </div><!-- /.service__icon -->
                <div class="service__content">
                  <h6>{{ $serv->title }}</h6>
                  {{-- <p class="service__desc">{{ trim(strip_tags($serv->contents)) }}
                  </p> --}}
                 
                  <a href="{{ route('service.details',encrypt($serv->id)) }}" class="btn btn__secondary btn__outlined btn__rounded ">
                    <span>Read More</span>
                    
                  </a>
                </div><!-- /.service__content -->
              </div><!-- /.service-item -->
            </div><!-- /.col-lg-4 -->
            @empty
                
            @endforelse
          
          </div><!-- /.row -->
        </div><!-- /.container -->
      </section><!-- /.Services Layout 1 -->




  <section class="banner-layout1 py-0 bg">
      {{-- <div class="bg-img"><img src="{{asset('frontend/images/backgrounds/8.jpg')}}" alt="backgrounds"></div> --}}
      
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-6">
           
<div class="container my-5">
  <div class="card p-4 shadow rounded-4 border-0">
    <h3 class="card-title mb-3">About Us</h3>
    <p class="card-text">
     {{ trim(strip_tags($aboutUs->content)) }}
    </p>
  </div>
</div>
            <div class="fancybox-layout3">
              <!-- fancybox item #1 -->
              
              <div class="fancybox-item d-flex">
                
            <p> <span style="font-weight: bolder; color:rgb(1, 41, 41)">
            <ul>
              <li>Home Care Experts</li>  
              
              <li>High Calibre Caregivers.</li>
              <li>A Trusted Partner. </li>
              <li>Balanced Care.</li>
              <li>Available 24/7</li>
              
              </ul>
               </span> </p>
               
              </div>
            </div><!-- /.fancybox-layout3 -->
          </div><!-- /.col-lg-6 -->
          <div class="col-sm-12 col-md-12 col-lg-6 banner-img">
            <div class="bg-img">
              <img src="{{ asset('frontend/images/flip/y.jpg') }}" alt="backgrounds">
            </div>
          </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.Banner Layout 1 -->




     <!-- ========================
       page title 
    =========================== -->
    {{-- <section class="page-title page-title-layout5 text-center">
      <div class="bg-img"><img src="{{ asset('frontend/images/backgrounds/6.jpg') }}" alt="background"></div>
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h1 class="pagetitle__heading">Why Choose Us</h1>
            
          </div><!-- /.col-xl-6 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
      
    </section><!-- /.page-title --> --}}



          @guest
<div class="container my-5">
  <div class="card text-center shadow-sm p-4 border-0 rounded-4 bg-light">
    <h3 class="mb-3">Stay Updated</h3>
    <p class="text-muted">Subscribe to our newsletter to get the latest updates, tips, and offers.</p>

    <form action="{{ route('newsletter.subscribe') }}" method="POST" class="row g-2 justify-content-center mt-3">
      @csrf
      <div class="col-md-6">
        <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
      </div>
      <div class="col-auto">
        <button type="submit" class="btn btn-primary bg">Subscribe</button>
      </div>
    </form>

    @if(session('success'))
      <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif
  </div>
</div>
@endguest






  <!-- ========================
       why choose us 
    =========================== -->
    <section class="shop-grid">
      <center><h3 class="heading__title">Why Choose Us</h3></center> <br>
      <div class="container">
        <div class="row">

<div class="card-container">
  <!-- Card 1 -->
  <div class="flip-card">
    <div class="flip-card-inner">
      <div class="flip-card-front">
        <img src="{{ asset('frontend/images/flip/y.jpg') }}" alt="Card 1">
        <h4 class="tit">We are Compassionate</h4>
      </div>
      <div class="flip-card-back bg">
        <p>By choosing Gemau Home Care Services you are opting for a full-service home care provider that will manage your support from start to finish. We are registered and licensed to provide this support. We handle everything, so you worry less. Our managers, caregivers and medical team are all certified and registered, hence giving you the confidence to relax and know you are in capable hands..</p>
      </div>
    </div>
  </div>

  <!-- Card 2 -->
  <div class="flip-card">
    <div class="flip-card-inner">
      <div class="flip-card-front">
        <img src="{{ asset('frontend/images/flip/nurse.jpg') }}" alt="Card 2">
        <h4 class="tit">Have Trained Professionals</h4>
      </div>
      <div class="flip-card-back bg">
        <p>Care and support needs can change over time – and sometimes quite suddenly – so we see the importance in providing a flexible and adaptable service We will regularly review your support plan and carry out caregiver supervisions so we can respond to any changes and arrange extra training or support if it is needed.</p>
      </div>
    </div>
  </div>

  <!-- Card 3 -->
  <div class="flip-card">
    <div class="flip-card-inner">
      <div class="flip-card-front">
        <img src="{{ asset('frontend/images/flip/yy.jpg') }}" alt="Card 3">
        <h4 class="tit">Render Personalized In-Home Support</h4>
      </div>
      <div class="flip-card-back bg">
        <p>Our experience operating in the United States of America under has enabled us gain vast knowledge in this industry. We are experienced in providing client-centred care at home and also country-specific models of care and approach. This means we take into consideration the individuals and family’s needs and also the culture they are exposed to, to find the best way to offer care.</p>
      </div>
    </div>
  </div>

  <!-- Card 4 -->
  <div class="flip-card">
    <div class="flip-card-inner">
      <div class="flip-card-front">
        <img src="{{ asset('frontend/images/flip/yyy.jpg') }}" alt="Card 4">
        <h4 class="tit">24/7 Reliable Care</h4>
      </div>
      <div class="flip-card-back bg">
        <p>Every single one of our caregivers are employed directly by Angels Home Care Services. We never enlist the use of staffing agencies. This means we can ensure the quality of service that each of our caregivers deliver meets our high standards and that they are each totally supported in their roles.</p>
      </div>
    </div>
  </div>
</div>
    
  </div>
</div>

        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.shop -->
    
     <section class="testimonials-layout3 pt-130 bg-overlay bg-overlay-secondary bg">
      {{-- <div class="bg-img"><img src="{{ asset('frontend/images/banners/4.jpg') }}" alt="background"></div> --}}
      <div class="container">
        <div class="testimonials-wrapper">
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-5">
              <div class="heading-layout2">            
              
                <h3 class="heading__title color-primary">Inspiring Stories!</h3>
              </div><!-- /.heading -->
            </div><!-- /.col-lg-5 -->
            <div class="col-sm-12 col-md-12 col-lg-7">
              <div class="slider-with-navs">
                <!-- Testimonial #1 -->
                @foreach ($test as $item)
                    
                
                <div class="testimonial-item">
                  <h3 class="testimonial__title">“{{trim(strip_tags($item->content))}}”
                  </h3>
                </div><!-- /. testimonial-item -->
                @endforeach
                <!-- Testimonial #2 -->
                <!-- /. testimonial-item -->
                <!-- Testimonial #3 -->
                <!-- /. testimonial-item -->
              </div><!-- /.slick-carousel -->
              <div class="slider-nav mb-60">
              @foreach ($test as $item)
                <div class="testimonial__meta">
                
                  <div class="testimonial__thmb">
                    <img src="{{ asset('frontend/images/testimonials/thumbs/1.png') }}" alt="author thumb">
                  </div><!-- /.testimonial-thumb -->
                  
                      
                  
                  <div>
                    <h4 class="testimonial__meta-title">{{$item->name}}</h4>
                    <p class="testimonial__meta-desc">{{$item->title}}</p>
                  </div>
                </div><!-- /.testimonial-meta -->
                @endforeach
                
                
              </div><!-- /.slider-nav -->
            </div><!-- /.col-lg-7 -->
          </div><!-- /.row -->
        </div><!-- /.testimonials-wrapper -->

        <div class="marquee-container">
  <h4 class="marquee-text">Your Health, Our Priority!!</h4>
</div>

      </div><!-- /.container -->
    </section><!-- /.testimonials layout 3 -->

 <!-- ======================
      Team
    ========================= -->
    <section class="team-layout2 pb-80">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
            <div class="heading text-center mb-40">
              <h3 class="heading__title">Meet Our Team</h3>
              <p class="heading__desc">Our administration and support staff all have exceptional people skills and
                trained to assist you with all medical enquiries.
              </p>
            </div><!-- /.heading -->
          </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="slick-carousel"
              data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "autoplay": true, "arrows": false, "dots": false, "responsive": [ {"breakpoint": 992, "settings": {"slidesToShow": 2}}, {"breakpoint": 767, "settings": {"slidesToShow": 1}}, {"breakpoint": 480, "settings": {"slidesToShow": 1}}]}'>
             
              @foreach ($team as $item)
              <div class="member">
              
                <div class="member__img image-container">
                  <img src="{{ asset('images/team/'.$item->image) }}" alt="member img">
                </div><!-- /.member-img -->
                <div class="member__info">
                  <h4 class="member__name"><a href="{{ route('team.details', encrypt($item->id)) }}">{{ $item->name }}</a></h4>
                  <h6 class="member__job">{{ $item->title }}</h6>
                  {{-- <p class="member__desc">{{ trim(strip_tags($item->description ))}}</p> --}}
                  <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                    <a href="{{ route('team.details', encrypt($item->id)) }}" class="btn btn__secondary btn__link btn__rounded">
                      <span>Read More</span>
                      <i class="icon-arrow-right"></i>
                    </a>
                    <ul class="social-icons list-unstyled mb-0">
                      <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                      <li><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
                      <li><a href="#" class="phone"><i class="fas fa-phone-alt"></i></a></li>
                    </ul><!-- /.social-icons -->
                  </div>
                </div><!-- /.member-info -->
                
              </div><!-- /.member -->
              @endforeach
              <!-- Member #6 -->
              
            </div><!-- /.carousel -->
          </div><!-- /.col-12 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.Team -->

@endsection
