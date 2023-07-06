@extends('admin.layout')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-secondary">
                    <h3 class="card-title" style="font-size:1.3rem;line-height:1.8;
        font-weight:bold">
                        Add New Courses</h3>
                    <div class="card-tools">
                        <a class="btn btn-primary" href="{{ route('admin.courses.index') }}">
                            <i class="fas fa-arrow-circle-left mr-2"></i>
                            Go Back
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <form method="post" action="{{ route('admin.courses.store') }}" enctype="multipart/form-data">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <button class="close" data-dismiss="alert">X</button>
                                {{ $errors->first() }}
                            </div>
                        @endif
                        @csrf
                        <div class="form-group">
                            <label for="name"> Course</label>
                            <input type="name" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                            @error('name')
                                <small class="form-text text-danger">
                                    {{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="cat_id">Category</label>
                            <select name="cat_id" class="form-control">
                                <option>select Category-------</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="description"> Description</label>
                            <textarea name="description" id="description" class="form-control @error('description')is-invalid @enderror"
                                rows="4"></textarea>
                            @error('description')
                                <small class="form-text text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image"
                                class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}">
                            @error('image')
                                <small class="form-text text-danger">
                                    {{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="university_id">University</label>

                            <div class="row d-flex mt-100">
                                <div class="col-md-6">
                                    <select id="choices-multiple-remove-button" placeholder="Select university" multiple>
                                        @foreach ($universities as $university)
                                            <option value="{{ $university->id }}">{{ $university->name }}</option>
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
                            <label for="status">Status</label>
                            <div class="form-check">
                                <input type="checkbox" name="status" id="status" value="1"
                                    class="form-check-input">
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
