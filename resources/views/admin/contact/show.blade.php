@extends('admin.layout')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-secondary">
                <h3 class="card-title" style="font-size:1.3rem;line-height:1.8;
        font-weight:bold">
                   Show About</h3>
                <div class="card-tools">
                <a class="btn btn-primary" href="{{route('admin.about.index')}}">
            <i class="fas fa-arrow-circle-left mr-2"></i>
            Go Back
          </a>
                </div>
            </div>

            <div class="card-body">
            <table class="table table-bordered table-condensed" style="width:50%">
                <tr>
                    <th>ID</th>
                    <td>{{$about->id}}</td>
                </tr>
                <tr>
                    <th>Title</th>
                    <td>{{$about->title}}</td>
                </tr>
                
                <tr>
                    <th>Description</th>
                    <td>{{$about->description}}</td>
                </tr>
                
                <tr>
                    <th>Image</th>
                    <td>
                        <div style="width: 100px; height: 100px; overflow: hidden;">
                            <img src="{{ asset($about->image) }}" alt="About Image" style="width: 100%; height: auto; object-fit: cover;">
                          </div> 
                    </td>
                </tr>
                
                

            </table>
              

            </div>
        </div>



    </div>
</section>
@endsection