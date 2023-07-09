@extends('admin.layout')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-secondary">
                <h3 class="card-title" style="font-size:1.3rem;line-height:1.8;
        font-weight:bold">
                   Show Enquiry</h3>
                <div class="card-tools">
                <a class="btn btn-primary" href="{{route('admin.student-enquiry.index')}}">
            <i class="fas fa-arrow-circle-left mr-2"></i>
            Go Back
          </a>
                </div>
            </div>

            <div class="card-body">
            <table class="table table-bordered table-condensed" style="width:50%">
                <tr>
                    <th>ID</th>
                    <td>{{$enquiry->id}}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{$enquiry->name}}</td>
                </tr>
                <tr>
                    <th>Contact</th>
                    <td>{{$enquiry->contact}}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{$enquiry->email}}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{$enquiry->address}}</td>
                </tr>
                
                <tr>
                    <th>Level</th>
                    <td>{{$enquiry->level->name}}</td>
                </tr>
                <tr>
                    <th>Course</th>
                    <td>{{$enquiry->course->name}}</td>
                </tr>
                <tr>
                    <th>University</th>
                    <td>{{$enquiry->university->uname}}</td>
                </tr>

            </table>
              

            </div>
        </div>



    </div>
</section>
@endsection