@extends('admin.layout')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-secondary">
                <h3 class="card-title" style="font-size:1.3rem;line-height:1.8;
        font-weight:bold">
                    scholarships</h3>
                <div class="card-tools">
                    <a class="btn btn-primary" href="{{route('admin.scholarship.create')}}">
                        <i class="fas fa-plus circle-left mr-2"></i>
                        Add scholarship
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
                            <th>Title</th>
                            
                            <th>Image</th>
                            <th>University</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>

                    </thead>
                    <tbody>
                        @foreach ($scholarships as $scholarship )
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$scholarship->title}}</td>
                            <td>
                                <div style="width: 100px; height: 100px; overflow: hidden;">
                                    <img src="{{ asset($scholarship->image) }}" alt="Scholarship Image" style="width: 100%; height: auto; object-fit: cover;">
                                  </div> 
                            </td>
                            <td>{{$scholarship->university->uname}}</td>
                            <td>{!!$scholarship->description!!}</td>
                            <td>

                                <a class="btn btn-secondary" href="{{route('admin.scholarship.show',$scholarship)}}"><i class="fas fa-eye"></i>Show</a>
                                <a class="btn btn-warning" href="{{route('admin.scholarship.edit',$scholarship)}}"><i class="fas fa-edit"></i>Edit</a>
                                <form class="d-inline" onclick="return confirm('Are you sure to delete this?')" action="{{route('admin.scholarship.destroy',$scholarship)}}" method="post">
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