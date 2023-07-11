@extends('admin.layout')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-secondary">
                <h3 class="card-title" style="font-size:1.3rem;line-height:1.8;
        font-weight:bold">
                    Abouts</h3>
                    @if ($canAdd==1)
                        
                    <div class="card-tools">
                        <a class="btn btn-primary" href="{{route('admin.about.create')}}">
                            <i class="fas fa-plus circle-left mr-2"></i>
                            Add about
                        </a>
                    </div>
                    @endif
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
                            <th>Description</th>
                            <th>Action</th>
                        </tr>

                    </thead>
                    <tbody>
                        @foreach ($abouts as $about )
                        <tr>
                            <td>{{$about->id}}</td>
                            <td>{{$about->title}}</td>
                            <td>{{$about->description}}</td>
                            
                            <td>

                                <a class="btn btn-secondary" href="{{route('admin.about.show',$about)}}"><i class="fas fa-eye"></i>Show</a>
                                <a class="btn btn-warning" href="{{route('admin.about.edit',$about)}}"><i class="fas fa-edit"></i>Edit</a>
                                {{-- <form class="d-inline" onclick="return confirm('Are you sure to delete this?')" action="{{route('admin.about.destroy',$about)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">
                                        <i class="fas fa-trash"></i>Delete</button>
                                </form> --}}

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