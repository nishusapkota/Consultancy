@extends('admin.layout')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-secondary">
                <h3 class="card-title" style="font-size:1.3rem;line-height:1.8;
        font-weight:bold">
                   Show University Request</h3>
                <div class="card-tools">
                <a class="btn btn-primary" href="{{route('admin.uni-requested-university.index')}}">
            <i class="fas fa-arrow-circle-left mr-2"></i>
            Go Back
          </a>
                </div>
            </div>

            <div class="card-body">
            <table class="table table-bordered table-condensed" style="width:100%">
                <tr>
                    <th>ID</th>
                    <td>{{$reqUniversity->id}}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{$reqUniversity->uname}}</td>
                </tr>
                
                <tr>
                    <th>Address</th>
                    <td>{{$reqUniversity->address}}</td>
                </tr>

                <tr>
                    <th>Email</th>
                    <td>{{$reqUniversity->email}}</td>
                </tr>

                <tr>
                    <th>Image</th>
                    <td>
                        <div style="width: 100px; height: 100px; overflow: hidden;">
                            <img src="{{ asset($reqUniversity->image) }}" alt="University Image" style="width: 100%; height: auto; object-fit: cover;">
                          </div> 
                    </td>
                </tr>

                <tr>
                    <th>Details</th>
                    <td>{!!$reqUniversity->details!!}</td>
                </tr>

            </table>
              

            </div>
        </div>



    </div>
</section>
@endsection