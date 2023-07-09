@extends('admin.layout')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-secondary">
                <h3 class="card-title" style="font-size:1.3rem;line-height:1.8;
        font-weight:bold">
                    Edit Level</h3>
                <div class="card-tools">
                    <a class="btn btn-primary" href="{{route('admin.level.index')}}">
                        <i class="fas fa-arrow-circle-left mr-2"></i>
                        Go Back
                    </a>
                </div>
            </div>

            <div class="card-body">
    <form method="post" action="{{ route('admin.level.update', $level) }}">
        @if($errors->any())
        <div class="alert alert-danger">
            <button class="close" data-dismiss="alert">X</button>
            {{$errors->first()}}
        </div>
        @endif
        @csrf
        @method('PUT') <!-- Add the method spoofing for the update request -->

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $level->name }}">
            @error('name')
            <small class="form-text text-danger">
                {{ $message }}
            </small>
            @enderror
        </div>

        <div class="form-group">
            <label for="course_id">Course</label>
            {{-- @dd($course-universities) --}}
            <div class="row d-flex mt-100">
                <div class="col-md-6">
                    <select id="choices-multiple-remove-button" name="course_id[]" placeholder="Select course" multiple>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}" 
  
                              @foreach ($level->courses as $item)
                              {{-- @dd($item->id===$university->id) --}}
                                  @if ($item->id===$course->id)
                                  selected
                                  @endif
                              @endforeach
                              
                              >
                                {{ $course->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
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
                <input type="checkbox" name="status" id="status" value="1" class="form-check-input" {{ $level->status ? 'checked' : '' }}>
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