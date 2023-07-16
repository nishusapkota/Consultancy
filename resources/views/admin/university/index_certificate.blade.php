@extends('admin.layout')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-secondary">
                    <h3 class="card-title" style="font-size:1.3rem;line-height:1.8;
        font-weight:bold">
                        University Certificates</h3>
                    <div class="card-tools">
                        <a class="btn btn-primary" href="{{ route('admin.university.create_certificate',$university->id) }}">
                            <i class="fas fa-plus circle-left mr-2"></i>
                            Add Certificate
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
                            @foreach ($certificates as $certificate)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>
                                        <div style="width: 100px; height: 100px; overflow: hidden;">
                                            <img src="{{ asset($certificate->image) }}" alt="Certificate Image" style="width: 100%; height: auto; object-fit: cover;">
                                          </div> 
                                    </td>
                                    
                                    <td>

                                        
                                        <a class="btn btn-warning"
                                            href="{{ route('admin.university.edit_certificate', $certificate->id) }}"><i
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
