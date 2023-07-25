@extends('admin.layout')


@push('style')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js" integrity="sha512-F636MAkMAhtTplahL9F6KmTfxTmYcAcjcCkyu0f0voT3N/6vzAuJ4Num55a0gEJ+hRLHhdz3vDvZpf6kqgEa5w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.css" integrity="sha512-9tISBnhZjiw7MV4a1gbemtB9tmPcoJ7ahj8QWIc0daBCdvlKjEA48oLlo6zALYm3037tPYYulT0YQyJIJJoyMQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
@endpush


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
                                <input data-id="{{$blog->id}}" class="toggle_button" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $blog->status ? 'checked' : '' }}> 
                               
                        </td>
                            <td>

                                <a class="btn btn-secondary" href="{{route('admin.blog.show',$blog)}}"><i class="fas fa-eye"></i>Show</a>
                                <a class="btn btn-warning" href="{{route('admin.blog.edit',$blog)}}"><i class="fas fa-edit"></i>Edit</a>
                                <form class="d-inline" action="{{route('admin.blog.destroy',$blog)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger show_confirm" data-toggle="tooltip" title='Delete'>
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


@section('scripts')
<script>    
    $(document).ready(function() {
        // Handle the click event on the status toggle
        $('.toggle-button').click(function() {
            // console.log('Status button clicked.');
            var status = $(this).prop('checked') ? 1 : 0;
            var blog_id = $(this).data('id');
            var token = "{{ csrf_token() }}";

            $.ajax({
                type: "POST",
                dataType: "json",
                url: '{{ route("admin.courseStatusChange") }}',
                data: {
                    '_token': token,
                    'status': status,
                    'blog_id': blog_id
                },
                success: function(data) {
                    console.log('Success');
                },
                error: function(data) {
                    console.log('Error');
                }
            });
        });

        // Handle the click event on the delete confirmation button
        $('.show_confirm').click(function(event) {
            // console.log('delete button clicked.');
            var form =  $(this).closest("form");
            event.preventDefault();
            swal({
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
    });
</script>
@endsection

  