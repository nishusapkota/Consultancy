@extends('admin.layout')
@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header bg-secondary">
        <h3 class="card-title" style="font-size:1.3rem;line-height:1.8;font-weight:bold">
          Edit University</h3>
        <div class="card-tools">
          <a class="btn btn-primary" href="{{ route('admin.university.index') }}">
            <i class="fas fa-arrow-circle-left mr-2"></i>
            Go Back
          </a>
        </div>
      </div>

      <div class="card-body">
        <form method="post" action="{{ route('admin.university.update', $university) }}" enctype="multipart/form-data">
          @if($errors->any())
          <div class="alert alert-danger">
            <button class="close" data-dismiss="alert">X</button>
            {{ $errors->first() }}
          </div>
          @endif
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $university->name }}">
            @error('name')
            <small class="form-text text-danger">
              {{ $message }}
            </small>
            @enderror
          </div>

          <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" value="{{ $university->address }}">
            @error('address')
            <small class="form-text text-danger">
              {{ $message }}
            </small>
            @enderror
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

          <div class="form-group">
            <label for="course_id">Course</label>
            <div class="checkbox-list">
              @foreach ($courses as $course)
              <div class="checkbox">
                <input type="checkbox" name="course_id[]" value="{{ $course->id }}" id="course_{{ $course->id }}" {{ in_array($course->id, $university->courses->pluck('id')->toArray()) ? 'checked' : '' }}>
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
            <label for="details">Details</label>
            <textarea name="details" id="details" class="form-control @error('details') is-invalid @enderror" rows="4">{{ $university->details }}</textarea>
            @error('details')
            <small class="form-text text-danger">
              {{ $message }}
            </small>
            @enderror
          </div>

          <div class="form-group">
            <label for="status">Status</label>
            <div class="form-check">
              <input type="checkbox" name="status" id="status" value="1" class="form-check-input" {{ $university->status ? 'checked' : '' }}>
              <label class="form-check-label" for="status">Active</label>
            </div>
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