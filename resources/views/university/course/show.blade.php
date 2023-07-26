@extends('university.layout.master')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-secondary">
                <h3 class="card-title" style="font-size:1.3rem;line-height:1.8;
        font-weight:bold">
                   Show Requested Course</h3>
                <div class="card-tools">
                <a class="btn btn-primary" href="{{route('university.courses.index')}}">
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
                    <th>Image</th>
                    <td> <div style="width: 100px; height: 100px; overflow: hidden;">
                        <img src="{{ asset($course->image) }}" alt="Course Image" style="width: 100%; height: auto; object-fit: cover;">
                      </div> </td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{!!$course->description!!}</td>
                </tr>
                <tr>
                    <th>Category</th>
                    <td>{{$course->category->name}}</td>
                </tr>

                <tr>
                    <th>Levels</th>
                    <td>
                        @forelse ($course->levels as $level)
                            {{ $level->name}}<br>
                        @empty
                            No levels associated with this course.
                        @endforelse
                    </td>
                </tr>

                <tr>
                    <th>Status</th>

                <td>
                    @if ($course->status==1)
                    <span class="badge badge-primary">Active</span>
                    @else
                    <span class="badge badge-danger">Inactive</span>
                    @endif
                </td>
            </tr>
                

            </table>
              

            </div>
        </div>



    </div>
</section>
@endsection
