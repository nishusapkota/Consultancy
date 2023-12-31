@extends('admin.layout')
@section('content')
<section class="content">
    <div class="container-fluid">
        @if (session('success'))
                <div class="alert alert-success">
                    <button class="close" data-dismiss="alert">X</button>
                    {{session('success')}}
                </div>
                @endif
        <div class="card">
            {{-- <div class="card-header bg-secondary">
                <h3 class="card-title" style="font-size:1.3rem;line-height:1.8;
        font-weight:bold">
                    Edit contact</h3>
                <div class="card-tools">
                    <a class="btn btn-primary" href="{{route('admin.contact.index')}}">
                        <i class="fas fa-arrow-circle-left mr-2"></i>
                        Go Back
                    </a>
                </div>
            </div> --}}

            <div class="card-body">
                <form method="post" action="{{ route('admin.contact.update') }}" enctype="multipart/form-data">
                    @csrf
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <button class="close" data-dismiss="alert">X</button>
                        {{$errors->first()}}
                    </div>
                    @endif
                    <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ $data['title'] }}">
                      @error('title')
                      <small class="form-text text-danger">
                        {{ $message }}</small>
                      @enderror
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" value="{{ $data['address'] }}">
                        @error('address')
                        <small class="form-text text-danger">
                          {{ $message }}</small>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="email_primary">Email1</label>
                        <input type="text" name="email_primary" id="email_primary" class="form-control @error('email_primary') is-invalid @enderror" value="{{$data['email_primary'] }}">
                        @error('email_primary')
                        <small class="form-text text-danger">
                          {{ $message }}</small>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="email_secondary">Email2</label>
                        <input type="text" name="email_secondary" id="email_secondary" class="form-control @error('email_secondary') is-invalid @enderror" value="{{$data['email_secondary'] }}">
                        @error('email_secondary')
                        <small class="form-text text-danger">
                          {{ $message }}</small>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="phone_primary">Phone1</label>
                        <input type="text" name="phone_primary" id="phone_primary" class="form-control @error('phone_primary') is-invalid @enderror" value="{{$data['phone_primary'] }}">
                        @error('phone_primary')
                        <small class="form-text text-danger">
                          {{ $message }}</small>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="phone_secondary">Phone1</label>
                        <input type="text" name="phone_secondary" id="phone_secondary" class="form-control @error('phone_secondary') is-invalid @enderror" value="{{$data['phone_secondary'] }}">
                        @error('phone_secondary')
                        <small class="form-text text-danger">
                          {{ $message }}</small>
                        @enderror
                      </div>
                      
                      <div class="form-group">
                        <label for="short_description">Description</label>
                        <textarea name="short_description" id="short_description" class="form-control @error('short_description')is-invalid @enderror" rows="4">{{$data['short_description']}}</textarea>
                        @error('short_description')
                        <small class="form-text text-danger">
                          {{ $message }}
                        </small>
                        @enderror
                      </div>
                    
                    
                   

                    
                    

                   

                    <button class="btn btn-primary">
                        <i class="fas fa-save mr-2"></i>
                        update
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
            .create( document.querySelector( '#body' ) )
            .catch( error => {
                console.error( error );
            } );// Increase the number of rows
var textareaElement = document.querySelector('#body');
textareaElement.setAttribute('rows', '500');
    </script>
@endsection