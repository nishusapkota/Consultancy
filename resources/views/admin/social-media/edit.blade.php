@extends('admin.layout')
@push('style')
    <style>
        .ck-content{
            height: 500px;
        }
    </style>
@endpush
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-secondary">
                <h3 class="card-title" style="font-size:1.3rem;line-height:1.8;
        font-weight:bold">
                    Edit social_media</h3>
                <div class="card-tools">
                    <a class="btn btn-primary" href="{{route('admin.social-media.index')}}">
                        <i class="fas fa-arrow-circle-left mr-2"></i>
                        Go Back
                    </a>
                </div>
            </div>

            <div class="card-body">
                
                <form method="post" action="{{ route('admin.social-media.update', $socialmedia->id) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <button class="close" data-dismiss="alert">X</button>
                        {{$errors->first()}}
                    </div>
                    @endif

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $socialmedia->name }}">
                        @error('name')
                        <small class="form-text text-danger">
                            {{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="link">Link</label>
                        <input type="text" name="link" id="link" class="form-control @error('link') is-invalid @enderror" value="{{ $socialmedia->link }}">
                        @error('link')
                        <small class="form-text text-danger">
                            {{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <div class="form-check">
                            <input type="checkbox" name="status" id="status" value="1" class="form-check-input" {{$socialmedia->status =='1' ? 'checked' : ''}}>
                            <label class="form-check-label" for="status">Available</label>
                        </div>
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