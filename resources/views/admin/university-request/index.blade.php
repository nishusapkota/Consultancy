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
                    {{session('success')}}
                </div>
                @endif
                <table class="table table-bordered">
                    <thead class="bg-primary">
                        <tr>
                            <th>ID</th>
                            <th>University</th>
                           <th>University Details</th>
                            <th>Action</th>
                        </tr>

                    </thead>
                    <tbody>
                        @forelse($reqChanges as $reqChange)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$reqChange->university->uname}}</td>
                            <td>{!!$reqChange->details!!}</td>
                           
                            <td>

                                
                                   
                                   <a href="{{route('admin.uni-requested-university.update',$reqChange->id)}}"><button class="btn btn-success">
                                    <i class="fas fa-save"></i>Approve</button></a> 
                                

                                <form class="d-inline" onclick="return confirm('Are you sure to disapprove this?')" action="{{route('admin.uni-requested-university.destroy',$reqChange)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">
                                      <i class="fas fa-trash"></i>Disapprove</button>
                                  </form>

                                

                            </td>
                        </tr>
                            
                        @empty
                            <tr>No data</tr>
                        @endforelse

                    </tbody>

                </table>

            </div>
        </div>



    </div>
</section>
@endsection