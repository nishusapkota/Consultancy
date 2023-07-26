@extends('admin.layout')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-secondary">
                <h3 class="card-title" style="font-size:1.3rem;line-height:1.8;
        font-weight:bold">
                    Courses</h3>
                <div class="card-tools">
                    <a class="btn btn-primary" href="{{route('admin.courses.create')}}">
                        <i class="fas fa-plus circle-left mr-2"></i>
                        Add Course
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
                            <th>Course</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>

                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$course->name}}</td>
                            <td>@if(isset($course->category))
                                {{$course->category->name}}
                                @else
                                No category
                                @endif</td>
                            <td>
                                <div style="width: 100px; height: 100px; overflow: hidden;">
                                    <img src="{{ asset($course->image) }}" alt="Course Image" style="width: 100%; height: auto; object-fit: cover;">
                                  </div> 
                            </td>
                            <td> 
                                <button type="button" class=" btn btn-sm btn-toggle  customSwitchsizemd {{ $course->status=='1' ? 'statuson' : ''  }} " data-toggle="button" data-id="{{$course->id}}" id="customSwitchsizemd">
                                    <div class="handle"></div>
                                </button>        
                            </td>

                            <td>

                                <a class="btn btn-secondary btn-sm" href="{{route('admin.courses.show',$course)}}"><i class="fas fa-eye"></i>Show</a>
                                <a class="btn btn-warning btn-sm" href="{{route('admin.courses.edit',$course)}}"><i class="fas fa-edit"></i>Edit</a>
                                {{-- <form class="d-inline" action="{{route('admin.courses.destroy',$course)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger show_confirm" data-toggle="tooltip" title='Delete'>
                                        <i class="fas fa-trash"></i>Delete</button>
                                </form> --}}

                                <form class="postdestroy" id="form_{{$course->id}}" style="margin: 0;" method="Post" action="{{ route('admin.courses.destroy', $course->id) }}"  data-toggle="modal" data-target="#exampleModal" >
                                    @csrf
                                    @method('Delete')

                                     </form> 
                                <button class="btn btn-danger deleteBtn btn-sm"
                                data-id="{{$course->id}}"><i class="fas fa-trash"></i>Delete</button>

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
          $('.show_confirm').click(function(event) {
            console.log('delete btn clicked');
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          Swal.fire({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });

        $(function() {
            $('body').on('click', '.deleteBtn', function(){
                    console.log('clecked on delete btn');
                id = $(this).data('id');
                Swal.fire({
                    title: "Are you sure?",
                    text: "you want to delete course??",
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
                        Swal.fire("Poof! Your course has been deleted!", {
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
                    showCancelButton: true,
                    showDenyButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Change Status'
                }).then((result) => {
                    if (result.isConfirmed) {
                      $(this).toggleClass("statuson");
                        $.ajax({
                            type: "get",
                            url: "{{ url('admin/course/change-status') }}" + '/' + id,
                            success: function(data) {
                              
                            },
                            error: function(data) {
                              $(this).toggleClass("statuson");
                            }
                        });
                        Swal.fire({

                            title: 'Made Active!',
                            text: 'Course Status Have Been Changed Successfully.',
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