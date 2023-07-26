@extends('admin.layout')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-secondary">
                    <h3 class="card-title" style="font-size:1.3rem;line-height:1.8;
        font-weight:bold">
                        scholarships</h3>
                    {{-- <div class="card-tools">
                        <a class="btn btn-primary" href="{{ route('admin.scholarship.create') }}">
                            <i class="fas fa-plus circle-left mr-2"></i>
                            Add scholarship
                        </a>
                    </div> --}}
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
                                <th>Image</th>
                                <th>University</th>
                                <th>status</th>
                                <th>Action</th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach ($scholarships as $scholarship)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $scholarship->title }}</td>
                                    <td>
                                        <div style="width: 100px; height: 100px; overflow: hidden;">
                                            <img src="{{ asset($scholarship->image) }}" alt="Scholarship Image"
                                                style="width: 100%; height: auto; object-fit: cover;">
                                        </div>
                                    </td>
                                    <td>{{ $scholarship->university->uname }}</td>
                                    <td>
                                        <button type="button" class=" btn btn-sm btn-toggle  customSwitchsizemd {{ $scholarship->status=='1' ? 'statuson' : ''  }} " data-toggle="button" data-id="{{$scholarship->id}}" id="customSwitchsizemd">
                                            <div class="handle"></div>
                                        </button>
                                    </td>
                                    <td>

                                        <a class="btn btn-secondary"
                                            href="{{ route('admin.scholarship.show', $scholarship->id) }}"><i
                                                class="fas fa-eye"></i>Show</a>
                                         {{-- <a href="{{route('admin.scholarship.update',$scholarship->id)}}"><button class="btn btn-success">
                                                    <i class="fas fa-save"></i>Approve</button></a>  --}}
                                                    <form class="postdestroy" id="form_{{$scholarship->id}}" style="margin: 0;" method="Post" action="{{ route('admin.scholarship.destroy', $scholarship->id) }}"  data-toggle="modal" data-target="#exampleModal" >
                                                        @csrf
                                                        @method('Delete')
                    
                                                         </form> 
                                                    <button class="btn btn-danger deleteBtn btn-sm"
                                                    data-id="{{$scholarship->id}}"><i class="fas fa-trash"></i>Delete</button>
                    

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
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(function() {
            $('body').on('click', '.deleteBtn', function(){
                    console.log('clecked on delete btn');
                id = $(this).data('id');
                Swal.fire({
                    title: "Are you sure?",
                    text: "you want to delete scholarship??",
                    icon: "warning",
                    showCancelButton: false,
                    showDenyButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ok'
                    })
                    .then((willDelete) => {
                    if (willDelete.isConfirmed) {
                        $('#form_'+id).submit();
                        Swal.fire("Poof! Your scholarship has been deleted!", {
                        icon: "success",

                        });
                    } else {
                        Swal.fire("Your Item file is safe!");
                    }
                    });
            })


            $('body').on('click', '.customSwitchsizemd', function() {
              // console.log('click on customSwitchsizemd')
                var id = $(this).data("id");
                
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want change Status",
                    icon: 'warning',
                    showCancelButton: false,
                    showDenyButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Change Status'
                }).then((result) => {
                    if (result.isConfirmed) {
                      $(this).toggleClass("statuson");
                        $.ajax({
                            type: "get",
                            url: "{{ url('admin/scholarship/change-status') }}" + '/' + id,
                            success: function(data) {
                              
                            },
                            error: function(data) {
                              $(this).toggleClass("statuson");
                            }
                        });
                        Swal.fire({

                            title: 'Made Active!',
                            text: 'Scholarship Status Have Been Changed Successfully.',
                            icon: 'success',
                            showCancelButton: false, // There won't be any cancel button
                            showConfirmButton: false,
                            timer: 1300
                        })
                    }
                })
            });
        });
    </script>
@endsection