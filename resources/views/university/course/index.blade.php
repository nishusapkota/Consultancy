@extends('university.layout.master')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-secondary">
                <h3 class="card-title" style="font-size:1.3rem;line-height:1.8;
        font-weight:bold">
                    Courses</h3>
                <div class="card-tools">
                    <a class="btn btn-primary" href="{{route('university.courses.create')}}">
                        <i class="fas fa-plus circle-left mr-2"></i>
                        Request Courses
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
                            <td>{{$course->category->name}}</td>
                            <td>
                                <div style="width: 100px; height: 100px; overflow: hidden;">
                                    <img src="{{ asset($course->image) }}" alt="Course Image" style="width: 100%; height: auto; object-fit: cover;">
                                  </div> 
                            </td>
                            <td>
                                @if ($course->status==1)
                                <span class="badge badge-primary">Active</span>
                                @else
                                <span class="badge badge-danger">Inactive</span>
                                @endif
                            </td>
                           
                            <td>

                                <a class="btn btn-secondary" href="{{route('university.courses.show',$course)}}"><i class="fas fa-eye"></i>Show</a>
                                <a class="btn btn-warning" href="{{route('university.courses.edit',$course)}}"><i class="fas fa-edit"></i>Edit</a>
                                <form class="d-inline" action="{{route('university.courses.destroy',$course)}}" method="post">
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
<script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
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
  
</script>
@endsection