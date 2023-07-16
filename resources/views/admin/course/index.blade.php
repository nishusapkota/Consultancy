@extends('admin.layout')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-secondary">
                <h3 class="card-title" style="font-size:1.3rem;line-height:1.8;
        font-weight:bold">
                    Courses</h3>
                <div class="card-tools">
                    <a class="btn btn-primary" href="{{route('admin.courses.create')}}">
                        <i class="fas fa-plus circle-left mr-2"></i>
                        Add Course
                    </a>
                </div>
            </div>

            <div class="card-body">
                @if (session('success'))
                <div class="alert alert-success">
                    <button class="close" data-dismiss="alert">X</button>
                    {{session('success')}}
                </div>
                @endif
                <table class="table table-bordered">
                    <thead class="bg-primary">
                        <tr>
                            <th>ID</th>
                            <th>Course</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>

                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$course->name}}</td>
                            <td>@if(isset($course->category))
                                {{$course->category->name}}
                                @else
                                No category
                                @endif</td>
                            <td>
                                <div style="width: 100px; height: 100px; overflow: hidden;">
                                    <img src="{{ asset($course->image) }}" alt="Course Image" style="width: 100%; height: auto; object-fit: cover;">
                                  </div> 
                            </td>
                            <td>
                                @if ($course->status==1)
                                <span class="badge badge-primary">Active</span>
                                @else
                                <span class="badge badge-danger">Inactive</span>
                                @endif
                            </td>
                            <td>

                                <a class="btn btn-secondary" href="{{route('admin.courses.show',$course)}}"><i class="fas fa-eye"></i>Show</a>
                                <a class="btn btn-warning" href="{{route('admin.courses.edit',$course)}}"><i class="fas fa-edit"></i>Edit</a>
                                <form class="d-inline" onclick="return confirm('Are you sure to delete this?')" action="{{route('admin.courses.destroy',$course)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">
                                        <i class="fas fa-trash"></i>Delete</button>
                                </form>

                            </td>
                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>
        </div>



    </div>
</section>
@endsection