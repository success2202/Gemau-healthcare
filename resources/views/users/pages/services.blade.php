@extends('layouts.app')
@section('title')
<title> Services - Sanlive Pharmacy  </title>
@endsection
@section('head')
<link rel="canonical" href="{{ url()->current() }}">
@endsection

@section('styles')
<style>
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




<section class="page-title page-title-layout5 text-center">
  <div class="bg-img"><img src="{{ asset('frontend/images/backgrounds/im.jpg') }}" alt="background"></div>
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
        <div class="heading text-center mb-60">
          <h5>Our services</h5>
          <h3 class="heading__subtitle"><p style="color:white !important;">flexibility of our home care services....</p></h3>
        </div><!-- /.heading -->
      
        <nav>
          <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item" style="color:white !important;"><a href="{{ route('users.index') }}" style="color:white !important;">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page" style="color:white !important;">service</li>
          </ol>
        </nav>
      </div><!-- /.col-xl-6 -->
    </div><!-- /.row -->
  </div><!-- /.container -->
</section><!-- /.page-title -->
  
  
      <!-- ========================
          Services Layout 1
      =========================== -->
      <section class="services-layout1 pt-130">
        
        <div class="container">
          
          <div class="row">
            <!-- service item #1 -->
            {{-- @forelse ($services as $service) --}}
                
           @foreach ($services as $service)
               
          
            <div class="col-sm-12 col-md-6 col-lg-4">
              <div class="service-item">
                <div class="service__icon image-container">
                  <img src="{{asset('/images/services/'.$service->images)}}" alt="Product" loading="lazy">
                </div><!-- /.service__icon -->
                <div class="service__content">
                  <h6>{{ $service->title }}</h6>
                  {{ \Illuminate\Support\Str::limit(strip_tags($service->contents), 50) }}
                  
                 
                  <a href="{{ route('service.details',encrypt($service->id)) }}" class="">
                    <span>Read More</span>
                   
                  </a>
                </div><!-- /.service__content -->
              </div><!-- /.service-item -->
            </div><!-- /.col-lg-4 -->
            {{-- @empty
                
            @endforelse --}}
            @endforeach
           
           
          </div><!-- /.row -->

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
                  $start = max($services->currentPage() - 1, 1);
                  $end = min($services->currentPage() + 1, $services->lastPage());
                 @endphp
                    {{-- Previous Arrow --}}
                    @if ($services->onFirstPage())
                        <li class="disabled"><span><i class="icon-arrow-left"></i></span></li>
                    @else
                        <li><a href="{{ $services->previousPageUrl() }}"><i class="icon-arrow-left"></i></a></li>
                    @endif
            
                    {{-- Page Numbers --}}
                    @for ($i = $start; $i <= $end; $i++)
                        <li>
                            <a 
                                href="{{ $services->url($i) }}" 
                                class="{{ $services->currentPage() == $i ? 'current' : '' }}">
                                {{ $i }}
                            </a>
                        </li>
                    @endfor
            
                    {{-- Next Arrow --}}
                    @if ($services->hasMorePages())
                        <li><a href="{{ $services->nextPageUrl() }}"><i class="icon-arrow-right"></i></a></li>
                    @else
                        <li class="disabled"><span><i class="icon-arrow-right"></i></span></li>
                    @endif
            
                </ul>
            </nav>
            

            </div><!-- /.col-12 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </section><!-- /.Services Layout 1 -->


@endsection