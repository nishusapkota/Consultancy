@extends('admin.layout')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-secondary">
                <h3 class="card-title" style="font-size:1.3rem;line-height:1.8;
        font-weight:bold">
                    enquiries</h3>
                <div class="card-tools">
                    
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
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>University</th>
                            <th>Course</th>
                            <th>Level</th>
                            <th>Action</th>
                        </tr>

                    </thead>
                    <tbody>
                        @foreach ($enquiries as $enquiry )
                        <tr>
                            <td>{{$enquiry->id}}</td>
                            <td>{{$enquiry->name}}</td>
                            <td>{{$enquiry->contact}}</td>
                            <td>{{$enquiry->email}}</td>
                            <td>{{$enquiry->address}}</td>
                            <td>{{$enquiry->level->name}}</td>
                            <td>{{$enquiry->course->name}}</td>
                            <td>{{$enquiry->university->uname}}</td>
                            <td>

                                <a class="btn btn-secondary" href="{{route('admin.student-enquiry.show',$enquiry)}}"><i class="fas fa-eye"></i>Show</a>
                                <form class="d-inline" onclick="return confirm('Are you sure to delete this?')" action="{{route('admin.student-enquiry.destroy',$enquiry)}}" method="post">
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