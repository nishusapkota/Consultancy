@extends('university.layout.master')
@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header bg-secondary">
        <h3 class="card-title" style="font-size:1.3rem;line-height:1.8;
        font-weight:bold">
          Edit Requested Slider</h3>
        <div class="card-tools">
          <a class="btn btn-primary" href="{{route('university.request-certificate.index')}}">
            <i class="fas fa-arrow-circle-left mr-2"></i>
            Go Back
          </a>
        </div>
      </div>

      <div class="card-body">
        <form method="post" action="{{route('university.slider.update',$slider->id)}}" enctype="multipart/form-data">
          @if($errors->any())
          <div class="alert alert-danger">
            <button class="close" data-dismiss="alert">X</button>
            {{ $errors->first() }}
          </div>
          @endif  
          @method('PUT')  
          @csrf
          
          @if (in_array($slider->ext, ['jpg', 'jpeg', 'png']))
          <div class="form-group">
            <label>Current Image</label><br>
            <img src="{{ asset($slider->image) }}" alt="Current Image" style="max-width: 200px;">
          </div>
        @elseif (in_array($slider->ext, ['mp4', 'mov', 'mkv']))
          <div class="form-group">
            <label>Current Video</label><br>
            <video width="320" height="240" controls>
              <source src="{{ asset($slider->image) }}" type="video/mp4">
              Your browser does not support the video tag.
            </video>
          </div>
        @endif
        <div class="form-group">
          <label for="image">Image</label>
          <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
          <small class="form-text text-muted">Recommended file formats: png,jpg,jpeg,mp4,mov,mkv,</small>
          @error('image')
          <small class="form-text text-danger">
            {{ $message }}
          </small>
          @enderror
        </div>


         

          <button class="btn btn-primary">
            <i class="fas fa-save mr-2"></i>
            Update
          </button>
        </form>
      </div>
    </div>



  </div>
</section>
@endsection