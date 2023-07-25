@extends('admin.layout')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-secondary">
                <h3 class="card-title" style="font-size:1.3rem;line-height:1.8;
        font-weight:bold">
                    Edit Home Slider</h3>
                <div class="card-tools">
                    <a class="btn btn-primary" href="{{route('admin.home.index')}}">
                        <i class="fas fa-arrow-circle-left mr-2"></i>
                        Go Back
                    </a>
                </div>
            </div>

            <div class="card-body">
                <form method="post" action="{{ route('admin.home.update', $slider->id) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <button class="close" data-dismiss="alert">X</button>
                        {{$errors->first()}}
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ $slider->title }}">
                        @error('title')
                        <small class="form-text text-danger">
                          {{ $message }}</small>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="sub_heading"> Sub Heading</label>
                        <input type="text" name="sub_heading" id="sub_heading" class="form-control @error('sub_heading')is-invalid @enderror" value="{{ $slider->sub_heading }}">
                        @error('sub_heading')
                        <small class="form-text text-danger">
                          {{ $message }}
                        </small>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="description"> Description</label>
                        <textarea name="description" id="description" class="form-control @error('description')is-invalid @enderror" rows="4">{{$slider->description}}</textarea>
                        @error('description')
                        <small class="form-text text-danger">
                          {{ $message }}
                        </small>
                        @enderror
                      </div>
            
                      @if (in_array($slider->extension, ['jpg', 'jpeg', 'png']))
            <div class="form-group">
              <label>Current Image</label><br>
              <img src="{{ asset($slider->file) }}" alt="Current Image" style="max-width: 200px;">
            </div>
          @elseif (in_array($slider->extension, ['mp4', 'mov', 'mkv']))
            <div class="form-group">
              <label>Current Video</label><br>
              <video width="320" height="240" controls>
                <source src="{{ asset($slider->file) }}" type="video/mp4">
                Your browser does not support the video tag.
              </video>
            </div>
          @endif

          <div class="form-group">
            <label for="file">Upload New File</label>
            <input type="file" name="file" id="file" class="form-control @error('file') is-invalid @enderror" value="{{ old('file') }}">
            <small class="form-text text-muted">Recommended file formats: png,jpg,jpeg,mp4,mov,mkv,</small>
            @error('file')
              <small class="form-text text-danger">{{ $message }}</small>
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