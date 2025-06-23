@extends('layouts.admin')
@section('content')

        <!-- begin::page-header -->
 <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <form action="{{route('testimonial.store')}}" method="post" enctype="multipart/form-data">
                  
              @csrf
              <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Add New Testimonial</h6>
                            <div class="row">
                               
                                     <div class="col-md-6">
                                       <div class="form-group">
                                      <input type="text" name="name" placeholder=" Name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" >
                                            <small id="emailHelp" class="form-text text-muted">Enter Name
                                            </small>
                                            @error('name')
                                            <span class="invalid-feedback"> <small> * </small> </span>
                                            @enderror
                                        </div>
                                         </div>
                                         <div class="col-md-6">
                                          <div class="custom-file">
                                                    <input type="file"name="image" class="custom-file-input  @error('image') is-invalid @enderror" id="customFile">
                                                        <label class="custom-file-label" for="customFile">Choose Image</label>
                                                    </div>
                                                    <small id="emailHelp" class="form-text text-muted">Upload Testimonial Image
                                                    </small>
                                                      @error('image')
                                                    <span class="invalid-feedback"> <small> *</small> </span>
                                                    @enderror
                                                 </div>   

                                         <div class="col-md-6">
                                          <div class="form-group">
                                         <input type="text" name="title" placeholder="title" value="{{old('title')}}" class="form-control @error('title') is-invalid @enderror" >
                                               <small id="emailHelp" class="form-text text-muted">Enter title 
                                               </small>
                                               @error('title')
                                               <span class="invalid-feedback"> <small> * </small> </span>
                                               @enderror
                                           </div>
                                            </div>
                                             <div class="text-muted d-flex justify-content-between">
                                            <div class="text-truncate small"></div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <textarea name="content" id="summernote" class="@error('content') is-invalid @enderror" name="content"></textarea>
                                           
                                                    <small id="emailHelp" class="form-text text-muted">Testimonial
                                                    </small>
                                                    @error('content')
                                                    <span class="invalid-feedback"> <small> * </small> </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                              
                            </div> 
                        </div>
                         
                    </div>
                         <div class="card">
                        <div class="card-body">
                        <div class="row">
                          <div class="col-md-4">
                          </div>
                          <div class="col-md-4">
                        <div class="p-5">
                             <button type="submit" class="text-center btn btn-primary w-100 p-3 ">Add New Testimonial</button>
                           </div>
                           </div>
                           </div>
                        </div>
                        </div>
                      </form>

    </div>
                        </div>
                    </div>
                   

@endsection
@section('script')
<script>

$('.clockpicker-example').clockpicker({
    autoclose: true
});

$('input[name="audition_date"]').daterangepicker({
  singleDatePicker: true,
  showDropdowns: true
});

let message = {!! json_encode(Session::get('message')) !!};
let msg = {!! json_encode(Session::get('alert')) !!};
//alert(msg);
toastr.options = {
        timeOut: 3000,
        progressBar: true,
        showMethod: "slideDown",
        hideMethod: "slideUp",
        showDuration: 200,
        hideDuration: 200
    };
if(message != null && msg == 'success'){
toastr.success(message);
}else if(message != null && msg == 'error'){
    toastr.error(message);
}
</script>
@endsection