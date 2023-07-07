@extends('admin.layout')
@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header bg-secondary">
        <h3 class="card-title" style="font-size:1.3rem;line-height:1.8;
        font-weight:bold">
          Users</h3>
        
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
              <th>Email</th>
              <th>Username</th>
              <th>Role</th>
              <th>University</th>
              <th>Action</th>
            </tr>

          </thead>
          <tbody>
            @foreach ($users as $user)
            <tr>
              <td>{{$user->id}}</td>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td>{{$user->username}}</td>
              <td>{{$user->role}}</td>
              <td>
                @if ($user->university)
                    {{ $user->university->name }}
                @else
                    No University Assigned
                @endif
            </td>
            
              <td>

                <a class="btn btn-secondary" href="{{route('admin.user.show',$user)}}"><i class="fas fa-eye"></i>Show</a>
                <a class="btn btn-warning" href="{{route('admin.user.edit',$user)}}"><i class="fas fa-edit"></i>Edit</a>
                

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