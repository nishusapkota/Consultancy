@extends('admin.layout')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-secondary">
                <h3 class="card-title" style="font-size:1.3rem;line-height:1.8;
        font-weight:bold">
                    Levels</h3>
                <div class="card-tools">
                    <a class="btn btn-primary" href="{{route('admin.level.create')}}">
                        <i class="fas fa-plus circle-left mr-2"></i>
                        Add Level
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
                            <th>Status</th>
                            <th>Action</th>
                        </tr>

                    </thead>
                    <tbody>
                        @foreach ($levels as $level )
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$level->name}}</td>
                            <td>
                                <button type="button" class=" btn btn-sm btn-toggle customSwitchsizemd {{ $level->status=='1' ? 'statuson' : ''  }} " data-toggle="button" data-id="{{$level->id}}" id="customSwitchsizemd">
                                    <div class="handle"></div>
                                </button>
                            </td>
                            <td>

                                <a class="btn btn-secondary" href="{{route('admin.level.show',$level)}}"><i class="fas fa-eye"></i>Show</a>
                                <a class="btn btn-warning" href="{{route('admin.level.edit',$level)}}"><i class="fas fa-edit"></i>Edit</a>
                                <form class="d-inline" action="{{route('admin.level.destroy',$level)}}" method="post">
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(function() {
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
                            url: "{{ url('admin/level/change-status') }}" + '/' + id,
                            success: function(data) {
                              
                            },
                            error: function(data) {
                              $(this).toggleClass("statuson");
                            }
                        });
                        Swal.fire({

                            title: 'Made Active!',
                            text: 'Level Status Have Been Changed Successfully.',
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