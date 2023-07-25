@extends('admin.layout')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-secondary">
                    <h3 class="card-title" style="font-size:1.3rem;line-height:1.8;
        font-weight:bold">
                        Home Slider</h3>
                    <div class="card-tools">
                        <a class="btn btn-primary" href="{{ route('admin.home.create') }}">
                            <i class="fas fa-plus circle-left mr-2"></i>
                            Add Home Slider
                        </a>
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
                                <th>S.N.</th>
                                <th>Title</th>
                                <th>Sub Heading</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>

                        </thead>
                        <tbody>
                        
                            @foreach ($sliders as $key=>$slider)
                           
                                <tr>
                                    <td>{{ $loop->index +1 }}</td>
                                    <td>{{ $slider->title }}</td>
                                    <td>{{ $slider->sub_heading  ?: 'null'}}</td>
                                    <td>{{ $slider->description  ?: 'null'}}</td>
                                    <td>
{{-- @dd($slider) --}}
                                        {{-- <a class="btn btn-secondary" href="{{ route('admin.home.show', $slider->id) }}"><i
                                                class="fas fa-eye"></i>Show</a> --}}
                                        <a class="btn btn-warning" href="{{ route('admin.home.edit', $slider->id) }}"><i
                                                class="fas fa-edit"></i>Edit</a>
                                        <form class="d-inline" action="{{ route('admin.home.destroy', $slider) }}" method="post">
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