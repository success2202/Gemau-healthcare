<header class="header header-layout2">
    <nav class="navbar navbar-expand-lg sticky-navbar">
    
      <div class="container-fluid">
        <a class="navbar-brand" href="{{route('dashboard')}}">
          {{-- <img src="" class="logo-light" alt="logo"> --}}
          {{-- <img src="{{asset('images/lgg.png')}}" class="logo-dark" height="90px" width="110px" alt="logo"> --}}
          <img src="{{asset('images/'.$settings->site_logo)}}" class="logo-dark" height="90px" width="130px" alt="logo">
          {{-- <a href="{{route('index')}}"><img src="{{asset('assets/'.$settings->logo)}}" alt="{{$settings->site_name}}" class="logo-dark" width="120px"></a> --}}
        </a>
        
        <button class="navbar-toggler" type="button">
          <span class="menu-lines"><span></span></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNavigation">
          <ul class="navbar-nav ml-auto">
            @forelse ($site_menu as $menu)
            @if($menu->has_child)
            <li class="nav__item has-dropdown">
              <a href="{{route($menu->slug)}}" data-toggle="dropdown" class="dropdown-toggle nav__item-link">{{$menu->name}}</a>
              @if(count($menu->subMenu) > 0)
              <ul class="dropdown-menu">
                @forelse ($menu->subMenu as $sub) 
                <li class="nav__item">
                  <a href="{{route($sub->slug, $sub->hashid)}}" class="nav__item-link">{{$sub->name}}</a>
                </li>
                @empty
                @endforelse
              </ul>
              @endif
            </li><!-- /.nav-item -->
            @else 
            <li class="nav__item"> <a class="nav__item-link" href="{{route($menu->slug)}}">{{$menu->name}}</a>@endif

              
            @empty 
            @endforelse
           
          </ul><!-- /.navbar-nav -->
          <button class="close-mobile-menu d-block d-lg-none"><i class="fas fa-times"></i></button>
        </div><!-- /.navbar-collapse -->
    
        <div class="d-none d-xl-flex align-items-center position-relative ml-30">
          @guest
              
         
            <a href="" class=" btn-sm nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown">
              <i class="icon-user"></i>
              <span>Get Started</span>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
              <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
          </ul>
          @else
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
            <i class="icon-user"></i>
            {{ Auth::user()->first_name }}
        </a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('users.account.index') }}">Profile</a></li>
            <li class="dropdown-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" >Logout</button>
                </form>
            </li>
        </ul>
          @endguest
          
              
          </div>




          <!-- User dropdown -->
{{-- 
  @guest
      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
          Account
      </a>
      <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
          <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
      </ul>
  @else
      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
          {{ Auth::user()->name }}
      </a>
      <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
          <li>
              <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button type="submit" class="dropdown-item">Logout</button>
              </form>
          </li>
      </ul>
  @endguest --}}



          {{-- <div class="d-none d-xl-flex align-items-center position-relative ml-30">
            <a href="" class=" btn-sm">
              <i class="icon-cart"></i>
              <span>MyCart</span>
            </a>
          </div> --}}
        {{-- <button class="action__btn-search ml-30"><i class="fa fa-search"></i></button> --}}
      </div><!-- /.container -->
    </nav><!-- /.navabr -->
  </header><!-- /.Header -->