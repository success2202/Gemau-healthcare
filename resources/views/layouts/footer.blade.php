

<footer class="footer">
    <div class="footer-primary">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-2">
            <div class="footer-widget-about">
                <a href="{{route('dashboard')}}"><img style="background-color:white;" src="{{asset('images/'.$settings->site_logo)}}"  alt="" height="90px" width="120px"/></a>
              {{-- <p class="color-gray">{!!substr($settings->about, 0,100) !!} </p> --}}
              {{-- <h5 style="color:whitesmoke">Our Mission</h5>
              <p> at GEMAU Health Services LLC, our missionis to deliver compassionate, personalised, 
                and high-quality homr care thatempowers every patient to live with dignity,
                independence, and optional well-being. 
              </p> --}}
            
            </div><!-- /.footer-widget__content -->
          </div><!-- /.col-xl-2 -->
          <div class="col-sm-6 col-md-6 col-lg-2 offset-lg-1">
            <div class="footer-widget-nav">
              <h6 class="footer-widget__title"></h6>
              <nav>
                <ul class="list-unstyled">
                    @forelse ($site_menu as $menu )
                    <li > 
                    @if($menu->name == 'Home') 
                    <a style="color:#d6d2d2" href="{{route('dashboard')}}">{{$menu->name}}</a>
                     @else <a style="color:#d6d2d2" href="{{route('pages', encrypt($menu->id))}}">{{$menu->name}}</a> @endif
                   </li>
                     @empty
                    @endforelse
                </ul>
              </nav>
            </div><!-- /.footer-widget__content -->
          </div><!-- /.col-lg-2 -->
          <div class="col-sm-6 col-md-6 col-lg-2">
            <div class="footer-widget-nav">
              <h6 class="footer-widget__title">Links</h6>
              <nav>
                  <ul class="list-unstyled">
                <li><a href="{{ route('pages.terms') }}">Terms & Conditions</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Cookies</a></li>
              </ul>
              </nav>
            </div><!-- /.footer-widget__content -->
          </div><!-- /.col-lg-2 -->
          <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="footer-widget-contact" style="background: #1d2a4d; color:#fff">
              <h6 class="footer-widget__title" style="color:#fff">Quick Contacts</h6>
              <ul class="contact-list list-unstyled">
                <li>If you have any questions or need help, feel free to contact with our team.</li>
                <li>
                  <a href="tel:01061245741" class="phone__number" style="color:#fff">
                    <i class="icon-phone"></i> <span style="color:#fff">{{$settings->site_phone}}</span>
                  </a>
                </li>
                <p style="color:#d6d2d2"><i class="fa fa-map-marker"></i> {{$settings->address}}.</p>
              </ul>
              <div class="d-flex align-items-center">
                <ul class="social-icons list-unstyled mb-0">
                    <p style="color:#d6d2d2"><i class="fa fa-envelope-o"></i>  {{$settings->site_email}}</p>
               
                </ul><!-- /.social-icons -->
              </div>
            </div><!-- /.footer-widget__content -->
          </div><!-- /.col-lg-2 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
       <div style="color:#fff; text-align:center"> {{$settings->site_copyright}} </div>
       <button id="scrollTopBtn"><i class="fas fa-long-arrow-alt-up"></i></button>

      <div class="whatsapp-container">
  <div class="whatsapp-button">
    <div class="whatsapp-tooltip">Chat with us on WhatsApp</div>
    <a href="https://wa.me/19728025064" target="_blank" class="whatsapp-icon">
      <i class="fab fa-whatsapp text-xl"></i>
    </a>
  </div>
</div>
    </div><!-- /.footer-primary -->


<style>
.whatsapp-container {
  position: fixed;
  bottom: 30px;
  right: 80px;
  z-index: 999;
}

.whatsapp-tooltip {
  visibility: hidden;
  background-color: #25D366;
  color: white;
  text-align: center;
  padding: 6px 10px;
  border-radius: 6px;
  position: absolute;
  bottom: 60px;
  right: 0;
  opacity: 0;
  transition: opacity 0.3s;
  font-size: 14px;
  white-space: nowrap;
}

.whatsapp-button:hover .whatsapp-tooltip {
  visibility: visible;
  opacity: 1;
}

.whatsapp-icon {
  width: 50px;
  height: 50px;
  background-color: #25D366;
  color: white;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 24px;
  text-decoration: none;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}
</style>

  </footer><!-- /.Footer -->

  @include('layouts.js')