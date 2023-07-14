@extends('admin.layout')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-secondary">
                <h3 class="card-title" style="font-size:1.3rem;line-height:1.8;
        font-weight:bold">
                    Blogs</h3>
                <div class="card-tools">
                    <a class="btn btn-primary" href="{{route('admin.blog.create')}}">
                        <i class="fas fa-plus circle-left mr-2"></i>
                        Add Blog
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
                            <th>Slug</th>
                            <th>Short Description</th>
                           
                            <th>Extra</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>

                    </thead>
                    <tbody>
                        @foreach ($blogs as $blog )
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$blog->title}}</td>
                            <td>{{$blog->slug}}</td>
                            <td>{{$blog->short_description}}</td>
                            
                            <td>{{$blog->extra}}</td>
                            {{-- <td>{{$blog->status?'<span class="badge badge-primary">'.$blog->status.'</span>':'<span class="badge badge-primary">'.$blog->status.'</span>'}}</td> --}}
                            <td>
                            @if ($blog->status==1)
                            <span class="badge badge-primary">Active</span>
                            @else
                            <span class="badge badge-danger">Inactive</span>
                            @endif
                        </td>
                            <td>

                                <a class="btn btn-secondary" href="{{route('admin.blog.show',$blog)}}"><i class="fas fa-eye"></i>Show</a>
                                <a class="btn btn-warning" href="{{route('admin.blog.edit',$blog)}}"><i class="fas fa-edit"></i>Edit</a>
                                <form class="d-inline" onclick="return confirm('Are you sure to delete this?')" action="{{route('admin.blog.destroy',$blog)}}" method="post">
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