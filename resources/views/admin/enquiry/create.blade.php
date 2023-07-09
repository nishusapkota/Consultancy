@extends('admin.layout')
@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header bg-secondary">
        <h3 class="card-title" style="font-size:1.3rem;line-height:1.8;
        font-weight:bold">
          Add New Enquiry</h3>
        <div class="card-tools">
          <a class="btn btn-primary" href="{{route('admin.student-enquiry.index')}}">
            <i class="fas fa-arrow-circle-left mr-2"></i>
            Go Back
          </a>
        </div>
      </div>

      <div class="card-body">
        <form method="post" action="{{ route('admin.student-enquiry.store') }}">
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
            <label for="contact">Contact</label>
            <input type="text" name="contact" id="contact" class="form-control @error('contact') is-invalid @enderror" value="{{ old('contact') }}">
            @error('contact')
            <small class="form-text text-danger">
              {{ $message }}</small>
            @enderror
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
            @error('email')
            <small class="form-text text-danger">
              {{ $message }}</small>
            @enderror
          </div>
          <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}">
            @error('address')
            <small class="form-text text-danger">
              {{ $message }}</small>
            @enderror
          </div>

          <div class="form-group">
            <label for="course_id">Course</label>
            <select name="course_id" class="form-control">
                <option>select Course-------</option>
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
          <label for="level_id">Level</label>
          <select name="level_id" class="form-control">
              <option>select Level-------</option>
              @foreach ($levels as $level)
                  <option value="{{ $level->id }}">{{ $level->name }}</option>
              @endforeach
          </select>
      </div>
      <div class="form-group">
        <label for="university_id">University</label>
        <select name="university_id" class="form-control">
            <option>select Level-------</option>
            @foreach ($universities as $university)
                <option value="{{ $university->id }}">{{ $university->uname }}</option>
            @endforeach
        </select>
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