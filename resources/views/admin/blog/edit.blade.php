@extends('admin.layout')

@section('sidebar')
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item menu-open">
            <a href="" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon far fa-envelope"></i>
        <p>
          Courses
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview" style="display: none;">
        <li class="nav-item">
          <a href="{{Route('admin.course-category.index')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Category</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{Route('admin.course.index')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Course</p>
          </a>
        </li>
      </ul>
    </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-file"></i>
                <p>Colleges</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-file"></i>
                <p>Universities</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.blog.index')}}" class="nav-link active">
                <i class="nav-icon fas fa-file"></i>
                <p>Blogs</p>
            </a>
        </li>


    </ul>
</nav>
@endsection


@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-secondary">
                <h3 class="card-title" style="font-size:1.3rem;line-height:1.8;
        font-weight:bold">
                    Add New Blogs</h3>
                <div class="card-tools">
                    <a class="btn btn-primary" href="{{route('admin.blog.index')}}">
                        <i class="fas fa-arrow-circle-left mr-2"></i>
                        Go Back
                    </a>
                </div>
            </div>

            <div class="card-body">
                <form method="post" action="{{ route('admin.blog.update',$blog) }}">
                    @method('PUT')
                    @csrf
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <button class="close" data-dismiss="alert">X</button>
                        {{$errors->first()}}
                    </div>
                    @endif

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ $blog->title }}">
                        @error('title')
                        <small class="form-text text-danger">
                            {{ $message }}</small>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="short_description">Short Description</label>
                        <textarea name="short_description" id="short_description" class="form-control @error('short_description')is-invalid @enderror" rows="4">{{$blog->short_description}}</textarea>
                        @error('short_description')
                        <small class="form-text text-danger">
                            {{ $message }}
                        </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="body">Body</label>
                        <textarea name="body" id="body" class="form-control @error('body')is-invalid @enderror" rows="4">{{$blog->body}}</textarea>
                        @error('body')
                        <small class="form-text text-danger">
                            {{ $message }}
                        </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="extra">Extra</label>
                        <textarea name="extra" id="extra" class="form-control @error('extra')is-invalid @enderror" rows="4">{{$blog->extra}}</textarea>
                        @error('extra')
                        <small class="form-text text-danger">
                            {{ $message }}
                        </small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <div class="form-check">
                            <input type="checkbox" name="status" id="status" value="1" class="form-check-input" {{$blog->status =='1' ? 'checked' : ''}}>
                            <label class="form-check-label" for="status">Active</label>
                        </div>
                    </div>

                    <button class="btn btn-primary">
                        <i class="fas fa-save mr-2"></i>
                        update
                    </button>
                </form>
            </div>
        </div>



    </div>
</section>
@endsection