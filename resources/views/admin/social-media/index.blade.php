@extends('admin.layout')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-secondary">
                <h3 class="card-title" style="font-size:1.3rem;line-height:1.8;
        font-weight:bold">
                    social_medias</h3>
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
                            <th>Link</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>

                    </thead>
                    <tbody>
                        @foreach ($socialmedias as $socialmedia )
                        <tr>
                            <td>{{$socialmedia->id}}</td>
                            <td>{{$socialmedia->name}}</td>
                            <td>{{$socialmedia->link}}</td>
                            <td>
                              
                            </td>
                            <td>

                                <a class="btn btn-warning" href="{{route('admin.social-media.edit', $socialmedia->id)}}"><i class="fas fa-edit"></i>Edit</a>
                                

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