<section class="slider">
    <div class="slick-carousel m-slides-0" 
      data-slick='{"slidesToShow": 1, "arrows": true,"autoplay": true, "dots": false, "speed": 3000,"fade": true,"cssEase": "linear"}'>
      
      @forelse($sliders as $slider)
      <div class="slide-item align-v-h">
        <div class="bg-img"><img src="{{asset('images/sliders/'.$slider->image_path)}}" alt=""></div>
      <div class="bg-dark bg-opacity-50 p-4 rounded" style="background-color: transparent !important;" >
          <h1 style="color:rgb(1, 221, 85)"> Expert Care, Anytime </h1>
          <p style="color:rgb(6, 51, 51)"><b>Book your appointment with our specialists now.</b></p>
          <a href="{{ route('users.bookAppointment') }}" class="btn btn-primary mt-2 bg">Book Appointment</a>
        </div>
      </div><!-- /.slide-item -->
 
      @empty 
      @endforelse
 
    {{-- </div><!-- /.carousel -->
         <div class="marquee-container">
  <h2 class="marquee-text">GEMAU HealthCare Services..</h2>
</div> --}}
  </section><!-- /.slider -->




