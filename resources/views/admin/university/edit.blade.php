@extends('admin.layout')
@push('style')
    <style>
        .ck-content{
            height: 500px;
        }
    </style>
@endpush
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
            <label for="uname">University Name</label>
            <input type="text" name="uname" id="uname" class="form-control @error('uname') is-invalid @enderror" value="{{ $university->uname }}">
            @error('uname')
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
            <label>Current Image</label><br>
            <img src="{{ asset($university->image) }}" alt="Current Image" style="max-width: 200px;">
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
            
            <div class="row d-flex mt-100">
                <div class="col-md-6">
                  
                    <select id="choices-multiple-remove-button" name="course_id[]" placeholder="Select course" multiple>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}" 
  
                              @foreach ($university->courses as $item)
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
            <label for="details">Details</label>
            <textarea name="details" id="details" class="form-control @error('details') is-invalid @enderror" rows="4">{{ $university->details }}</textarea>
            @error('details')
            <small class="form-text text-danger">
              {{ $message }}
            </small>
            @enderror
          </div>

          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $university->user->name }}">
            @error('name')
            <small class="form-text text-danger">
              {{ $message }}</small>
            @enderror
          </div>
          
          
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ $university->user->email }}">
            @error('email')
            <small class="form-text text-danger">
              {{ $message }}</small>
            @enderror
          </div>

          <div class="form-group">
            <label for="username">UserName</label>
            <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" value="{{ $university->user->username }}">
            @error('username')
            <small class="form-text text-danger">
              {{ $message }}</small>
            @enderror
          </div> 

          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}">
            @error('password')
            <small class="form-text text-danger">
              {{ $message }}
            </small>
            @enderror
          </div>

          <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" value="{{ old('password_confirmation') }}">
            @error('password_confirmation')
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
@section('scripts')
    <script>
        ClassicEditor
            .create( document.querySelector( '#details' ) )
            .catch( error => {
                console.error( error );
            } );// Increase the number of rows
var textareaElement = document.querySelector('#details');
textareaElement.setAttribute('rows', '500');
    </script>
@endsection