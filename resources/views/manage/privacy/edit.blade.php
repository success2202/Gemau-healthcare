@extends('layouts.admin')

@section('content')
@if(Session::has('alert'))
<div class="al alert alert-{{ Session::get('alert') }}">
   <p> {{ Session::get('message') }} </p>
</div>
@endif
        <div class="container-fluid h-100">

            <div class="row app-block">
                <div class="col-md-3 app-sidebar">
                    <div class="card">
                        <div class="card-body">
                           Website Setup
                        </div>
                        <div class="app-sidebar-menu">
                            @include('manage.settings.sidebar')
                           
                        </div>
                    </div>
                </div>  
              
                <div class="col-md-9 app-content">
                  
                    <div class="app-content-overlay"></div>
                    <div class="card card-body app-content-body">
                        <div class="app-lists">
                            <form action="{{ route('admin.settings.privaprivacyUpdate', encrypt($privacypolicy->id)) }}" method="POST">
                            @csrf
                            <ul class="list-group list-group-flush">
                                
                                <li class="list-group-item"> 
                                    <div class="flex-grow-1 min-width-0">
                                        <div class="mb-1 d-flex justify-content-between align-items-center">
                                            <div class="text-truncate app-list-title">Edit Privacy and Policy </div>
                                            <div class="pl-3 d-flex">
                                                <span class="text-nowrap text-muted"></span>
                                            </div>
                                        </div>
                                        <div class="text-muted d-flex justify-content-between">
                                            <div class="text-truncate small"></div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <textarea id="summernote" class="@error('privacy_policy') is-invalid @enderror" name="content">{{ $privacypolicy->content}}</textarea>
                                           
                                                    <small id="emailHelp" class="form-text text-muted">Privacy and Policy
                                                    </small>
                                                    @error('privacy_policy')
                                                    <span class="invalid-feedback"> <small> * </small> </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                               
                             
                                <div style="float:right" class="pl-5 pt-3">

                                    <button type="submit" class="btn btn-primary w-20">Update Privacy Policy</button>
                                </div>
                             
                               
                               
                            </ul>
                        </form>
                        </div>
                       
                    </div>
                
                </div>
           
                
            </div>

        </div>





@endsection