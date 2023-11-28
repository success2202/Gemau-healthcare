@extends('layouts.app')
@section('content')

<div class="ps-page--product ps-page--product1">
    <div class="container">
        <ul class="ps-breadcrumb">
            <li class="ps-breadcrumb__item"><a href="index.html">Home</a></li>
            <li class="ps-breadcrumb__item"><a href="index.html">{{ucwords(strtolower($product->category->name))}}</a></li>
            <li class="ps-breadcrumb__item active" aria-current="page">{{$product->name}}</li>
        </ul>
        <div class="ps-page__content">
            <div class="row">
                <div class="col-12 col-md-9">
                    <div class="ps-product--detail">
                        <div class="row">
                            <div class="col-12 col-xl-5">
                                <div class="ps-product--gallery">
                                    <div class="ps-product__thumbnail">
                                        @if($product->gallery)
                                            @php 
                                                $images = json_decode($product->gallery);
                                            @endphp
                                            @foreach ($images as $item) 
                                        <div class="slide"><img src="{{asset('/frontend/products/034.jpg')}}" alt="alt" /></div>
                                        @endforeach
                                        @else 
                                        <div class="slide"><img src="{{asset('/frontend/img/products/034.jpg')}}" alt="alt" /></div>
                                        @endif

                                    </div>
                                    <div class="ps-gallery--image">
                                        <div class="slide">
                                            @if($product->gallery)
                                            @php 
                                                $images = json_decode($product->gallery);
                                            @endphp
                                            @foreach ($images as $item) 
                                            <div class="ps-gallery__item"><img src="{{asset('/frontend/products/001.jpg')}}" alt="alt" /></div>
                                            @endforeach
                                            @else 
                                            <div class="slide"><img src="{{asset('/frontend/img/products/034.jpg')}}" alt="alt" /></div>
                                            @endif
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-7">
                                <div class="ps-product__info">
                                    @if($product->status != 0)
                                    <div class="ps-product__badge"><span class="ps-badge ps-badge--outstock">OUT OF STOCK</span>
                                    </div>
                                    @endif
                                   
                                    <div class="ps-product__branch"><a href="#">{{$product->category->name}}</a></div>
                                    <div class="ps-product__title"><a href="#">{{$product->name}}</a></div>
                                    <div class="ps-product__desc">
                                        <ul class="ps-product__list">
                                            <li>{{$product->title}}</li>
                                        </ul>
                                    </div>
                                    <div class="ps-product__meta"><span class="ps-product__price" style="font-size:30px">{{moneyFormat($product->sale_price)}}
                                        <span class="ps-product__del">{{moneyFormat($product->price)}}</span>
                                    </div>
                                    <div class="ps-product__type">
                                        <ul class="ps-product__list">
                                            <li> <span class="ps-list__title">SKU: </span><a class="ps-list__text" href="#">{{$product->sku}}</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="ps-product__quantity">
                                        <h6>Quantity:   

                                             <button class="ps-btn--success  decrement-btn" style="width: 30px; border-radius:3px; height:30px"> - </button> 
                                             <input type="text" value="1" name="qty" id="qty" style="border: 1px solid #8c8a8a53; height:30px; width:30px; text-align:center"> 
                                             <button class="ps-btn--success  increment-btn" style="width: 30px; border-radius:3px; height:30px"> + </button>  </h6>
                                     
                                        <div class="d-md-flex align-items-center">
                                            <div class="def-number-input number-input safari_only">
                                            </div><button type="button" style="border-radius:5px" class="ps-btn ps-btn--success"  id="add2cart">Add to cart</button>
                                        </div>
                                    </div>
                                    <div class="ps-product__social">
                                        <ul class="ps-social ps-social--color">

                                        Share this Product
                                            <li><a class="ps-social__link facebook" href="#"><i class="fa fa-facebook"> </i><span class="ps-tooltip">Facebook</span></a></li>
                                            <li><a class="ps-social__link twitter" href="#"><i class="fa fa-twitter"></i><span class="ps-tooltip">Twitter</span></a></li>
                                            <li><a class="ps-social__link pinterest" href="#"><i class="fa fa-pinterest-p"></i><span class="ps-tooltip">Pinterest</span></a></li>
                                            <li class="ps-social__linkedin"><a class="ps-social__link linkedin" href="#"><i class="fa fa-linkedin"></i><span class="ps-tooltip">Linkedin</span></a></li>
                                            <li class="ps-social__reddit"><a class="ps-social__link reddit-alien" href="#"><i class="fa fa-reddit-alien"></i><span class="ps-tooltip">Reddit Alien</span></a></li>
                                            <li class="ps-social__email"><a class="ps-social__link envelope" href="#"><i class="fa fa-envelope-o"></i><span class="ps-tooltip">Email</span></a></li>
                                            <li class="ps-social__whatsapp"><a class="ps-social__link whatsapp" href="#"><i class="fa fa-whatsapp"></i><span class="ps-tooltip">WhatsApp</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product__content">
                            <ul class="nav nav-tabs ps-tab-list" id="productContentTabs" role="tablist">
                                <li class="nav-item" role="presentation"><a class="nav-link active" id="description-tab" data-toggle="tab" href="#description-content" role="tab" aria-controls="description-content" aria-selected="true">Description</a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link" id="information-tab" data-toggle="tab" href="#information-content" role="tab" aria-controls="information-content" aria-selected="false">Additional information</a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews-content" role="tab" aria-controls="reviews-content" aria-selected="false">Reviews (0)</a></li>
                            </ul>
                            <div class="tab-content" id="productContent">
                                <div class="tab-pane fade show active" id="description-content" role="tabpanel" aria-labelledby="description-tab">
                                    <div class="ps-document">
                                        <div class="row row-reverse">
                                            <div class="col-12 col-md-6"><img class="ps-thumbnail" src="img/products/pressure-tab-content.jpg" alt></div>
                                            <div class="col-12 col-md-6">
                                                <h2 class="ps-title">{{$product->name}}</h2>
                                                <div class="ps-subtitle">{{$product->title??null}}</div>
                                                <p> {!! $product->description !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="tab-pane fade" id="reviews-content" role="tabpanel" aria-labelledby="reviews-tab">
                                    <div class="ps-product__tabreview">
                                      
                                        <div class="ps-review--product">
                                            <div class="ps-review__row">
                                                <div class="ps-review__info">
                                                    <div class="ps-review__name">John M.</div>
                                                    <div class="ps-review__date">Oct 30, 2021</div>
                                                </div>
                                                <div class="ps-review__desc">
                                                    <p>Everything is perfect. I would recommend!</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ps-form--review">
                                        <div class="ps-form__title">Write a review</div>
                                        <div class="ps-form__desc">Your email address will not be published. Required fields are marked *</div>
                                        <form action="https://nouthemes.net/html/mymedi/do_action" method="post">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="ps-form__block">
                                                        <label class="ps-form__label">Your review *</label>
                                                        <textarea class="form-control ps-form__textarea" style="border-radius: 5px"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12 text-center">
                                                    <button class="btn ps-btn ps-btn--success" style="border-radius: 5px">Add Review</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="ps-product--extension">
                        <div class="ps-product__delivery">
                            <div class="ps-delivery__item"><i class="icon-wallet"></i>Very secured paymenet methods</div>
                            <div class="ps-delivery__item"><i class="icon-bag2"></i>Shipping will be calculated on checkout</div>
                            <div class="ps-delivery__item"><i class="icon-wallet"></i>Please note that price may increase due to  exchange rate, ensure updated price before making payment</div>
                        </div>
                        
                        
                    </div>
                  
        
                </div>
            </div>
        </div>
    </div>
    <section class="ps-section--latest" style="margin-top:5px">
        <div class="container" style="background: #f4f3f33f; padding:10px; border:5px solid #ede8e836">
            <p class="" style="font-size: 20px; color:#000;">Related products</p>
            <div class="ps-section__carousel">
                <div class="owl-carousel" data-owl-auto="false" data-owl-loop="true" data-owl-speed="13000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="5" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="5" data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">
               
                    @forelse ($latest as $prod)
                    <div class="ps-section__product">
                        <div class="ps-product ps-product--standard">
                            <div class="ps-product__thumbnail"><a class="ps-product__image" href="product1.html">
                                <figure><img src="{{asset('/frontend/img/products/016.jpg')}}" alt="alt" /><img src="{{asset('/frontend/img/products/021.jpg')}}" alt="alt" />
                                        {{-- <figure><img src="{{$prod->image_path}}" alt="alt" /><img src="{{$prod->image_path}}" alt="alt" /> --}}
                                    </figure>
                                </a>
                                <div class="ps-product__badge" style="right:20px; ">
                                    <div class="ps-badge ps-badge--hot" style="background: rgb(225, 136, 136); border-radius:3px; padding:0 0;">-20%</div>
                                </div>
                            </div>
                            <div class="ps-product__content">
                                <h5 class="ps-p"><a href="product1.html">{{$prod->name}}</a></h5>
                                <div class="ps-product__meta"><span class="ps-pr">{{moneyFormat($prod->sale_price)}}   <span style="font-size:15px"> <del> {{moneyFormat($prod->price)}}</del></span></span></span>
                                </div>
                                <div class="ps-product__actions ps-product__group-mobile">
                                    {{-- <div class="ps-product__cart"> <a class="ps-btn ps-btn--warning" href="#" data-toggle="modal" data-target="#popupAddcart">Add to cart</a></div> --}}
                                </div>
                               <center> <a href="{{route('users.products',[$prod->hashid, $prod->productUrl])}}" class="btn btn-success"> Add to Cart</a></center> 
                            </div>
                        
                        </div>
                    </div> 
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </section>
</div>

{{-- @if(Session::has('cartalert')) --}}
@include('users.carts.alert')
{{-- @endif --}}

@endsection

@section('script')

<script>
    $(document).ready(function() {
        var myNumberInput = $('#qty');
        var incrementBtn = $('.increment-btn');
        var decrementBtn = $('.decrement-btn');
        var addToCartButton = $('#add2cart');
        
        // var counter = $('.counter');
        incrementBtn.on('click', function() {
            myNumberInput.val(parseInt(myNumberInput.val()) + 1);
                   
        });

        decrementBtn.on('click', function() {
            var currentValue = parseInt(myNumberInput.val());
            if (currentValue > 1) {
                myNumberInput.val(currentValue - 1);
            }
          
        });
 

        addToCartButton.on('click', function() {
            cartId = {!! json_encode($product->id) !!}
            qty = $('#qty').val();
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
                $.ajax({
                    url: "{{route('carts.add','')}}"+"/"+cartId,
                    type: "get",
                    data:{ 
                        qty:qty,
                    },
                    dataType: "json",
                    success:function(response){
                        if(response){
                            $('.cartReload').html(response.qty); 
                           // $('.cartReloads').html(thousands_separators(response));
                           $('#popupAddcartV2').modal('show');
                            setTimeout(function() {
                                $('#popupAddcartV2').modal('hide');  
                            }, 5);
                        }else{
                            alert('no');
                        }
                    },
                    error: function(xhr, status,error) {
                        console.log(xhr);
                    }
                });
        });


      
    });
    function thousands_separators(num)
    {
        var num_parts = num.toString().split(".");
        num_parts[0] = num_parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        return num_parts.join(".");
    }

</script>
@endsection