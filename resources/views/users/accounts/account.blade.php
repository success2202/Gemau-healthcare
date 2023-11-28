@extends('layouts.app')

@section('content')

<div class="ps-shopping" style="background: #eee">
    <div class="container">
        <div class="ps-shopping__content" >
            <div class="row" >
                <div class="col-12 col-md-5 col-lg-3" style="border-radius: 5px">
                    <div class="ps-shopping__box mt-5" style="background: #fff">
                        <div class="ps-shopping__row" >
                            <div class="ps-shopping__label">Cart Summary</div>
                        </div>

                        <div class="ps-shopping__form">
                            <div class="ps-shopping__group">
                                <input class="form-control ps-input" type="text" placeholder="County">
                            </div>
                            <div class="ps-shopping__group">
                                <input class="form-control ps-input" type="text" placeholder="Town / City">
                            </div>
                            <div class="ps-shopping__group">
                                <input class="form-control ps-input" type="text" placeholder="Postcode">
                            </div>
                        </div>
                        <div class="ps-shopping__row">
                            <div class="ps-shopping__label"></div>
                            <div class="ps-shopping__price"></div>
                        </div>
                        <div class="ps-shopping__text">Shipping options will be updated during checkout.</div> 
                       
                        <div class="ps-shopping__checkout">
                        <a class="ps-btn ps-btn--success"  style="border-radius:5px" href="">Proceed to checkout</a>
                            <a class="ps-shopping__link" href="">Continue Shopping</a></div>
                    </div>
                </div>
                <div class="col-12 col-md-7 col-lg-8 mt-5" style="background: #fff; border-radius: 5px">

                <p class="m-4"></p> 
                <div class="ps-categogy--list">
    
                <div class="ps-product ps-product--list" style="border:2px solid #d1d5dad4; border-radius:10px">
                    <div class="ps-product__content" style="border-right:0px">
                        <div class="ps-product__thumbnail"><a class="ps-product__image" href="#">
                                <figure><img src="{{asset('/frontend/img/products/053.jpg')}}" alt="alt">
                                </figure>
                            </a>
                        </div>
                  
                        <div class="ps-product__info"><a class="ps-product__branch" href="#"></a>
                            <p class="ps-product__tite" style="font-size:16px; color:#262525"><a></a></p>
                            <div class="ps-product__meta"><span class="ps-product__price" style="font-size:15px">{{moneyFormat(1000)}}
                                <span class="ps-product__del" style="font-size:15px">{{moneyFormat(10000)}}</span>
                            </div>
                            <ul class="ps-product__list">
                                <li> <span class="ps-list__title"> </span><a class="ps-list__text" href="#"></a>
                                </li>
                            </ul>
                        </div>

                 
                    </div>
                </div>
                </div>
                </div>
            
           
            
            </div>
        
        </div>
    </div>
</div>
<div style="height: 2em; background:#eee"></div>

@endsection

@section('script')

@endsection