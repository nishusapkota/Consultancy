@extends('university.layout.master')
@push('style')
    <style>
        .ck-content {
            height: 500px;
        }
    </style>
@endpush
{{-- @dd($university->email) --}}

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-secondary">
                    <h3 class="card-title" style="font-size:1.3rem;line-height:1.8;font-weight:bold">
                        Edit Request University Detail</h3>
                   
                </div>
              
                <div class="card-body">
                    <form method="post" action="{{route('university.uni-request.update',$uid)}}"
                        enctype="multipart/form-data">
                        @method('POST')
                        @if (session('success'))
                        <div class="alert alert-success">
                            <button class="close" data-dismiss="alert">X</button>
                            {{session('success')}}
                        </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <button class="close" data-dismiss="alert">X</button>
                                {{ $errors->first() }}
                            </div>
                        @endif
                        @csrf
                       

                        <div class="form-group">
                            <label for="uname">University Name</label>
                            <input type="text" name="uname" id="uname"
                                class="form-control @error('uname') is-invalid @enderror"
                                 @if($university)
                                 value="{{$university->uname}}"
                                 @endif>
                            @error('uname')
                           
                                <small class="form-text text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" id="address"
                                class="form-control @error('address') is-invalid @enderror" @if($university)
                                value="{{ $university->address}}"
                                @endif>

                             
                            @error('address')
                                <small class="form-text text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="image">Image</label>
                            @if($university)
                             <div style="width: 100px; height: 100px; overflow: hidden;">
                                <img src="{{ asset($university->image) }}" alt="University Image"
                                    style="width: 100%; height: auto; object-fit: cover;"> 
                            </div>
                            @endif
                            <input type="file" name="image" id="image"
                                class="form-control @error('image') is-invalid @enderror">
                            @error('image')
                                <small class="form-text text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email"
                                class="form-control @error('email') is-invalid @enderror" 
                                @if($university)
                                value="{{ $university->email}}"
                                @endif>
                               
                            @error('email')
                                <small class="form-text text-danger">
                                    {{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="details">Details</label>
                            <textarea name="details" id="details" class="form-control @error('details') is-invalid @enderror" rows="4">@if($university){!! $university->details !!}@endif</textarea>
                            @error('details')
                                <small class="form-text text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                  
                        <button class="btn btn-primary">
                            <i class="fas fa-save mr-2"></i>
                            Request University Detail
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        ClassicEditor
            .create(document.querySelector('#details'))
            .catch(error => {
                console.error(error);
            }); // Increase the number of rows
        var textareaElement = document.querySelector('#details');
        textareaElement.setAttribute('rows', '300');
    </script>
@endsection
