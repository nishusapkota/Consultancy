@extends('admin.layout')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-secondary">
                    <h3 class="card-title" style="font-size:1.3rem;line-height:1.8;
        font-weight:bold">
                        University Request</h3>
                    <div class="card-tools">
                        {{-- <a class="btn btn-primary" href="{{route('admin.course.create')}}">
                        <i class="fas fa-plus circle-left mr-2"></i>
                        Add Course
                    </a> --}}
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
                                <th>University</th>
                                <th>Requested Uni_name</th>
                                <th>University Address</th>
                                <th>Action</th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach ($reqChanges as $reqChange)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    
                                    <td>{{ $reqChange->university->uname }}</td>
                                    <td>{{ $reqChange->uname }}</td>
                                    <td>{{ $reqChange->address}}</td>

                                    <td>
                                        <a href="{{ route('admin.uni-requested-university.show', $reqChange->id) }}"><button
                                            class="btn btn-secondary">
                                            <i class="fas fa-save"></i>Show</button></a>
                                            @if ($reqChange->fee_structure)
                        
                                            <a class="btn btn-primary" target="_blank"
                                            href="{{ asset($reqChange->fee_structure) }}">Fee Structure</a>
                                            @endif

                                        <a href="{{ route('admin.uni-requested-university.update', $reqChange->id) }}"><button
                                                class="btn btn-success">
                                                <i class="fas fa-save"></i>Approve</button></a>
                                        <form class="d-inline" action="{{ route('admin.uni-requested-university.destroy', $reqChange) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger show_confirm" data-toggle="tooltip" title='Delete'>
                                                <i class="fas fa-trash"></i>Disapprove</button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>

                </div>
            </div>


                    
                </table>

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