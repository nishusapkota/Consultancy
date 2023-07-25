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
          Add New Blogs</h3>
        <div class="card-tools">
          <a class="btn btn-primary" href="{{route('admin.blog.index')}}">
            <i class="fas fa-arrow-circle-left mr-2"></i>
            Go Back
          </a>
        </div>
      </div>

      <div class="card-body">
        <form method="post" action="{{ route('admin.blog.store') }}" enctype="multipart/form-data">
        @if($errors->any())
            <div class="alert alert-danger">
            <button class="close" data-dismiss="alert">X</button>
              {{$errors->first()}}</div>
            @endif
          @csrf
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
            @error('title')
            <small class="form-text text-danger">
              {{ $message }}</small>
            @enderror
          </div>
          
          <div class="form-group">
            <label for="short_description">Short Description</label>
            <textarea name="short_description" id="short_description" class="form-control @error('short_description')is-invalid @enderror" rows="4">{{ old('short_description') }}</textarea>
            @error('short_description')
            <small class="form-text text-danger">
              {{ $message }}
            </small>
            @enderror
          </div>
          <div class="form-group">
            <label for="body"> Body</label>
            <textarea name="body" id="body" class="form-control @error('body')is-invalid @enderror"
                rows="4">{{ old('body') }}</textarea>
            @error('body')
                <small class="form-text text-danger">
                    {{ $message }}
                </small>
            @enderror
              </div>

              <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image"
                    class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}">
                @error('image')
                    <small class="form-text text-danger">
                        {{ $message }}</small>
                @enderror
            </div>
          <div class="form-group">
            <label for="extra">Extra</label>
            <textarea name="extra" id="extra" class="form-control @error('extra')is-invalid @enderror" rows="4">{{ old('extra') }}</textarea>
            @error('extra')
            <small class="form-text text-danger">
              {{ $message }}
            </small>
            @enderror
          </div>

          <div class="form-group">
          <label for="status">Status</label>
            <div class="form-check">
              <input type="checkbox" name="status" id="status" value="1" class="form-check-input">
              <label class="form-check-label" for="status">Active</label>
            </div>
          </div>

          <button class="btn btn-primary">
            <i class="fas fa-save mr-2"></i>
            Save
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