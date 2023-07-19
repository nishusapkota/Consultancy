@extends('university.layout.master')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-secondary">
                    <h3 class="card-title" style="font-size:1.3rem;line-height:1.8;
        font-weight:bold">
                        Request Certificates</h3>
                    <div class="card-tools">
                        <a class="btn btn-primary" href="{{ route('university.request-certificate.create') }}">
                            <i class="fas fa-plus circle-left mr-2"></i>

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
                                <th>Certificate Image</th>
                                <th>Action</th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach ($certificates as $certificate)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>
                                        <div style="width: 100px; height: 100px; overflow: hidden;">
                                            <img src="{{ asset($certificate->image) }}" alt="Certificate Image"
                                                style="width: 100%; height: auto; object-fit: cover;">
                                        </div>
                                    </td>

                                    <td>

                                        {{-- <a class="btn btn-secondary" href=""><i class="fas fa-eye"></i>Show</a> --}}
                                        <a class="btn btn-warning" href="{{ route('university.request-certificate.edit', $certificate->id) }}"><i
                                                class="fas fa-edit"></i>Edit</a>
                                        <form class="d-inline" onclick="return confirm('Are you sure to delete this?')"
                                            action="{{route('university.request-certificate.delete',$certificate->id)}}" method="post">
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
