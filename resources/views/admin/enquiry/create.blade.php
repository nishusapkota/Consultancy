@extends('admin.layout')
@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header bg-secondary">
        <h3 class="card-title" style="font-size:1.3rem;line-height:1.8;
        font-weight:bold">
          Add New Levels</h3>
        <div class="card-tools">
          <a class="btn btn-primary" href="{{route('admin.level.index')}}">
            <i class="fas fa-arrow-circle-left mr-2"></i>
            Go Back
          </a>
        </div>
      </div>

      <div class="card-body">
        <form method="post" action="{{ route('admin.level.store') }}">
          @if($errors->any())
          <div class="alert alert-danger">
            <button class="close" data-dismiss="alert">X</button>
            {{$errors->first()}}
          </div>
          @endif
          @csrf
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
            @error('name')
            <small class="form-text text-danger">
              {{ $message }}</small>
            @enderror
          </div>

          <div class="form-group">
            <label for="course_id">Course</label>
            <div class="checkbox-list">
              @foreach ($courses as $course)
              <div class="checkbox">
                <input type="checkbox" name="course_id[]" value="{{ $course->id }}" id="course_{{ $course->id }}">
                <label for="course_{{ $course->id }}">{{ $course->name }}</label>
              </div>
              @endforeach
            </div>
            @error('course_id')
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