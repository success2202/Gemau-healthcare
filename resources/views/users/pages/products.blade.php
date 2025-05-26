@extends('layouts.app')

@section('title')
<title> {{$product[0]?->category?->name }}</title>
@endsection
@section('head')
<link rel="canonical" href="{{ url('catalogs/'.Str::slug($product[0]?->category?->name)) }}">
@endsection
@section('content')


{{-- <div class="ps-categogy ps-categogy--dark" style="background: #e8e8e8;">
    <div class="container">
        <ul class="ps-breadcrumb">
            <li class="ps-breadcrumb__item"><a href="">Home</a></li>
            <li class="ps-breadcrumb__item"><a href="">Category</a></li>
            <li class="ps-breadcrumb__item"><a href="">Products</a></li>
        </ul>
        <div class="ps-categogy__content">
            <div class="row row-reverse">
                <div class="col-12 col-md-9" style="
                background: #fff;
                padding: 10px;
                border-radius: 10px; top:-40px">
                    <div class="ps-categogy__wrapper">
                      
                        <div class="ps-categogy__onsale">
                            <form>
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="onSaleProduct" checked >
                                    <label class="custom-control-label" for="onSaleProduct">@if(isset($searchterm)) {{$searchterm}} @else Showing All Results @endif</label>
                                </div>
                            </form>
                        </div>
                        <div class="ps-categogy__sort">
                            <form><span>Sort by</span>
                                <select class="form-select">
                                    <option selected="">Latest</option>
                                    <option value="Popularity">Popularity</option>
                                </select>
                            </form>
                        </div>
                       
                    </div>
                    <div class="ps-categogy--grid">
                        <div class="row m-0">
                            @forelse ($products as $prods )
                            <div class="col-6 col-lg-4 col-xl-3 p-0">
                                <div class="ps-product ps-product--standard">
                                    <div class="ps-product__thumbnail"><a class="ps-product__image" href="{{route('users.products',[$prods->hashid, $prods->productUrl])}}">
                                            <!--<figure><img src="{{$prods->image_path}}" alt="{{$prods->image_path}}"><img src="{{$prods->image_path }}" alt="{{$prods->name }}">-->
                                                   <figure><img src="{{asset('images/products/'.$prods->image_path)}}" alt="{{$prods->name }}" /><img src="{{asset('images/products/'.$prods->image_path)}}" alt="{{$prods->name }}" /> 
                                            </figure>
                                        </a>
                                        <div class="ps-product__badge">
                                            <span class="badge badge-warning"> -{{number_format($prods->discount,0)}}%</span>
                                        </div>
                                    </div>
                                    <div class="ps-product__content">
                                        <h5 class="ps-product__tite"><a href="{{route('users.products',[$prods->hashid, $prods->productUrl])}}">{{$prods->name}}</a></h5>
                                        <div class="ps-product__meta"><span class="ps-product__price">{{moneyFormat($prods->sale_price)}}</span>
                                        <span class="ps-product__price "> <small> <del> {{moneyFormat($prods->price)}}</del> </small></span>
                                        </div>
                                    </div>
                                     <center> <a
                                                        href="{{ route('users.products', [$prods->hashid, $prods->productUrl]) }}"
                                                        class="btn  btn-lg" style="background:#fff; color:#73c2fb; border:1px solid #73c2fb; width:100px"> Add to
                                                    Cart <i class="fa fa-shopping-basket"></i></a>
                                                       <a target="_blank" rel="noopener noreferrer" href="https://wa.me/+2348058885913?text=Please i need {{ $prods->name }}, the  price on your website is {{ moneyFormat($prods->sale_price) }} ">
                                                             <i class="fa fa-whatsapp" aria-hidden="true" style="font-size:20px; border:1px solid #eee; padding:5px; color:#73c2fb "> 
                                                             </i></a> 
                                                    </center>
                                </div>
                            </div> 
                             
                            @empty
                            <div class="ps-delivery ps-delivery--info">
                                <div class="ps-delivery__content">
                                    <div class="ps-delivery__text"> <i class="icon-shield-check"></i><span> <strong>No Item found </strong></span></div>
                                </div>
                            </div>
                            @endforelse
                          
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3" style="top:-40px">
                    <div class="ps-widget ps-widget--product" style="
                    background: #fff;
                    border-radius: 10px;
                    padding: 10px 20px;">
                        <div class="ps-widget__block">
                            <h4 class="ps-widget__title">Categories</h4><a class="ps-block-control" href="#"><i class="fa fa-angle-down"></i></a>
                            <div class="ps-widget__content ps-widget__category">
                                <ul class="menu--mobile">
                                  
                                 @forelse ($categories as $cat )
                                    <li><a href="{{route('products.search',$cat->hashid)}}" style="font-size: 14px">{{substr($cat->name, 0,30)}}</a><span class="sub-toggle"><i class="fa fa-chevron-down"></i></span>
                                        <ul class="sub-menu">
                                            @foreach ($cat->products as $prod )
                                           
                                            <li><a href="{{route('users.products',[$prod->hashid, $prod->productUrl])}}">{{$prod->name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>

                                     
                                 @empty
                                     
                                 @endforelse 

                                </ul>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
  
</div> --}}



 <!-- ========================
       page title 
    =========================== -->
    <section class="page-title page-title-layout5 text-center">
        <div class="bg-img"><img src="assets/images/backgrounds/6.jpg" alt="background"></div>
        <div class="container">
          <div class="row">
            <div class="col-12">
              <h1 class="pagetitle__heading">Our Products</h1>
              <nav>
                <ol class="breadcrumb justify-content-center mb-0">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">shop</li>
                </ol>
              </nav>
            </div><!-- /.col-xl-6 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </section><!-- /.page-title -->
  
      <!-- ========================
         shop 
      =========================== -->
      <section class="shop-grid" >
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-8 col-lg-9">
              <div class="sorting-options d-flex flex-wrap justify-content-between align-items-center mb-30">
                
                <select>
                  <option selected="" value="0">Sort by latest</option>
                  <option value="1">Sort by Popular</option>
                  <option value="2">Sort by highest Price </option>
                  <option value="3">Sort by lowest Price </option>
                </select>
              </div>
              <div class="row">
                <!-- Product item #1 -->
                @forelse ($product as $prod)
                <div class="col-sm-6 col-md-6 col-lg-4">
                  <div class="product-item">
                    <div class="product__img">
                      <img src="{{asset('frontend/images/blog/grid/Picture1.png')}}" alt="Product" loading="lazy">
                      <div class="product__action">
                        <a href="#" class="btn btn__primary btn__rounded">
                          <i class="icon-cart"></i> <span>Add To Cart</span>
                        </a>
                      </div><!-- /.product-action -->
                    </div><!-- /.product-img -->
                    <div class="product__info">
                      <h4 class="product__title"><a href="">{{ $prod->name }}</a></h4>
                      <span class="product__price">{{ $prod->price }}</span>
                    </div><!-- /.product-content -->
                  </div><!-- /.product-item -->
                </div><!-- /.col-lg-4 -->

                @empty
                    
                @endforelse
               
              </div><!-- /.row -->
              <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 text-center">
                  <nav class="pagination-area">
                    <ul class="pagination justify-content-center">
                      <li><a class="current" href="#">1</a></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                  </nav><!-- /.pagination-area -->
                </div><!-- /.col-lg-12 -->
              </div><!-- /.row -->
            </div><!-- /.col-lg-9 -->
            <div class="col-sm-12 col-md-4 col-lg-3">
              <aside class="sidebar-layout2">
                <div class="widget widget-search">
                  <h5 class="widget__title">Search</h5>
                  <div class="widget__content">
                    <form class="widget__form-search">
                      <input type="text" class="form-control" placeholder="Search...">
                      <button class="btn" type="submit"><i class="icon-search"></i></button>
                    </form>
                  </div><!-- /.widget-content -->
                </div><!-- /.widget-search -->
                <div class="widget widget-poducts">
                  <h5 class="widget__title">Best Sellers</h5>
                  <div class="widget__content">
                    <!-- product item #1 -->
                    <div class="widget-product-item d-flex align-items-center">
                      <div class="widget-product__img">
                        <a href="#"><img src="{{ asset('frontend/images/products/11.jpg') }}" alt="Product" loading="lazy"></a>
                      </div><!-- /.product-product-img -->
                      <div class="widget-product__content">
                        <h5 class="widget-product__title"><a href="#">Calming Herps</a></h5>
                        <span class="widget-product__price">$ 38.00</span>
                      </div><!-- /.widget-product-content -->
                    </div><!-- /.widget-product-item -->
                    <!-- product item #2 -->
                    <div class="widget-product-item d-flex align-items-center">
                      <div class="widget-product__img">
                        <a href="#"><img src="{{ asset('frontend/images/products/10.jpg') }}" alt="Product" loading="lazy"></a>
                      </div><!-- /.product-product-img -->
                      <div class="widget-product__content">
                        <h5 class="widget-product__title"><a href="#">Goji Powder</a></h5>
                        <span class="widget-product__price">$ 33.00</span>
                      </div><!-- /.widget-product-content -->
                    </div><!-- /.widget-product-item -->
                    <!-- product item #3 -->
                    <div class="widget-product-item d-flex align-items-center">
                      <div class="widget-product__img">
                        <a href="#"><img src="{{ asset('frontend/images/products/12.jpg') }}" alt="Product" loading="lazy"></a>
                      </div><!-- /.product-product-img -->
                      <div class="widget-product__content">
                        <h5 class="widget-product__title"><a href="#">Biotin Complex</a></h5>
                        <span class="widget-product__price">$ 18.00</span>
                      </div><!-- /.widget-product-content -->
                    </div><!-- /.widget-product-item -->
                  </div><!-- /.widget-content -->
                </div><!-- /.widget-poducts -->
                <div class="widget widget-categories">
                  <h5 class="widget__title">Categories</h5>
                  <div class="widget-content">
                    <ul class="list-unstyled mb-0">
                      <li><a href="#"><span class="cat-count">4</span><span>Neurology</span></a></li>
                      <li><a href="#"><span class="cat-count">0</span><span>Cardiology</span></a></li>
                      <li><a href="#"><span class="cat-count">3</span><span>Pathology</span></a></li>
                      <li><a href="#"><span class="cat-count">2</span><span>Laboratory</span></a></li>
                      <li><a href="#"><span class="cat-count">4</span><span>Pediatric</span></a></li>
                      <li><a href="#"><span class="cat-count">1</span><span>Cardiac Clinic</span></a></li>
                    </ul>
                  </div><!-- /.widget-content -->
                </div><!-- /.widget-categories -->
                <div class="widget widget-filter">
                  <h5 class="widget__title">Pricing Filter</h5>
                  <div class="widget__content">
                    <div id="rangeSlider"></div>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="price-output d-flex align-items-center">
                        <label for="rangeSliderResult">Price: </label>
                        <input type="text" id="rangeSliderResult" readonly>
                      </div>
                      <button class="btn__filter">Filter</button>
                    </div>
                  </div><!-- /.widget-content -->
                </div><!-- /.widget-filter -->
                <div class="widget widget-tags">
                  <h5 class="widget__title">Tags</h5>
                  <div class="widget-content">
                    <ul class="list-unstyled">
                      <li><a href="#">Responsive</a></li>
                      <li><a href="#">Fresh</a></li>
                      <li><a href="#">Modern</a></li>
                      <li><a href="#">Corporate</a></li>
                      <li><a href="#">Business</a></li>
                    </ul>
                  </div><!-- /.widget-content -->
                </div><!-- /.widget-Tags -->
              </aside><!-- /.sidebar -->
            </div><!-- /.col-lg-3 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </section><!-- /.shop -->
      
@endsection