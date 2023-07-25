@extends('university.layout.master')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-secondary">
                <h3 class="card-title" style="font-size:1.3rem;line-height:1.8;
        font-weight:bold">
                    scholarships</h3>
                <div class="card-tools">
                    <a class="btn btn-primary" href="{{route('university.scholarship.create')}}">
                        <i class="fas fa-plus circle-left mr-2"></i>
                        Add scholarship
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
                            
                            <th>Image</th>
                            <th>University</th>
                           
                            <th>Action</th>
                        </tr>

                    </thead>
                    <tbody>
                        @foreach ($scholarships as $scholarship )
                        <tr>
                            <td>{{$scholarship->id}}</td>
                            <td>{{$scholarship->title}}</td>
                            <td>
                                <div style="width: 100px; height: 100px; overflow: hidden;">
                                    <img src="{{ asset($scholarship->image) }}" alt="Scholarship Image" style="width: 100%; height: auto; object-fit: cover;">
                                  </div> 
                            </td>
                            <td>{{$scholarship->university->uname}}</td>
                            
                            <td>

                                <a class="btn btn-secondary" href="{{route('university.scholarship.show',$scholarship)}}"><i class="fas fa-eye"></i>Show</a>
                                <a class="btn btn-warning" href="{{route('university.scholarship.edit',$scholarship)}}"><i class="fas fa-edit"></i>Edit</a>
                                <form class="d-inline" action="{{route('university.scholarship.destroy',$scholarship)}}" method="post">
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