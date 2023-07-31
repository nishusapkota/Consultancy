@extends('admin.layout')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-secondary">
                <h3 class="card-title" style="font-size:1.3rem;line-height:1.8;
        font-weight:bold">
                    enquiries</h3>
                    <div class="card-tools">
                        <a class="btn btn-primary" href="{{route('admin.export-enquiry')}}">
                         
                            Export Excel
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
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th>Course</th>
                            <th>University</th>
                            <th>Action</th>
                            
                        </tr>

                    </thead>
                    <tbody>
                       
                        @foreach ($enquiries as $enquiry )
                        {{-- @dd($enquiry->name) --}}
                        <tr>

                            <td>{{$loop->index+1}}</td>
                            <td>{{$enquiry->name}}</td>
                            <td>{{$enquiry->phone}}</td>
                            <td>{{$enquiry->email}}</td>
                            
                            <td>{{ $enquiry->level? $enquiry->level->name : null}}</td>
                            <td>{{$enquiry->course?$enquiry->course->name:null}}</td>
                            <td>{{$enquiry->university?$enquiry->university->uname:null}}</td>
                            <td>

                                {{-- <a class="btn btn-secondary" href="{{route('admin.course.show',$course)}}"><i class="fas fa-eye"></i>Show</a>
                                <a class="btn btn-warning" href="{{route('admin.course.edit',$course)}}"><i class="fas fa-edit"></i>Edit</a> --}}
                                <form class="d-inline" action="{{route('admin.delete.studentEnquiry',$enquiry)}}" method="post">
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