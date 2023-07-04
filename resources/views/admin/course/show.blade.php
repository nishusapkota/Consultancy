@extends('admin.layout')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-secondary">
                <h3 class="card-title" style="font-size:1.3rem;line-height:1.8;
        font-weight:bold">
                   Show Course</h3>
                <div class="card-tools">
                <a class="btn btn-primary" href="{{route('admin.courses.index')}}">
            <i class="fas fa-arrow-circle-left mr-2"></i>
            Go Back
          </a>
                </div>
            </div>

            <div class="card-body">
            <table class="table table-bordered table-condensed" style="width:50%">
                <tr>
                    <th>ID</th>
                    <td>{{$course->id}}</td>
                </tr>
                <tr>
                    <th>Course</th>
                    <td>{{$course->name}}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{{$course->description}}</td>
                </tr>
                <tr>
                    <th>Category</th>
                    <td>{{$course->category->name}}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{$course->status}}</td>
                </tr>

            </table>
              

            </div>
        </div>



    </div>
</section>
@endsection
