@extends('admin.layout')
@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header bg-secondary">
        <h3 class="card-title" style="font-size:1.3rem;line-height:1.8;
        font-weight:bold">
          Show user</h3>
        <div class="card-tools">
          <a class="btn btn-primary" href="{{route('admin.user.index')}}">
            <i class="fas fa-arrow-circle-left mr-2"></i>
            Go Back
          </a>
        </div>
      </div>

      <div class="card-body">
        <table class="table table-bordered table-condensed" style="width:50%">
          <tr>
            <th>ID</th>
            <td>{{$user->id}}</td>
          </tr>
          <tr>
            <th>Name</th>
            <td>{{$user->name}}</td>
          </tr>
          <tr>
            <th>Email</th>
            <td>{{$user->email}}</td>
          </tr>
          <tr>
            <th>Username</th>
            <td>
              {{$user->username}}
            </td>
          </tr>
          <tr>
            <th>University</th>
            <td>@if ($user->university)
              {{ $user->university->name }}
          @else
              No University Assigned
          @endif</td>
          </tr>
          
        </table>


      </div>
    </div>



  </div>
</section>
@endsection