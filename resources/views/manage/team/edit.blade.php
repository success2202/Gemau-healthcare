@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">
<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>

<form action="{{route('team.update',$team->hashid)}}" method="post" enctype="multipart/form-data">
  @csrf
  @method('put')
 <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
              <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Edit Team</h6>
                            <div class="row"> 
                                <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="name"  value="{{$team->name}}" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1"
                                                   aria-describedby="emailHelp" placeholder="Team name">
                                            <small id="emailHelp" class="form-text text-muted">Team Name e.g Calender, Envelope
                                            </small>
                                            @error('name')
                                            <span class="invalid-feedback"> <small> * </small> </span>
                                            @enderror
                                        </div>
                                    </div>
                                        <div class="col-md-6 col-12">
                                        <div class="form-group">
                                           <input type="text" name="title"  value="{{$team->title}}"class="form-control @error('title') is-invalid @enderror" id="exampleInput"
                                                   aria-describedby="EventLocation" placeholder="Product Cost Price">
                                            <small id="emailHelp" class="form-text text-muted">Title
                                            </small>
                                            @error('title')
                                            <span class="invalid-feedback"> <small> {{$message}} </small> </span>
                                            @enderror
                                        </div>
                                         </div>

                                    </div>           
                                  </div>

                                
                                    <div class="col-md-12">
                                  <div class="form-group">
                                    
                                    <textarea id="summernote" name="description"> {{$team->description}}</textarea>
                                     <small id="emailHelp" class="form-text text-muted">Team Description
                                            </small>
                                            @error('description')
                                            <span class="invalid-feedback"> <small> *</small> </span>
                                            @enderror
                                    </div>


                               </div>

                                <div class="col-md-12">
                                  <div class="custom-file">
                                      <img src="{{asset('images/team/'.$team->image)}}" alt="" width="100px" height="100px"> 
                                        <input type="file"name="image" class="custom-file-input  @error('image') is-invalid @enderror" id="customFile">
                                                <label class="custom-file-label" for="customFile">Choose Cover Image</label>
                                            </div>
                                            <small id="emailHelp" class="form-text text-muted"> Choose a cover image for design sample
                                            </small>
                                              @error('image')
                                            <span class="invalid-feedback"> <small> *</small> </span>
                                            @enderror
                                            <!--<img src="{{asset('images/team/'.$team->image)}}" width="100px" height="100px"> -->
                                      
                                         </div>
                                        
                                            
                            </div> 

                        </div>
                         
                    </div>
                         <div class="card">
                        <div class="card-body">
                        <div class="row">
                          <div class="col-md-4">
                        <div class="p-5">
                             <button type="submit" class="btn btn-primary w-100 p-3">Update Team</button>
                           </div>
                           </div>
                           </div>
                        </div>
                        </div>

                    </div>
                 
                  </form>
                   

@endsection
@section('script')
<script>



$('.clockpicker-example').clockpicker({
    autoclose: true
});

$('input[name="date"]').daterangepicker({
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