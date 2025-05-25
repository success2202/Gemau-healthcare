@extends('layouts.app')
@section('title')
<title> Services - Sanlive Pharmacy  </title>
@endsection
@section('head')
<link rel="canonical" href="{{ url()->current() }}">
@endsection
@section('content')




 <!-- ========================
       page title 
    =========================== -->
    <section class="page-title pt-30 pb-30 text-center">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12">
              <nav>
                <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item"><a href="blog.html">Blog</a></li>
                  
                </ol>
              </nav>
            </div><!-- /.col-12 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </section><!-- /.page-title -->
  
  
      <!-- ========================
          Services Layout 1
      =========================== -->
      <section class="services-layout1 pt-130">
        <div class="bg-img"><img src="{{ asset('frontend/images/backgrounds/2.jpg') }}" alt="background"></div>
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
              <div class="heading text-center mb-60">
                <h2 class="heading__title ">Our services</h2>
                <h3 class="heading__subtitle">The company offers a complete assortment of both on-grid and off-grid solutions, including modules, inverters, mounting systems and accessories.</h3>
              </div><!-- /.heading -->
            </div><!-- /.col-lg-6 -->
          </div><!-- /.row -->
          <div class="row">
            <!-- service item #1 -->
            <div class="col-sm-12 col-md-6 col-lg-4">
              <div class="service-item">
                <div class="service__icon">
                  <i class="icon-head"></i>
                  <i class="icon-head"></i>
                </div><!-- /.service__icon -->
                <div class="service__content">
                  <h4 class="service__title">Neurology Clinic</h4>
                  <p class="service__desc">Some neurologists receive subspecialty training focusing on a particular area
                    of
                    the fields, these training programs are called fellowships, and are one to two years.
                  </p>
                  <ul class="list-items list-items-layout1 list-unstyled">
                    <li>Neurocritical Care</li>
                    <li>Neuro Oncology</li>
                    <li>Geriatric Neurology</li>
                  </ul>
                  <a href="services-single.html" class="btn btn__secondary btn__outlined btn__rounded">
                    <span>Read More</span>
                    <i class="icon-arrow-right"></i>
                  </a>
                </div><!-- /.service__content -->
              </div><!-- /.service-item -->
            </div><!-- /.col-lg-4 -->
            <!-- service item #2 -->
            <div class="col-sm-12 col-md-6 col-lg-4">
              <div class="service-item">
                <div class="service__icon">
                  <i class="icon-heart"></i>
                  <i class="icon-heart"></i>
                </div><!-- /.service__icon -->
                <div class="service__content">
                  <h4 class="service__title">Cardiology Clinic</h4>
                  <p class="service__desc">All cardiologists study the disorders of the heart, but the study of adult and
                    child heart disorders are trained to take care of small children and adult heart disease.
                  </p>
                  <ul class="list-items list-items-layout1 list-unstyled">
                    <li>Neurocritical Care</li>
                    <li>Neuro Oncology</li>
                    <li>Geriatric Neurology</li>
                  </ul>
                  <a href="services-single.html" class="btn btn__secondary btn__outlined btn__rounded">
                    <span>Read More</span>
                    <i class="icon-arrow-right"></i>
                  </a>
                </div><!-- /.service__content -->
              </div><!-- /.service-item -->
            </div><!-- /.col-lg-4 -->
            <!-- service item #3 -->
            <div class="col-sm-12 col-md-6 col-lg-4">
              <div class="service-item">
                <div class="service__icon">
                  <i class="icon-microscope"></i>
                  <i class="icon-microscope"></i>
                </div><!-- /.service__icon -->
                <div class="service__content">
                  <h4 class="service__title">Pathology Clinic</h4>
                  <p class="service__desc">Pathology is the study of disease, it is the bridge between science and
                    medicine.
                    Also it underpins every aspect of patient care, from diagnostic testing and treatment.
                  </p>
                  <ul class="list-items list-items-layout1 list-unstyled">
                    <li>Surgical Pathology</li>
                    <li>Histopathology</li>
                    <li>Cytopathology </li>
                  </ul>
                  <a href="services-single.html" class="btn btn__secondary btn__outlined btn__rounded">
                    <span>Read More</span>
                    <i class="icon-arrow-right"></i>
                  </a>
                </div><!-- /.service__content -->
              </div><!-- /.service-item -->
            </div><!-- /.col-lg-4 -->
            <!-- service item #4 -->
            <div class="col-sm-12 col-md-6 col-lg-4">
              <div class="service-item">
                <div class="service__icon">
                  <i class="icon-dropper"></i>
                  <i class="icon-dropper"></i>
                </div><!-- /.service__icon -->
                <div class="service__content">
                  <h4 class="service__title">Laboratory Analysis</h4>
                  <p class="service__desc">Analyzing the radon or radon progeny concentrations with passive devices, or
                    the
                    act of calibrating radon or radon progeny measurement devices.
                  </p>
                  <ul class="list-items list-items-layout1 list-unstyled">
                    <li>Newborn Care</li>
                    <li>Umbilical Cord Appearance </li>
                    <li>Repositioning Techniques</li>
                  </ul>
                  <a href="services-single.html" class="btn btn__secondary btn__outlined btn__rounded">
                    <span>Read More</span>
                    <i class="icon-arrow-right"></i>
                  </a>
                </div><!-- /.service__content -->
              </div><!-- /.service-item -->
            </div><!-- /.col-lg-4 -->
            <!-- service item #5 -->
            <div class="col-sm-12 col-md-6 col-lg-4">
              <div class="service-item">
                <div class="service__icon">
                  <i class="icon-heart3"></i>
                  <i class="icon-heart3"></i>
                </div><!-- /.service__icon -->
                <div class="service__content">
                  <h4 class="service__title">Pediatric Clinic</h4>
                  <p class="service__desc">Pediatric providers see patients from birth into early adulthood to make sure
                    children achieve stay healthy. Our care includes preventive health checkups.
                  </p>
                  <ul class="list-items list-items-layout1 list-unstyled">
                    <li>Clinical laboratory</li>
                    <li>Research Analyst</li>
                    <li>Quality Assurance</li>
                  </ul>
                  <a href="services-single.html" class="btn btn__secondary btn__outlined btn__rounded">
                    <span>Read More</span>
                    <i class="icon-arrow-right"></i>
                  </a>
                </div><!-- /.service__content -->
              </div><!-- /.service-item -->
            </div><!-- /.col-lg-4 -->
            <!-- service item #6 -->
            <div class="col-sm-12 col-md-6 col-lg-4">
              <div class="service-item">
                <div class="service__icon">
                  <i class="icon-heart2"></i>
                  <i class="icon-heart2"></i>
                </div><!-- /.service__icon -->
                <div class="service__content">
                  <h4 class="service__title">Cardiac Clinic</h4>
                  <p class="service__desc">For people requiring additional follow up, the Cardiac Clinic provides rapid
                    access to professionals specialized in diagnosing and treating heart disease.
                  </p>
                  <ul class="list-items list-items-layout1 list-unstyled">
                    <li>Macular degeneration</li>
                    <li>Diabetic retinopathy</li>
                    <li>Excessive tearing</li>
                  </ul>
                  <a href="services-single.html" class="btn btn__secondary btn__outlined btn__rounded">
                    <span>Read More</span>
                    <i class="icon-arrow-right"></i>
                  </a>
                </div><!-- /.service__content -->
              </div><!-- /.service-item -->
            </div><!-- /.col-lg-4 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </section><!-- /.Services Layout 1 -->






@endsection