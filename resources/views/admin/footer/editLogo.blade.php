@extends('admin.layout')
@section('content')
<section class="content">
    <div class="container-fluid">
        @if (session('success'))
                <div class="alert alert-success">
                    <button class="close" data-dismiss="alert">X</button>
                    {{session('success')}}
                </div>
                @endif
        <div class="card">
            {{-- <div class="card-header bg-secondary">
                <h3 class="card-title" style="font-size:1.3rem;line-height:1.8;
        font-weight:bold">
                    Edit footer</h3>
                <div class="card-tools">
                    <a class="btn btn-primary" href="{{route('admin.footer.index')}}">
                        <i class="fas fa-arrow-circle-left mr-2"></i>
                        Go Back
                    </a>
                </div>
            </div> --}}

            <div class="card-body">
                <form method="post" action="{{ route('admin.footer.update-logo') }}" enctype="multipart/form-data">
                    @csrf
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <button class="close" data-dismiss="alert">X</button>
                        {{$errors->first()}}
                    </div>
                    @endif
                    
                    {{-- @if (!$images->isEmpty()) --}}
                    @if ($data['image'])
                          
                    <div style="width: 100px; height: 100px; overflow: hidden;">
                        <img src="{{ asset($data['image']) }}" alt="Footer Image"
                            style="width: 100%; height: auto; object-fit: cover;">
                    </div>
                    @endif
                      <div class="form-group">
                          <label for="image">Image</label>

                          <input type="file" name="image" id="image"
                              class="form-control @error('image') is-invalid @enderror">
                          @error('image')
                              <small class="form-text text-danger">
                                  {{ $message }}
                              </small>
                          @enderror



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
