@extends('layouts.app')

@section('content')
@section('styles')
    <style>
        .navIL {
            padding: 15px;
            padding-left: 10px
        }

        .dropdown-item:hover {
            background: rgb(219, 218, 218);
        }
    </style>
@endsection

<div class="ps-shopping" style="background: #eee; ">
    <div class="container">
        <div class="ps-shopping__content">
            <div class="row">
              @include('includes.accountSidebar')
                <div class="col-12 col-md-7 col-lg-8 mt-5" style="background: #fff; border-radius: 5px">
                    <div class="row">
                      <span class="pt-5 pl-5">  Open Orders   <hr style="width:100%">  </span>
                        @forelse($orders as $order)
                        <div class="col-12 col-md-12" >
                            <div class="ps-product ps-product--list" style="border:2px solid #d1d5dad4; border-radius:10px; margin-top:15px">
                                <div class="ps-product__content" style="border-right:0px">
                                    <div class="ps-product__thumbnail"><a class="ps-product__image" href="{{route('users.orders.details',$order->Order_no)}}">
                                            <figure><img src="{{$order->image}}" alt="alt">
                                            </figure>
                                        </a>
                                    </div>
                              
                                    <div class="ps-product__info">
                                        <p class="ps-product__tite" style="font-size:16px; color:#262525">
                                            <a class="ps-product__branch" href="{{route('users.orders.details',$order->Order_no)}}">{{$order->product_name}}</a><br>
                                            <a href="{{route('users.orders.details',$order->hashid)}}" style="color:#5e5b5b">Order: {{$order->Order_no}}</a><br>
                                            {{moneyFormat($order->payable,2)}}</span> <br>
                                            @if($order->dispatch_status == 1) <span class="badge badge-success"> delivered</span>
                                            @elseif($order->dispatch_status == 0) <span class="badge badge-info"> Awaiting Confirmation</span> 
                                            @elseif($order->dispatch_status == -1) <span class="badge badge-danger"> Cancelled</span>
                                            @elseif($order->dispatch_status == 2) <span class="badge badge-primary"> Shipped</span>
                                            @endif
                                            <br>
                                            @if($order->is_paid == 1) <span class="badge badge-success"> Paid</span>
                                            @else <span class="badge badge-warning"> Not Paid</span> @endif
                                        </p>
                                        <ul class="ps-product__list">
                                            <li> <span class="ps-list__title">Created: </span><a class="ps-list__text" href="#">{{$order->created_at}}</a>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                                <div class="ps-product__footer" >
                                    <div class="d-none  d-xl-block ">
                                    <span style=" float:right; color:rgb(10, 10, 128)"><a href="{{route('users.orders.details',$order->Order_no)}}" style="" > View Details</a></span> </div>
                                </div>
                                
                            </div>
                        </div>
                        @empty 
                        @endforelse
                        <div class="p-5" style="float: right;"> {{$orders->links()}}</div>
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
