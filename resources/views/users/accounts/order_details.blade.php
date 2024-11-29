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
                <div class="col-12 col-md-7 col-lg-8 mt-5" style="background: #fff; border-radius: 5px" id="pdfContent">
                    <div class="row">
                        
                       
                        <span class="pt-5 pl-5"> <a href="#" onclick="history.back()"> {{_('<< Order Details ')}} </a>   &nbsp;  &nbsp; &nbsp;  <button  id="downloadBtn" class="btn btn-outline-info" style=" left:50px"> Download Receipt</button>   </span>  <hr style="width:100%"> </span>
                        
                        <div class="col-12 col-md-12 "  id="userDetails"  hidden>
                            <span style="float:right; padding-right: 20px">
                                <img src="{{asset('images/'.$settings->site_logo)}}" width="100px" >
                            </span>
                           

                            <p class=" pl-3" style="color:#050505"> 
                                First Name: {{auth_user()->first_name}} <br>
                              Last Name: {{auth_user()->last_name}}<br>
                              Email: {{auth_user()->email}}</p>
                    <hr>
                        </div>
                       
                           <div class="col-12 col-md-12 "  >
                            <p class="pl-3" style="color:#414040"> Order No: {{$orders->order_no}} <br>
                             Placed On: {{$orders->created_at}}<br>
                             Total Amount: {{moneyFormat($orders->payable)}}</p>  
                          </div>
                     
                       <span class="pt-5 pl-5"> Items in Your Order    </span> 
                        @forelse($order_items as $order)
                        <div class="col-12 col-md-12 " >
                            <div class="ps-product ps-product--list" style="border:2px solid #d1d5dad4; border-radius:10px; margin-top:15px">
                                <div class="ps-product__content" style="border-right:0px">
                                    <div class="ps-product__thumbnil" style="">
                                        <a class="ps-product__image" href="#">
                                            <figure><img src="{{asset('/images/products/'.$order->image)}}" style="width: 100px" alt="{{asset('/images/products/'.$order->image)}}">
                                            </figure>
                                        </a>
                                    </div>
                                    <div class="ps-product__info">
                                        <p class="ps-product__tite" style="font-size:16px; color:#1e1b1b">
                                            <a class="ps-product__branch" href="#">{{isset($order->product_name)?$order->product_name:null}}</a><br>
                                            <a style="color:#201c1c">Order: {{isset($order->Order_no)?$order->Order_no:null}}</a><br>
                                            <a style="color:#1c1818">QTY:  {{isset($order->qty)?$order->qty:null}}</a><br>
                                            {{isset($order->payable)?moneyFormat($order->payable,2):null}}
                                            {{isset($order->channel)?$order->channel:null}}
                                        </p>
                                    </div>
                                </div>

                                    
                                
                                {{-- <div class="ps-product__footer" >
                                    <div class="d-none  d-xl-block ">
                                    <span style=" float:right; color:rgb(10, 10, 128)"><a href=""  class="btn btn-info btn-lg" style="" > BUY AGAIN</a></span> </div>
                                </div> --}}
                                
                            </div>
                        </div>
                        @empty 
                        @endforelse
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="ps-categogy--list">
                                <div class="ps-product ps-product--list"
                                    style="border:2px solid #d1d5dad4; border-radius:10px">
                                    <div class="ps-product__conent" style="border-right:0px">
                                        <div class="ps-product__info"><a class="ps-product__branch" href="#"></a>
                                            <p class="ps-product__tite " style="font-size:16px; color:#262525"><a></a>

                                                Payment Information
                                            </p>
                                            <hr>
                                            <div class="ps-product__meta">
                                                <span class="ps-product__price"
                                                    style="font-size:15px; "> Payment Method: {{$orders->payment_method}} </span>
                                            </div>
                                            <ul class="ps-product__list"> Payment Details
                                                <li> <span class="ps-list__title"> </span> Items Total: {{isset($orders->payable)?moneyFormat($orders->payable):moneyFormat('0')}} 
                                                </li>
                                                <li> <span class="ps-list__title"> </span>Delivery Fee: {{isset($delivery->fee)?moneyFormat($delivery->fee):moneyFormat('0')}}
                                            </li>
                                                <li> <span class="ps-list__title"> </span>Payment Ref: {{isset($order->payment_ref)?$order->payment_ref:null}}
                                            </li>
                                            </ul>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="ps-categogy--list">
                                <div class="ps-product ps-product--list"
                                style="border:2px solid #d1d5dad4; border-radius:10px">
                                <div class="ps-product__conent" style="border-right:0px">
                                    <div class="ps-product__info"><a class="ps-product__branch" href="#"></a>
                                        <p class="ps-product__tite " style="font-size:16px; color:#262525"><a></a>

                              Shipping Information 
                                            
                                        </p>
                                        <hr>
                                        <div class="ps-product__meta">
                                            <span class="ps-product__price"
                                                style="font-size:15px; "> Delivery Method: {{$orders->shipping_method == 'home_delivery' ? "Home delivery":"Pick-up Delivery"}} </span>
                                        </div>
                                        <ul class="ps-product__list">
                                            <li> <span class="ps-list__title"> {{isset($shipping->name)?$shipping->name:''}}</span>
                                            </li>
                                            <li> <span class="ps-list__title"> {{isset($shipping->phone)?$shipping->phone:''}}</span>
                                            </li>
                                            <li> <span class="ps-list__title"> {{isset($shipping->address)?$shipping->address:''}}</span>
                                            </li>
                                            <li> <span class="ps-list__title"> {{$shipping->city.','.$shipping->city.','.$shipping->state.','.$shipping->country}}</span>
                                            </li>
                                            <li> <span class="ps-list__title"> </span>
                                                 
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
    </div>
</div>
<div style="height: 2em; background:#eee"></div>

@endsection

@section('script')

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
       
       <script>

        let orderNo = {!! json_encode($orders->order_no) !!}
    window.jsPDF = window.jspdf.jsPDF;
            window.html2canvas = html2canvas;
            let downloadBtn = document.getElementById('downloadBtn');
            downloadBtn.addEventListener("click", createPdf);

            function createPdf() {
                $('#userDetails').attr('hidden', false);
                html2canvas(document.getElementById('pdfContent')).then(canvas => {
                    let source = $('#pdfContent')[0];
                    const doc = new jsPDF({
                        unit: "pt",
                        orientation: 'portrait'
                    });

                    let margins = {
                        top: 50,
                        bottom: 50,
                        left: 50,
                        width: 500
                    }

                    let specialElementHandlers = {
                        '#hasCharr': function(element, renderer) {
                            return true;
                        }
                    };

                    doc.setFont('Poppins-Bold', 'bold');
                    doc.html(source, {
                        x: margins.left,
                        y: margins.top,
                        width: margins.width,
                        windowWidth: 900,
                        elementHandlers: specialElementHandlers,
                        callback: function() {
                            doc.save(orderNo, margins)
                        }
                    });
                });

            }
            setTimeout(() => {
           
                //  $('#userDetails').attr('hidden', true); 
                 document.getElementById('userDetails').hidden = true
               
            }, 5000);
           
</script>
@endsection
