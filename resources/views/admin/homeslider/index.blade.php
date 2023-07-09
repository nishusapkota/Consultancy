@extends('admin.layout')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-secondary">
                    <h3 class="card-title" style="font-size:1.3rem;line-height:1.8;
        font-weight:bold">
                        Home Slider</h3>
                    <div class="card-tools">
                        <a class="btn btn-primary" href="{{ route('admin.home.create') }}">
                            <i class="fas fa-plus circle-left mr-2"></i>
                            Add Home Slider
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
                                <th>Title</th>
                                <th>Sub Heading</th>
                                <th>Description</th>
                                <th>File</th>
                                <th>Action</th>
                            </tr>

                        </thead>
                        <tbody>
                        
                            @foreach ($sliders as $slider)
                           
                                <tr>
                                    <td>{{ $slider->id }}</td>
                                    <td>{{ $slider->title }}</td>
                                    <td>{{ $slider->sub_heading  ?: 'null'}}</td>
                                    <td>{{ $slider->description  ?: 'null'}}</td>
                                    <td>
                                       
                                        {{-- <div style="width: 100px; height: 100px; overflow: hidden;">
                                    <img src="{{ asset($slider->image) }}" alt="Slider Image" style="width: 100%; height: auto; object-fit: cover;">
                                  </div>  --}}
                                    </td>
                                    <td>
{{-- @dd($slider) --}}
                                        <a class="btn btn-secondary" href="{{ route('admin.home.show', $slider->id) }}"><i
                                                class="fas fa-eye"></i>Show</a>
                                        <a class="btn btn-warning" href="{{ route('admin.home.edit', $slider->id) }}"><i
                                                class="fas fa-edit"></i>Edit</a>
                                        <form class="d-inline" onclick="return confirm('Are you sure to delete this?')"
                                            action="{{ route('admin.home.destroy', $slider) }}" method="post">
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