@extends('admin.layout')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-secondary">
                <h3 class="card-title" style="font-size:1.3rem;line-height:1.8;
        font-weight:bold">
                   Request course</h3>
                <div class="card-tools">
                    {{-- <a class="btn btn-primary" href="{{route('admin.course.create')}}">
                        <i class="fas fa-plus circle-left mr-2"></i>
                        Add Course
                    </a> --}}
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
                           <th>University</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reqCourses as $course)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$course->name}}</td>
                            <td>{{$course->category->name}}</td>
                            <td>{{$course->university->uname}}</td>
                            <td>
                             <a class="btn btn-secondary" href="{{route('admin.uni-requested-course.show',$course->id)}}"><i class="fas fa-eye"></i>Show</a>
                             <a href="{{route('admin.uni-requested-course.update',$course->id)}}"><button class="btn btn-success">
                                <i class="fas fa-save"></i>Approve</button></a> 
                                <form class="d-inline" onclick="return confirm('Are you sure to delete this?')" action="{{route('admin.uni-requested-course.destroy',$course->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">
                                        <i class="fas fa-trash"></i>Disapprove</button>
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