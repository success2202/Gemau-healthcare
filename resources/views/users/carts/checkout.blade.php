@extends('layouts.app')
@section('content')
<div class="ps-shopping" style="background: #eee">
    <div class="container">
        <div class="ps-shopping__content" >
            <div class="row" >
                <div class="col-12 col-md-7 col-lg-9 mt-5" >
                <div class="row">
                <div class="col-12 col-md-12 col-lg-12" style="background: #fff; border-radius:10px">
                <p class="m-4" style="color:#777373"> <i class="fa fa-check-square-o" style="color:rgb(77, 129, 77)"></i>  Shipping Address <span style="float:right"> 
                    <a href="{{route('checkouts.changeAddress')}}"> {{_('Change >')}}  </a> </span></p> 
                <hr>
                <div class="ps-categogy--ist">
                    <p style="color:#76717a">{{$address->name}}</p>
                    <p style="color:#76717a">{{$address->address}}, {{$address->city}} |  {{$address->state}}, {{$address->country}} 
                        | {{$address->phone}} | {{$address->email}}</p>
                </div>
                </div>
                <div class="col-12 col-md-12 col-lg-12 mt-3" style="background: #fff;  border-radius:10px">
                    <p class="m-4" style="color:#777373"> 
                    <i class="fa fa-check-square-o" style="color:rgb(77, 129, 77)"></i>
                     Delivery Details</p> 
                     Select Delivery Method
                    <hr>
                    <div class="ps-categogy--ist" style="display: flex; ">
                    <input type="radio" > 
                    <label for="delivery" class="pl-2"> Pick-up Delivery </label>
                    </div>
                    <div style="border:1px solid #00000031">
                    <p class="p-2"> Delivery between 25 November to 26 November 2023 <span style="float:right; color:green"> N0 </span></p>
                    <hr>
                    <p class="p-2"> You have to visit our shop at lagos state number 24 to pick your item</p>
                 </div>
                 <div class="ps-categogy--ist p-2" style="display: flex; ">
                    <input type="radio" > 
                    <label for="delivery" class="pl-2"> Home Delivery Delivery </label>
                    </div>
                    <div style="border:1px solid #00000031" class="mb-5">
                    <p class="p-2"> Delivery between 25 November to 26 November 2023 <span style="float:right; color:green"> #3000</span></p>
                    <hr>
                    <p class="p-2"> Item will be shipped to your location at {{$address->address}}, {{$address->city}} |  {{$address->state}}, {{$address->country}}   </p>
                 </div>
                </div>

                  <div class="col-12 col-md-12 col-lg-12 mt-3" style="background: #fff;  border-radius:10px">
                    <p class="m-4" style="color:#777373"><i class="fa fa-check-square-o" style="color:rgb(77, 129, 77)"></i> Payment Method</p> 
                    <hr>
                    <div class="ps-categogy--ist">
                    <p style="display: flex; align-content:left">
                        <input type="checkbox" checked> 
                        <label class="pl-2"> Paystack Payment</label> 
                    </p>
                    </div>
                    </div>
               </div>
                </div>
            
                @if(count($carts) > 0)
                <div class="col-12 col-md-5 col-lg-3">
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
                            <div class="ps-shopping__label">Total</div>
                            <div class="ps-shopping__price">₦{{\Cart::priceTotal()}}</div>
                        </div>
                        <div class="ps-shopping__text">Shipping options will be updated during checkout.</div>
                       
                        <div class="ps-shopping__checkout">
                            <a class="ps-btn ps-btn--success"  style="border-radius:5px" href="{{route('checkout.index')}}">Complete Order</a>
                            <a class="ps-shopping__link" href="{{route('shops.index')}}">Continue Shopping</a></div>
                    </div>
                </div>
                @endif
            </div>
        
        </div>
    </div>
</div>
<div style="height: 2em; background:#eee"></div>

@endsection

@section('script')
<script>
  

</script>
@endsection