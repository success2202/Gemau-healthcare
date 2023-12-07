<header class="ps-header ps-header--8 ps-header--mobile">
    <div class="ps-noti">
        <div class="container">
            <p class="m-0">{!! $announcment->content??null !!}</p>
        </div><a class="ps-noti__close"><i class="icon-cross"></i></a>
    </div>
    <div class="ps-header__middle">
        <div class="container">
            <div class="ps-logo"><a href="index.html"> <img src="{{asset('images/'.$settings->site_logo)}}" alt></a></div>
            <div class="ps-header__right">
                <ul class="ps-header__icons">
                    <li><a class="ps-header__item open-search" href="#"><i class="fa fa-search"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</header>