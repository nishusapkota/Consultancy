@extends('admin.layout')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-secondary">
                <h3 class="card-title" style="font-size:1.3rem;line-height:1.8;
        font-weight:bold">
                    Edit About</h3>
                <div class="card-tools">
                    <a class="btn btn-primary" href="{{route('admin.about.index')}}">
                        <i class="fas fa-arrow-circle-left mr-2"></i>
                        Go Back
                    </a>
                </div>
            </div>

            <div class="card-body">
                <form method="post" action="{{ route('admin.about.update',$about) }}" enctype="multipart/form-data">
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
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ $about->title }}">
                        @error('title')
                        <small class="form-text text-danger">
                            {{ $message }}</small>
                        @enderror
                    </div>
                    
                    
                    <div class="form-group">
                        <label for="description"> Body</label>
                        <textarea name="description" id="description" class="form-control @error('description')is-invalid @enderror"
                            rows="4">{!!$about->description!!}</textarea>
                        @error('description')
                            <small class="form-text text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                          </div>

                          
                       <div class="form-group">
                        <a class="btn btn-warning" href="{{route('admin.about.edit_image',$about)}}">Edit images</a>

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
