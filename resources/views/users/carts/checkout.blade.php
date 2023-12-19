@extends('layouts.app')
@section('content')
@section('styles')

<style>

.delivery{
    color:#343232;
     font-size:14px;
    font-family:Verdana,'Geneva', Tahoma, sans-serif"
}
</style>
@endsection
<div class="ps-shopping" style="background: #eee">
    <form method="post" action="{{route('paystack.checkout')}}">
        @csrf
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
                <div class="col-12 col-md-12 col-lg-12 mt-2" style="background: #fff;  border-radius:10px" >
                    <p class="m-4" style="color:#777373"> 
                    <i class="fa fa-check-square-o" style="color:rgb(77, 129, 77)"></i>
                     Delivery Details</p> 
                     Select Delivery Method
                    <hr>
                    <label for="delivery" style="width: 100%">
                        <div  style="border:1px solid #00000031; border-radius:10px">
                    <div class="ps-categogy--ist p-2" style="display: flex; ">
                    <input type="radio" id="delivery" name="delivery" value="pickup_delivery" data-amount="0"> 

                    <label for="delivery" class="pl-2"> Pick-up Delivery </label>
                    </div>
                    <div style="">
                        
                    <p class="p-2 delivery" > {{$start->format('D d, M')}} - {{$end->format('D, d M')}} 
                        <span style="float:right; color:green"> N0 </span></p>
                    <p class="p-2 delivery" > You have to visit our office at {{$settings->address}} to pick your item</p>
                    <input type="hidden" name="address_id" value="{{$address->id}}"> 
                    <input type="hidden" name="orderNo" value="{{$orderNo}}"> 
                    
               
                </div>
                </div>
            </label>
                 <hr>
                 <label for="home" style="width: 100%">
                 <div  style="border:1px solid #00000031; border-radius:10px">
                 <div class="ps-categogy--ist p-2" style="display: flex; ">
                    <input type="radio" name="delivery" id="home" value="home_delivery" data-amount="{{$shipping_fee}}"> 
                    <input type="hidden" value="{{$shipping_fee}}" name="shipping_cost"> 
                    <label for="home" class="pl-2"> Home Delivery Delivery </label>
                    </div>
                    <div  class="mb-5" >
                    <p class="p-2 delivery" > Delivery between {{$start->format('D d M')}} - {{$end->format('D d M')}} <span style="float:right; color:green"> {{moneyFormat($shipping_fee)??'0'}}</span></p>
                    <p class="p-2 delivery" > Item will be shipped to your location at {{$address->address}}, {{$address->city}} |  {{$address->state}}, {{$address->country}}   </p>
                 </div>
                </div>
                 </label>
                </div>

                  <div class="col-12 col-md-12 col-lg-12 mt-3" style="background: #fff;  border-radius:10px">
                    <p class="m-4" style="color:#777373"><i class="fa fa-check-square-o" style="color:rgb(77, 129, 77)"></i> Payment Method</p> 
                    <hr>
                    <div class="ps-categogy--ist">
                    <p style="display: flex; align-content:left">
                        <input type="checkbox" checked> 
                        <label class="pl-2 delivery" > Paystack Payment</label> 
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
                        <div class="ps-shopping__row">
                            <div class="ps-shopping__label">Item Total</div>
                            <div class="ps-shopping__price">₦{{\Cart::priceTotal()}}</div>
                        </div>
                        <div class="ps-shopping__row">
                            <div class="ps-shopping__label" >Delivery Fee</div>
                            <div class="ps-shopping__price" id="fee">{{moneyFormat(0)}}</div>
                            
                        </div>
                        <div class="ps-shopping__row">
                            <div class="ps-shopping__label">Total</div>
                            <div class="ps-shopping__price" id="total">{{moneyFormat(\Cart::priceTotalFloat())}}</div>
                            <input type="hidden" id="sub_total" value={{\Cart::priceTotalFloat()}}>
                        </div>
                        <div class="ps-shopping__text">You will be able to add a voucher when selecting your payment method.</div>
                        <input type="hidden" id="amount" name="amount" value="{{\Cart::priceTotalFloat()}}">
                        <div class="ps-shopping__checkout">
                            <button class="ps-btn ps-btn--success"  style="border-radius:5px" href="{{route('checkout.index')}}">Complete Order</button>
                            <a class="ps-shopping__link" href="{{route('shops.index')}}">Continue Shopping</a></div>
                    </div>
                </div>
                @endif
            </div>
        
        </div>

    </form>
    </div>
</div>
<div style="height: 2em; background:#eee"></div>

@endsection

@section('script')

<script>
    
    $('#delivery').on('click', function(){
        if($('#delivery').attr('checked', true))
        {
           let amount = $('#sub_total').val(); 
           let fee = $('#delivery').data('amount');
           let total = parseFloat(amount) + parseFloat(fee);
             $('#total').html('₦' + total.toLocaleString('en-US', { minimumFractionDigits: 2 }));
            $('#amount').val(total);
            $('#fee').html('₦' + fee.toLocaleString('en-US', { minimumFractionDigits: 2 }));
        }
    })

    $('#home').on('click', function(){
        if($('#home').attr('checked', true))
        {
           let amount = $('#sub_total').val(); 
           let fee = $('#home').data('amount');
           let total = parseFloat(amount) + parseFloat(fee);
           $('#total').html('₦' + total.toLocaleString('en-US', { minimumFractionDigits: 2}));
           $('#amount').val(total);
           $('#fee').html('₦' + fee.toLocaleString('en-US', { minimumFractionDigits: 2 }));
        }
    });


</script>
<script>
  

</script>
@endsection