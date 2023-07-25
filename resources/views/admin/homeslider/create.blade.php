@extends('admin.layout')
@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header bg-secondary">
        <h3 class="card-title" style="font-size:1.3rem;line-height:1.8;
        font-weight:bold">
          Add New slider</h3>
        <div class="card-tools">
          <a class="btn btn-primary" href="{{route('admin.home.index')}}">
            <i class="fas fa-arrow-circle-left mr-2"></i>
            Go Back
          </a>
        </div>
      </div>

      <div class="card-body">
        <form method="post" action="{{ route('admin.home.store') }}" enctype="multipart/form-data">
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
            <label for="sub_heading"> Sub Heading</label>
            <input type="text" name="sub_heading" id="sub_heading" class="form-control @error('sub_heading')is-invalid @enderror" value="{{ old('sub_heading') }}">
            @error('sub_heading')
            <small class="form-text text-danger">
              {{ $message }}
            </small>
            @enderror
          </div>
          <div class="form-group">
            <label for="description"> Description</label>
            <textarea name="description" id="description" class="form-control @error('description')is-invalid @enderror" rows="4">{{ old('description') }}</textarea>
            @error('description')
            <small class="form-text text-danger">
              {{ $message }}
            </small>
            @enderror
          </div>

          <div class="form-group">
            <label for="file">File</label>
            <input type="file" name="file" id="file" class="form-control @error('file') is-invalid @enderror" value="{{ old('file') }}">
            <small class="form-text text-muted">Recommended file formats: png,jpg,jpeg,mp4,mov,mkv,</small>
            @error('file')
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