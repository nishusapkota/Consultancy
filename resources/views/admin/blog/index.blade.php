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
                            
                            <td>{{$blog->short_description}}</td>
                            
                            <td>{{$blog->extra}}</td>
                            {{-- <td>{{$blog->status?'<span class="badge badge-primary">'.$blog->status.'</span>':'<span class="badge badge-primary">'.$blog->status.'</span>'}}</td> --}}
                            <td>
                                <button type="button" class=" btn btn-sm btn-toggle  customSwitchsizemd {{ $blog->status=='1' ? 'statuson' : ''  }} " data-toggle="button" data-id="{{$blog->id}}" id="customSwitchsizemd">
                                    <div class="handle"></div>
                                </button>                               
                        </td>
                            <td>

                                <a class="btn btn-secondary btn-sm" href="{{route('admin.blog.show',$blog)}}"><i class="fas fa-eye"></i>Show</a>
                                <a class="btn btn-warning btn-sm" href="{{route('admin.blog.edit',$blog)}}"><i class="fas fa-edit"></i>Edit</a>
                                <form class="postdestroy" id="form_{{$blog->id}}" style="margin: 0;" method="Post" action="{{ route('admin.blog.destroy', $blog->id) }}"  data-toggle="modal" data-target="#exampleModal" >
                                    @csrf
                                    @method('Delete')

                                     </form> 
                                     <button class="btn btn-danger deleteBtn btn-sm"
                                     data-id="{{$blog->id}}"><i class="fas fa-trash"></i>Delete</button>
                                
                               

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
                    text: "you want to delete blog??",
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
                        Swal.fire("Poof! Your blog has been deleted!", {
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
                            url: "{{ url('admin/blog/change-status') }}" + '/' + id,
                            success: function(data) {
                              
                            },
                            error: function(data) {
                              $(this).toggleClass("statuson");
                            }
                        });
                        Swal.fire({

                            title: 'Made Active!',
                            text: 'Blog Status Have Been Changed Successfully.',
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
  