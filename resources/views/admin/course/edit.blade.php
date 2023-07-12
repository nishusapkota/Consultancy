@extends('admin.layout')
@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header bg-secondary">
        <h3 class="card-title" style="font-size:1.3rem;line-height:1.8;
        font-weight:bold">
          Edit Course</h3>
        <div class="card-tools">
          <a class="btn btn-primary" href="{{route('admin.courses.index')}}">
            <i class="fas fa-arrow-circle-left mr-2"></i>
            Go Back
          </a>
        </div>
      </div>

      <div class="card-body">
        <form method="post" action="{{ route('admin.courses.update',$course) }}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
        @if($errors->any())
            <div class="alert alert-danger">
            <button class="close" data-dismiss="alert">X</button>
              {{$errors->first()}}</div>
            @endif
          
          <div class="form-group">
            <label for="name"> Course</label>
            <input type="name" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{$course->name}}">
            @error('name')
            <small class="form-text text-danger">
              {{ $message }}</small>
            @enderror
          </div>

          <div class="form-group">
                <label for="cat_id">Category</label>
                <select name="cat_id" class="form-control">
                    <option clsss selected disabled>select Category-------</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}" {{$course->cat_id ==$category->id ? 'selected':''}} >
                        {{$category->name}}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
            <label for="description"> Description</label>
            <textarea name="description" id="description" class="form-control @error('description')is-invalid @enderror" rows="4">{{$course->description}}
            </textarea>
            @error('description')
            <small class="form-text text-danger">
              {{ $message }}
            </small>
            @enderror
          </div>

          <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image"
                class="form-control @error('image') is-invalid @enderror">
            @error('image')
                <small class="form-text text-danger">
                    {{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
          <label for="university_id">University</label>
          {{-- @dd($course-universities) --}}
          <div class="row d-flex mt-100">
              <div class="col-md-6">
                  <select id="choices-multiple-remove-button" name="university_id[]" placeholder="Select university" multiple>
                      @foreach ($universities as $university)
                          <option value="{{ $university->id }}" 

                            @foreach ($course->universities as $item)
                            {{-- @dd($item->id===$university->id) --}}
                                @if ($item->id===$university->id)
                                selected
                                @endif
                            @endforeach
                            
                            >
                              {{ $university->uname }}
                          </option>
                      @endforeach
                  </select>
              </div>
          </div>
      
          @error('university_id')
              <small class="form-text text-danger">
                  {{ $message }}
              </small>
          @enderror
      </div>
      
      
      <div class="form-group">
        <label for="level_id">Level</label>
        {{-- @dd($course-universities) --}}
        <div class="row d-flex mt-100">
            <div class="col-md-6">
                <select id="choices-multiple-remove-button" name="level_id[]" placeholder="Select level" multiple>
                    @foreach ($levels as $level)
                        <option value="{{ $level->id }}" 

                          @foreach ($course->levels as $item)
                          {{-- @dd($item->id===$university->id) --}}
                              @if ($item->id===$level->id)
                              selected
                              @endif
                          @endforeach
                          
                          >
                            {{ $level->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    
        @error('level_id')
            <small class="form-text text-danger">
                {{ $message }}
            </small>
        @enderror
    </div>
      
          <div class="form-group">
                        <label for="status">Status</label>
                        <div class="form-check">
                            <input type="checkbox" name="status" id="status" value="1" class="form-check-input" {{$course->status =='1' ? 'checked' : ''}}>
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
@section('scripts')
    <script>
        ClassicEditor
            .create( document.querySelector( '#description' ) )
            .catch( error => {
                console.error( error );
            } );// Increase the number of rows
var textareaElement = document.querySelector('#description');
textareaElement.setAttribute('rows', '500');
    </script>
@endsection