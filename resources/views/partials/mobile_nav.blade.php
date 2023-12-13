<div class="ps-navigation--footer">
    <div class="ps-nav__item"><a href="#" id="open-menu"><i class="icon-menu"></i></a><a href="#" id="close-menu"><i class="icon-cross"></i></a></div>
    <div class="ps-nav__item"><a href="{{route('index')}}"><i class="icon-home2"></i></a></div>
    <div class="ps-nav__item"><a href="{{route('users.account.index')}}"><i class="icon-user"></i></a></div>
    {{-- <div class="ps-nav__item"><a href="wishlist.html"><i class="fa fa-heart-o"></i><span class="badge"></span></a></div> --}}
    <div class="ps-nav__item"><a href="{{route('carts.index')}}"><i class="icon-cart-empty"></i><span class="badge cartReload">{{Cart::count()}}</span></a></div>
</div>