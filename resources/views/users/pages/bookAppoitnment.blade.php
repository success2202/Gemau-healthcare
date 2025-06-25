@extends('layouts.app')
@section('title')
<title> Appointment - GEMAU  </title>
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

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

 @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
<section class="contact-layout2 pt-0">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="contact-panel d-flex flex-wrap">
              <form class="contact-panel__form" method="post" action="{{ route('appointment.store') }}">
                @csrf
                <div class="row">
                  <div class="col-sm-12">
                    <h4 class="contact-panel__title">Book An Appointment</h4>
                    <p class="contact-panel__desc mb-30">Please feel welcome to contact our friendly reception staff
                      with any general or medical enquiry. Our doctors will receive or return any urgent calls.
                    </p>
                  </div>
                  <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group">
                      <i class="icon-widget form-group-icon"></i>
                      <select name="clinics" class="form-control">
                        <option value="">Choose Clinic</option>
                        <option value="pathology" {{ old('item') == 'pathology' ? 'selected' : '' }}>Pathology Clinic</option>
                        <option value="joy_clinic" {{ old('item') == 'joy_clinic' ? 'selected' : '' }}>Joy Clinic</option>

                      </select>
                    </div>
                  </div><!-- /.col-lg-6 -->
                  <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group">
                      <i class="icon-user form-group-icon"></i>
                      <select name="doctors" class="form-control">
                        <option value="">Choose Doctor</option>
                         <option value="Ahmed" {{ old('item') == 'Almed' ? 'selected' : '' }}>Almed abdallah</option>
                          <option value="mahmoud" {{ old('item') == 'mahmoud' ? 'selected' : '' }}>Mamoud Begha</option>
                       
                      </select>
                    </div>
                  </div><!-- /.col-lg-6 -->
                  <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group">
                      <i class="icon-news form-group-icon"></i>
                      <input type="text" class="form-control" placeholder="Name"  name="name"
                        required>
                    </div>
                  </div><!-- /.col-lg-6 -->
                  <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group">
                      <i class="icon-email form-group-icon"></i>
                      <input type="email" class="form-control" placeholder="Email" 
                        name="email" required>
                    </div>
                  </div><!-- /.col-lg-6 -->
                  <div class="col-sm-4 col-md-4 col-lg-4">
                    <div class="form-group">
                      <i class="icon-phone form-group-icon"></i>
                      <input type="text" class="form-control" placeholder="Phone"
                        name="phone" required>
                    </div>
                  </div><!-- /.col-lg-4 -->
                  <div class="col-sm-4 col-md-4 col-lg-4">
                    <div class="form-group form-group-date">
                      <i class="icon-calendar form-group-icon"></i>
                      <input type="date" class="form-control"  name="appointment_date" required>
                    </div>
                  </div><!-- /.col-lg-4 -->
                  <div class="col-sm-4 col-md-4 col-lg-4">
                    <div class="form-group form-group-date">
                      <i class="icon-clock form-group-icon"></i>
                      <input type="time" class="form-control"  name="time" required>
                    </div>
                  </div><!-- /.col-lg-4 -->

                <div class="form-group col-md-6 mb-4">
                                    <select name="services" class="form-control form-select"  required>
                                        <option value="" disabled selected>Select Service</option>
                                         <option value="health_checkup" {{ old('item') == 'health_checkup' ? 'selected' : '' }}>heaalth checkup</option>
                                        {{-- <option value="health_checkup">health checkup</option> --}}
                                        <option value="homecare" {{ old('item') == 'homecare' ? 'selected' : '' }}>homecare</option>
                                        <option value="special_care" {{ old('item') == 'special_care' ? 'selected' : '' }} >special care</option>
                                        <option value="nursing_service" {{ old('item') == 'nursing_service' ? 'selected' : '' }}>nursing service</option>
                                        <option value="lab_testing" {{ old('item') == 'lab_testing' ? 'selected' : '' }}>lab testing</option>
                                        <option value="vaccinations" {{ old('item') == 'vaccinations' ? 'selected' : '' }}>vaccinations</option>
                                        <option value="chronic_care" {{ old('item') == 'chronic_care' ? 'selected' : '' }}>chroni care</option>
                                        <option value="pharmacy"  {{ old('item') == 'pharmacy' ? 'selected' : '' }}>pharmacy</option>

                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                    <div class="form-group form-group-date">
                     
                      
                      <textarea class="form-control" name="message" class="bi bi-envelope" rows="9" class="form-control"  placeholder="message" required></textarea>
                    </div>
                  </div>

<div class="mb-4">
        <label class="inline-flex items-center">
            <input type="checkbox" name="agree" class="form-checkbox text-green-600" {{ old('agree') ? 'checked' : '' }}>
            <span class="ml-2 text-sm text-gray-700">
                I agree to the <a href="{{ route('pages.terms')}}" class="text-blue-600 underline" target="_blank">Terms & Conditions</a>
            </span>
        </label>
        @error('agree')
            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
        @enderror
    </div>

                  <div class="col-12">
                    <button type="submit"  class="btn btn__secondary btn__rounded btn__block btn__xhight mt-10 bg">
                      <span>Book Appointment</span> 
                    </button>
                    <p><b>Note:</b> Appointment booking is subject to official confirmation.  A feedback should be expected via e-mail within 24 hours after form submission </p>
                    <div class="contact-result"></div>
                  </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
              </form>
              <div
                class="contact-panel__info d-flex flex-column justify-content-between bg-overlay bg-overlay-primary-gradient bg">
                {{-- <div class="bg-img"><img src="assets/images/banners/1.jpg" alt="banner"></div> --}}
                <div>
                  <h4 class="contact-panel__title color-white">Why Choose Us</h4>
                  <ul class="contact__list list-unstyled mb-30">
                  
                    <li>Home Care Experts</li>  
                    <li>Available 24/7</li>
                    <li>High Calibre Caregivers.</li>
                    <li>A Trusted Partner. </li>
                    <li>Balanced Care.</li>
                    <li>Peace of Mind</li>
              
               
                  </ul>
                </div>
                <div>
                  
                  <a href="{{ route('contact-us') }}" class="btn btn__white btn__rounded btn__outlined">Contact Us</a>
                </div>
              </div>
            </div>
          </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.contact layout 2 -->
@endsection