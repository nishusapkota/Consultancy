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
          Add New Scholarships</h3>
        <div class="card-tools">
          <a class="btn btn-primary" href="{{route('admin.scholarship.index')}}">
            <i class="fas fa-arrow-circle-left mr-2"></i>
            Go Back
          </a>
        </div>
      </div>

      <div class="card-body">
        <form method="post" action="{{ route('admin.scholarship.store') }}" enctype="multipart/form-data">
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
            <label for="description"> Description</label>
            <textarea name="description" id="description" class="form-control @error('description')is-invalid @enderror"
                rows="4"></textarea>
            @error('description')
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
            .create( document.querySelector( '#description' ) )
            .catch( error => {
                console.error( error );
            } );// Increase the number of rows
var textareaElement = document.querySelector('#description');
textareaElement.setAttribute('rows', '500');
    </script>
@endsection