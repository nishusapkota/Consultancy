@extends('admin.layout')

@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header bg-secondary">
        <h3 class="card-title" style="font-size:1.3rem;line-height:1.8;font-weight:bold">
          Edit Certificate Image</h3>
        <div class="card-tools">
          <a class="btn btn-primary" href="{{route('admin.university.index_certificate',$certificate->university->id)}}">
            <i class="fas fa-arrow-circle-left mr-2"></i>
            Go Back
          </a>
        </div>
      </div>

      <div class="card-body">
        <form method="post" action="{{route('admin.university.update_certificate',$certificate->id)}}" enctype="multipart/form-data">
          @if($errors->any())
          <div class="alert alert-danger">
            <button class="close" data-dismiss="alert">X</button>
            {{ $errors->first() }}
          </div>
          @endif      
          @csrf
          
          

          
          <div style="width: 100px; height: 100px; overflow: hidden;">
            <img src="{{ asset($certificate->image) }}" alt="Certificate Image"
                style="width: 100%; height: auto; object-fit: cover;">
        </div>
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
