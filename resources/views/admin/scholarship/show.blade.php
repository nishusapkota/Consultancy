@extends('admin.layout')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-secondary">
                <h3 class="card-title" style="font-size:1.3rem;line-height:1.8;
        font-weight:bold">
                   Show scholarship</h3>
                <div class="card-tools">
                <a class="btn btn-primary" href="{{route('admin.scholarship.index')}}">
            <i class="fas fa-arrow-circle-left mr-2"></i>
            Go Back
          </a>
                </div>
            </div>

            <div class="card-body">
            <table class="table table-bordered table-condensed" style="width:100%">
                <tr>
                    <th>ID</th>
                    <td>{{$scholarship->id}}</td>
                </tr>
                <tr>
                    <th>Title</th>
                    <td>{{$scholarship->title}}</td>
                </tr>
                <tr>
                    <th>University</th>
                    <td>{{$scholarship->university->uname}}</td>
                </tr>
                
                <tr>
                    <th> Description</th>
                    <td>{!!$scholarship->description!!}</td>
                </tr>
                <tr>
                    <th> Status</th>
                    <td>
                        @if ($scholarship->status == 1)
                    <span class="badge badge-primary">Active</span>
                @else
                    <span class="badge badge-danger">Inactive</span>
                @endif
                    </td>
                    
                </tr>
                <tr>
                    <th>Image</th>
                    <td>
                        <div style="width: 100px; height: 100px; overflow: hidden;">
                            <img src="{{ asset($scholarship->image) }}" alt="Scholarship Image" style="width: 100%; height: auto; object-fit: cover;">
                          </div> 
                    </td>
                </tr>

            </table>
              

            </div>
        </div>



    </div>
</section>
@endsection