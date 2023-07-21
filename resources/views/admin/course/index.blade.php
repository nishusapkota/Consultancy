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
                                <input data-id="{{$course->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $course->status ? 'checked' : '' }}> 
                             </td>

                            <td>

                                <a class="btn btn-secondary" href="{{route('admin.courses.show',$course)}}"><i class="fas fa-eye"></i>Show</a>
                                <a class="btn btn-warning" href="{{route('admin.courses.edit',$course)}}"><i class="fas fa-edit"></i>Edit</a>
                                <form class="d-inline" action="{{route('admin.courses.destroy',$course)}}" method="post">
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

      $(function() { 
           $('.toggle-class').change(function() { 
           var status = $(this).prop('checked') == true ? 1 : 0;  
           var course_id = $(this).data('id');  
           $.ajax({ 
    
               type: "GET", 
               dataType: "json", 
               url: '/changeStatus', 
               data: {'status': status, 'course_id': course_id}, 
               success: function(data){ 
               console.log(data.success) 
            } 
         }); 
      }) 
   }); 
  
</script>
@endsection
  