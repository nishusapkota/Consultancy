@extends('admin.layout')
@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header bg-secondary">
        <h3 class="card-title" style="font-size:1.3rem;line-height:1.8;
        font-weight:bold">
        Update Categories</h3>
        <div class="card-tools">
          <a class="btn btn-primary" href="{{route('admin.course-category.index')}}">
            <i class="fas fa-arrow-circle-left mr-2"></i>
            Go Back
          </a>
        </div>
      </div>

      <div class="card-body">
        <form method="POST" action="{{ route('admin.course-category.update', $course_category) }}">
        @if($errors->any())
            <div class="alert alert-danger">
            <button class="close" data-dismiss="alert">X</button>
              {{$errors->first()}}</div>
            @endif
           
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="name"> Course Category</label>
            <input type="name" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $course_category->name }}">
            @error('name')
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