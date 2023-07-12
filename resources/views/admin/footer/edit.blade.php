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
                    Edit footer</h3>
                <div class="card-tools">
                    <a class="btn btn-primary" href="{{route('admin.footer.index')}}">
                        <i class="fas fa-arrow-circle-left mr-2"></i>
                        Go Back
                    </a>
                </div>
            </div> --}}

            <div class="card-body">
                <form method="post" action="{{ route('admin.footer.update') }}" enctype="multipart/form-data">
                    @csrf
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <button class="close" data-dismiss="alert">X</button>
                        {{$errors->first()}}
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" value="{{ $data['address'] }}">
                        @error('address')
                        <small class="form-text text-danger">
                          {{ $message }}</small>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{$data['address'] }}">
                        @error('email')
                        <small class="form-text text-danger">
                          {{ $message }}</small>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{$data['address'] }}">
                        @error('phone')
                        <small class="form-text text-danger">
                          {{ $message }}</small>
                        @enderror
                      </div>
                      
                      <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control @error('description')is-invalid @enderror" rows="4">{{$data['address']}}</textarea>
                        @error('description')
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