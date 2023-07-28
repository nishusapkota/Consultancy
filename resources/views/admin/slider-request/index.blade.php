@extends('admin.layout')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-secondary">
                    <h3 class="card-title" style="font-size:1.3rem;line-height:1.8;
        font-weight:bold">
                        Request University Sliders</h3>
                    {{-- <div class="card-tools">
                        <a class="btn btn-primary" href="{{ route('admin.request-certificate.create') }}">
                            <i class="fas fa-plus circle-left mr-2"></i>

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
                                <th>Slider</th>
                                <th>Action</th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach ($sliders as $slider)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>
                                        @if (in_array($slider->ext, ['jpg', 'jpeg', 'png']))
                                        <img src="{{ asset($slider->image) }}" alt="Current Image"
                                            style="max-width: 200px;">
                                    @elseif (in_array($slider->ext, ['mp4', 'mov', 'mkv']))
                                        <video width="320" height="240" controls>
                                            <source src="{{ asset($slider->image) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    @endif
                                    </td>

                                    <td>
                                        <a href="{{route('admin.uni-requested-slider.update',$slider->id)}}"><button class="btn btn-success">
                                            <i class="fas fa-save"></i>Approve</button></a> 
                                      
                                        <form class="d-inline"
                                            action="{{route('admin.uni-requested-slider.destroy',$slider->id)}}" method="post">
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
  