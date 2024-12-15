@extends('layouts.admin')
@section('content')
@section('styles')

@endsection
<div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                     <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h6 class="card-title">Manual Payments</h6>
                                <div>
                                    <a href="{{route('admin.create.payments')}}" class="btn btn-outline-info"> generate Payment Link</a>
                                    {{-- <a href="#" class="mr-3">
                                        <i class="fa fa-refresh"></i>
                                    </a> --}}
                                    <div class="dropdown">
                                        <a href="#" data-toggle="dropdown" aria-haspopup="true"
                                           aria-expanded="false">
                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                 <div class="table-responsive">
                                        <table id="myTable" class="table table-striped table-bordered">
                                           <thead>
                                            <tr>
                                                <th>User Name</th>
                                                <th>User Email</th>
                                                <th>Payment Ref</th>
                                                <th> External Ref</th>
                                                <th>Payment Currency</th>
                                                <th>Amount</th>
                                                <th>Payment Status</th>
                                                <th>Date Paid</th>
                                                <th>Order Status</th>
                                                
                                                 <th> Payment Link </th>
                                                 <th>Created At</th>
                                                 <th> &nbsp; &nbsp; &nbsp; </th>
                                            </thead>
                                            <tbody>
                                        @if(count($payments) > 0)
                                        @foreach ($payments as  $sp)
                                            <tr>
                                            <td>{{$sp->name}}</td>
                                            <td>{{$sp->email}}</td>
                                            <td>{{$sp->payment_ref??'-'}}</td>
                                            <td>{{$sp->external_ref??'-'}}</td>
                                            <td>{{$sp->currency??'-'}}</td>
                                            <td>{{number_format($sp->amount)??'-'}}</td>
                                            <td>
                                                <a href="#">@if($sp->is_delivered == 1) <span  class="badge badge-info">Initiated</span>
                                                    @elseif($sp->is_delivered == 2) <span  class="badge badge-primary">Dispatched</span>
                                                    @elseif($sp->is_delivered == 3) <span  class="badge badge-danger">Cancelled</span>
                                                    @else <span class="badge badge-light">Pending</span> @endif</a>
                                                </td>  
                                            <td>{{$sp->order_paid??'-'}}</td>
                                            <td>{{$sp->order_status??'-'}}</td>
                                              
                                                  
                                                <td> 
                                                    <div class="append">
                                                    <input href="" style="width:300px" class="form-control" value="{{$sp->payment_link}}" id="copyLink{{$sp->id}}" data-link="{{$sp->payment_link}}">
                                                </div>
                                                <td>
                                                    <a href="#">{{$sp->created_at->format('d/M/y')}}</a>
                                                </td>
                                                <td class="text-right">
                                                    <div class="dropdown">
                                                        <a href="#" data-toggle="dropdown">
                                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a href="{{route('admin.shipping', encrypt($sp->order_no))}}" class="dropdown-item">Resend Email</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <script>
                                                let link = data
                                                let = "copyLink"

                                            </script>

                                              @endforeach
                                              @else 
                                              <tr>
                                              <td> No data available </td>
                                              </tr>
                                              @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                 </div>
                  </div>

@endsection

