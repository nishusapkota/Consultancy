@extends('admin.layout')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-secondary">
                    <h3 class="card-title" style="font-size:1.3rem;line-height:1.8;
        font-weight:bold">
                        University Images</h3>
                    <div class="card-tools">
                        <a class="btn btn-primary" href="{{ route('admin.university.create_image', $university->id) }}">
                            <i class="fas fa-plus circle-left mr-2"></i>
                            Add image
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            <button class="close" data-dismiss="alert">X</button>
                            {{ session('success') }}
                        </div>
                    @endif
                    <table class="table table-bordered">
                        <thead class="bg-primary">
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach ($images as $image)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>
                                        
                                            @if (in_array($image->ext, ['jpg', 'jpeg', 'png']))
                                                <img src="{{ asset($image->image) }}" alt="Current Image"
                                                    style="max-width: 200px;">
                                            @elseif (in_array($image->ext, ['mp4', 'mov', 'mkv']))
                                                <video width="320" height="240" controls>
                                                    <source src="{{ asset($image->image) }}" type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>
                                            @endif

                                        

                                    </td>

                                    <td>


                                        <a class="btn btn-warning"
                                            href="{{ route('admin.university.edit_image', $image->id) }}"><i
                                                class="fas fa-edit"></i>Edit</a>






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
