@extends('admin.layout')

@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header bg-secondary">
        <h3 class="card-title" style="font-size:1.3rem;line-height:1.8;font-weight:bold">
          Edit University Image</h3>
        <div class="card-tools">
          <a class="btn btn-primary" href="{{route('admin.university.index_image',$uni_image->university->id)}}">
            <i class="fas fa-arrow-circle-left mr-2"></i>
            Go Back
          </a>
        </div>
      </div>

      <div class="card-body">
        <form method="post" action="{{route('admin.university.update_image',$uni_image->id)}}" enctype="multipart/form-data">
          @if($errors->any())
          <div class="alert alert-danger">
            <button class="close" data-dismiss="alert">X</button>
            {{ $errors->first() }}
          </div>
          @endif      
          @csrf
          
          

          
          @if (in_array($uni_image->ext, ['jpg', 'jpeg', 'png']))
            <div class="form-group">
              <label>Current Image</label><br>
              <img src="{{ asset($uni_image->image) }}" alt="Current Image" style="max-width: 200px;">
            </div>
          @elseif (in_array($uni_image->ext, ['mp4', 'mov', 'mkv']))
            <div class="form-group">
              <label>Current Video</label><br>
              <video width="320" height="240" controls>
                <source src="{{ asset($uni_image->image) }}" type="video/mp4">
                Your browser does not support the video tag.
              </video>
            </div>
          @endif
          <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
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
