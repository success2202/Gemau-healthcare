@extends('layouts.admin')
@section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
 
                <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h2 class="font-weight-bold mb-2">{{$bookappoint}}</h2>
                                    <div>Total Appointments</div>
                                </div> 
                                <div>
                                    <span class="dashboard-pie-1">{{$bookappoint}}/100</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h2 class="font-weight-bold mb-2">{{$order}}</h2>
                                    <div>Number of Orders</div>
                                </div>
                                <div>
                                    <span class="dashboard-pie-2">{{$order}}/100</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h2 class="font-weight-bold mb-2">{{$users}}</h2>
                                    <div>Registered Users</div>
                                </div>
                                <div>
                                    <span class="dashboard-pie-3">{{$users}}/100</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h2 class="font-weight-bold mb-2">{{moneyFormat($sales)}}</h2>
                                    <div>Total Orders </div>
                                </div>
                                <div>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h6 class="card-title">Recent Orders</h6>
                                <div>
                                    <a href="#" class="mr-3">
                                        <i class="fa fa-refresh"></i>
                                    </a>
                                    <div class="dropdown">
                                        <a href="#" data-toggle="dropdown" aria-haspopup="true"
                                           aria-expanded="false">
                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item">Report</a>
                                            <a href="#" class="dropdown-item">Download</a>
                                            <a href="#" class="dropdown-item">Close</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                 <div class="table-responsive">
                                        <table id="myTable" class="table table-striped table-bordered">
                                           <thead>
                                            <tr>
                                                <th>Client Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                  <th>Service</th>
                                                  <th>Message</th>
                                                <th>Clinic</th>
                                                <th>Doctor</th>
                                                <th>Status</th>
                                                
                                                <th>Date</th>
                                                 {{-- <th>Time</th> --}}
                                                 <th>Action</th>
                                                 
                                            </thead>
                                            <tbody>
                                        @forelse ($bookappoints as  $sp)
                                        
                                            <tr>
                                                <td>
                                                    <a href="#">{{($sp->name)}}..</a>
                                                </td> 
                                                <td>
                                                    <a href="#">{{$sp->email}}</a>
                                                </td>
                                                <td>
                                                    <a href="#">{{$sp->phone}}</a>
                                                </td>
                                                <td>
                                                    <a href="#">{{$sp->service}}</a>
                                                </td>
                                                <td>
                                                    <a href="#">{{$sp->message}}</a>
                                                </td>
                                                 <td>
                                                    <a href="#">{{$sp->clinics}}</a>
                                                </td>
                                                <td>
                                                    <a href="#">{{$sp->doctors}}</a>
                                                </td>   
                                                <td>
                                                    <a href="#" style="color:green"><strong>{{$sp->approve}} </strong></a>
                                                </td> 
                                               

                                                  {{-- <td>
                                                    <a href="#">{{$sp->appointment_date}}</a>
                                                </td> --}}
                                               
                                               <td>  {{ \Carbon\Carbon::now()->format('Y-m-d H:i:s') }}</td>
                                            
                                                        
                                                <td class="text-right">
                                                    <div class="dropdown">
                                                        <a href="#" data-toggle="dropdown">
                                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                         @if($sp->approve)
                                                            <span class="dropdown-item">Approved</span>
                                                        @else
                                                            <span class="dropdown-item">Unapproved</span>
                                                        @endif
                                                           
                                                          
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                             @empty
                                             <tr>
                                                <td> No data available </td>
                                                </tr>
                                             @endforelse
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
@section('script')
<script>
    $(function () {
        $('.slick-js').slick({
            speed: 500,
            arrows: false,
            slidesToShow: 5,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
    })
</script>
@endsection
