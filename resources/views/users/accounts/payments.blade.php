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
                        <span class="pt-5 pl-5"> <a href="#" onclick="history.back()"> {{_('<< back ')}} </a> <hr style="width:100%"></span>
                        <div class="col-12 col-md-12" >
                            <span style="float:right">  <a href="{{route('users.address.create')}}" class="btn btn-primary "> Add New Address</a></span> 
                       </div>
                       <div class="ps-shopping__table">
                        <table class="table ps-table ps-table--product">
                            <thead>
                                <tr>
                                    <th class="ps-product__remove"></th>
                                    <th class="ps-product__thumbnail"></th>
                                    <th class="ps-product__name">Product name</th>
                                    <th class="ps-product__meta">Unit price</th>
                                    <th class="ps-product__quantity">Quantity</th>
                                    <th class="ps-product__subtotal">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="ps-product__remove"> <a href="#"><i class="icon-cross"></i></a></td>
                                    <td class="ps-product__thumbnail"><a class="ps-product__image" href="product1.html">
                                            <figure><img src="img/products/055.jpg" alt=""></figure>
                                        </a></td>
                                    <td class="ps-product__name"> <a href="product1.html">Somersung Sonic X2500 Pro White</a></td>
                                    <td class="ps-product__meta"> <span class="ps-product__price">$399.99</span>
                                    </td>
                                    <td class="ps-product__quantity"><span>1</span>
                                    </td>
                                    <td class="ps-product__subtotal">$399.99</td>
                                </tr>
                                <tr>
                                    <td class="ps-product__remove"> <a href="#"><i class="icon-cross"></i></a></td>
                                    <td class="ps-product__thumbnail"><a class="ps-product__image" href="product1.html">
                                            <figure><img src="img/products/001.jpg" alt=""></figure>
                                        </a></td>
                                    <td class="ps-product__name"> <a href="product1.html">Digital Thermometer X30-Pro</a></td>
                                    <td class="ps-product__meta"> <span class="ps-product__price sale">$77.65</span><span class="ps-product__del">$80.65</span>
                                    </td>
                                    <td class="ps-product__quantity">
                                        <div class="def-number-input number-input safari_only">
                                            <button class="minus" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i class="icon-minus"></i></button>
                                            <input class="quantity" min="0" name="quantity" value="1" type="number">
                                            <button class="plus" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i class="icon-plus"></i></button>
                                        </div>
                                    </td>
                                    <td class="ps-product__subtotal">$77.65</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div style="height: 2em; background:#eee"></div>

@endsection



