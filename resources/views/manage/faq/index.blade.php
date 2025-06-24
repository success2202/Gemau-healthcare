@extends('layouts.admin')
@section('content')
@if(Session::has('alert'))
<div class="alert alert-{{ Session::get('alert') }}">
    {{ Session::get('message') }}
</div>
@endif
        <div class="container-fluid h-100">
            <div class="row app-block">
                <div class="col-md-3 app-sidebar">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{route('admin.settings.faq')}}" class="badge badge-info p-2"  style="color:#fff">
                                Add New FAQ
                            </a>
                        </div>
                        <div class="app-sidebar-menu">
                            @include('manage.settings.sidebar')
                        </div>
                    </div>
                </div>
              
                <div class="col-md-9">
                    <div class="card">
                        @foreach ($faqs as $item)

                        @if ($item)
                        <div class="card-body">
                          <a  href="{{route('admin.settings.EditFaq', encrypt($item->id))}}"  class=" badge badge-info "> Edit Content</a>
                          &nbsp; &nbsp;  <a  href="{{route('admin.settings.faqDelete', encrypt($item->id))}}" 
                            onclick="return confirm('Are you sure, you want to delete this content')"
                             class="badge badge-danger"> Delete Content</a>
                        </h6>
                            
                        
                            <div data-label="Privacy Policy Content Title" class="demo-code-preview">
                                {!! $item->title !!}
                            </div>
                            <div data-label="Privacy Policy Content Text" class="demo-code-preview">
                                {!! $item->content !!}
                            </div>
                            {{-- <div data-label="Slider Content Text" class="demo-code-preview">
                                {{$ss->content}}
                            </div> --}}
                            
                        </div>
                        @else
                        <p>No FAQ found.</p>
                        @endif
                         @endforeach
                    </div>
                </div>
                
            </div>

        </div>
@endsection
@section('script')
<script>
$('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.slider-nav'
});

$('.slider-nav').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    asNavFor: '.slider-for',
    centerMode: true,
    focusOnSelect: true
});
</script>
@endsection