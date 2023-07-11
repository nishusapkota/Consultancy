@extends('admin.layout')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-secondary">
                    <h3 class="card-title" style="font-size:1.3rem;line-height:1.8;
        font-weight:bold">
                        Edit About Images</h3>
                    <div class="card-tools">
                        <a class="btn btn-primary" href="{{ route('admin.about.index') }}">
                            <i class="fas fa-arrow-circle-left mr-2"></i>
                            Go Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('admin.about.update_image') }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <button class="close" data-dismiss="alert">X</button>
                                {{ $errors->first() }}
                            </div>
                        @endif


                        {{-- <div style="width: 100px; height: 100px; overflow: hidden;">
                        <img src="{{ asset($about->image) }}" alt="About Image" style="width: 100%; height: auto; object-fit: cover;">
                      </div>  --}}
                      @if (!$images->isEmpty())
                          
                      <div style="width: 100px; height: 100px; overflow: hidden;">
                          <img src="{{ asset($images[0]->image) }}" alt="University Image"
                              style="width: 100%; height: auto; object-fit: cover;">
                      </div>
                      @endif
                        <div class="form-group">
                            <label for="images[0]">First Images</label>

                            <input type="file" name="images[0]" id="images[0]"
                                class="form-control @error('images[0]') is-invalid @enderror" multiple>
                            @error('images[0]')
                                <small class="form-text text-danger">
                                    {{ $message }}
                                </small>
                            @enderror



                        </div>
                        @if (!$images->isEmpty())
                          
                      <div style="width: 100px; height: 100px; overflow: hidden;">
                          <img src="{{ asset($images[1]->image) }}" alt="University Image"
                              style="width: 100%; height: auto; object-fit: cover;">
                      </div>
                      @endif
                        
                        <div class="form-group">
                            <label for="images[1]">Second Images</label>
                            <input type="file" name="images[1]" id="images[1]"
                                class="form-control @error('images[1]') is-invalid @enderror" multiple>
                            @error('images[1]')
                                <small class="form-text text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                        @if (!$images->isEmpty())
                          
                        <div style="width: 100px; height: 100px; overflow: hidden;">
                            <img src="{{ asset($images[2]->image) }}" alt="University Image"
                                style="width: 100%; height: auto; object-fit: cover;">
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="images[2]">Third Images</label>
                            <input type="file" name="images[2]" id="images[2]"
                                class="form-control @error('images[2]') is-invalid @enderror" multiple>
                            @error('images[2]')
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
