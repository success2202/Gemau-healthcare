<header class="ps-header ps-header--2 ps-header--8">
    <div class="ps-noti">
        <div class="container">
            <p class="m-0">  <marquee> {!! $announcment->content??null !!}</marquee> </p>
        </div><a class="ps-noti__close"><i class="icon-cross"></i></a>
    </div>
    <div class="ps-header__top">
        <div class="container">
            <div class="ps-header__text"> <strong>100% Secure delivery </strong>without contacting the courier </div>
            <div class="ps-top__right">
                <div class="ps-language-currency">
                    <a class="ps-dropdown-value" href="javascript:void(0);" data-toggle="modal" data-target="#popupCurrency">NGN</a></div>
                <div class="ps-top__social">
                    <ul class="ps-social">
                        <li><a class="ps-social__link facebook" href="{{$settings->facebook}}"><i class="fa fa-facebook"> </i><span class="ps-tooltip">Facebook</span></a></li>
                        <li><a class="ps-social__link instagram" href="{{$settings->instagram}}"><i class="fa fa-instagram"></i><span class="ps-tooltip">Instagram</span></a></li>
                        <li><a class="ps-social__link linkedin" href="{{$settings->linkedin}}"><i class="fa fa-linkedin"></i><span class="ps-tooltip">Linkedin</span></a></li>
                        <li><a class="ps-social__link linkedin" href="{{$settings->twitter}}"><i class="fa fa-twitter"></i><span class="ps-tooltip">Twitter</span></a></li>
                    </ul>
                </div>
                <ul class="menu-top">
                    <li class="nav-item"><a class="nav-link" href="index.html">Order Tracking</a></li>
                </ul>
                {{-- <div class="ps-header__text">Need help? <strong>{{$settings->site_phone}}</strong></div> --}}
            </div>
        </div>
    </div>
    <div class="ps-header__middle">
        <div class="container">
            <div class="ps-logo"><a href="{{route('users.index')}}"> <img src="{{asset('/frontend/img/'.$settings->site_logo)}}" alt>
                <img class="sticky-logo" src="{{asset('/frontend/img/'.$settings->site_logo)}}" alt></a></div><a class="ps-menu--sticky" href="#"><i class="fa fa-bars"></i></a>
            <div class="ps-header__right">
                <ul class="ps-header__icons">
                    {{-- <li><a class="ps-header__item open-search" href="#"><i class="icon-magnifier"></i></a></li> --}}
                   @guest
                    <li ><a   class="ps-header__item" style="width:80px; font-size:1em; border:1px solid #eeeeee5f; color:#5b6c8f"  href="#" id="login-modal"> <i class="icon-user"  style="font-size:20px; padding-right:2px; font-weight:800"></i> Account </a>
                        <div class="ps-login--modal">
                                <button class="ps-btn ps-btn--warning" style="border-radius:5px" type="submit">Log In</button>
                            <hr> 
                        <a href=""> Orders </a>
                        <a href=""> Inbox </a>
                        </div>
                    </li>
                    @else 
                    <li ><a   class="ps-header__item" style="width:120px; font-size:1em; border:1px solid #eeeeee5f; color:#5b6c8f"  href="#" id="login-modal"> 
                        <i class="icon-user"  style="font-size:20px; padding-right:2px; font-weight:800"></i> Hi! {{strtoupper(auth_user()->first_name)}} </a>
                        <div class="ps-login--modal">
                            <a href="{{route('users.account.index')}}" class="ps-btn ps-btn--primary" style="border-radius:5px" type="submit">My Account</a>
                            <hr>
                        {{-- <a href="" class="ps-btn " style="font-size: 20px; background-color:none; color:#000; text-align:left"> Orders </a> --}}
                        </div>
                    </li>

                    @endauth
                    <li ><a   class="ps-header__item" style="width:100px; font-size:1em; border:1px solid #eeeeee5f; color:#5b6c8f"  href="#" > 
                        <i class="icon-question" style="font-size:14px; margin-right:2px; border:2px solid #5b6c8f; border-radius:50px; padding:2px; font-weight:bolder" ></i> Help</a>
                        <li ><a   class="ps-header__item " style="width:80px; font-size:1em; border:1px solid #eeeeee5f; color:#5b6c8f"  href="{{route('carts.index')}}" > 
                            <i  style="font-size:20px; padding-right:2px; font-weight:800" class="icon-cart-empty"></i> 
                             <span class="badge cartReload" style="left:12px">{{Cart::count()}}</span>  Cart </a>
                </ul>
                <div class="ps-header__search">
                    <form action="" method="post">
                        <div class="ps-search-table" style="border-radius:5px">
                            <div class="input-group">
                                <input class="form-control ps-input" type="text" placeholder="Search for products">
                                <div class="input-group-append"><a href="#"><i class="fa fa-search"></i></a></div>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- <div class="ps-middle__text">Need help? <strong>{{$settings->site_phone}}</strong></div> --}}
            </div>
        </div>
    </div>
  @include('partials.nav')
</header>