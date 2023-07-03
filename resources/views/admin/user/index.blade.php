@extends('admin.layout')

@section('sidebar')
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item menu-open">
      <a href="{{route('admin.')}}" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Dashboard
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon far fa-envelope"></i>
        <p>
          Courses
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview" style="display: none;">
        <li class="nav-item">
          <a href="{{Route('admin.course-category.index')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Category</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{Route('admin.course.index')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Course</p>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-file"></i>
        <p>Users</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route('admin.university.index')}}" class="nav-link active">
        <i class="nav-icon fas fa-file"></i>
        <p>Universities</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('admin.blog.index')}}" class="nav-link">
        <i class="nav-icon fas fa-file"></i>
        <p>Blogs</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="{{route('admin.level.index')}}" class="nav-link">
        <i class="nav-icon fas fa-file"></i>
        <p>Level</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="" class="nav-link">
        <i class="nav-icon fas fa-file"></i>
        <p>Student Enquiry</p>
      </a>
    </li>


  </ul>
</nav>
@endsection



@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header bg-secondary">
        <h3 class="card-title" style="font-size:1.3rem;line-height:1.8;
        font-weight:bold">
          Universities</h3>
        <div class="card-tools">
          <a class="btn btn-primary" href="{{route('admin.university.create')}}">
            <i class="fas fa-plus circle-left mr-2"></i>
            Add University
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
              <th>Address</th>
              <th>Image</th>
              <th>Detail</th>
              <th>Status</th>
              <th>Action</th>
            </tr>

          </thead>
          <tbody>
            @foreach ($universities as $university)
            <tr>
              <td>{{$university->id}}</td>
              <td>{{$university->name}}</td>
              <td>{{$university->address}}</td>
              <td>
                <div style="width: 100px; height: 100px; overflow: hidden;">
                  <img src="{{ asset($university->image) }}" alt="University Image" style="width: 100%; height: auto; object-fit: cover;">
                </div>
              </td>
              <td>{{$university->details}}</td>
              <td>{{$university->status}}</td>
              <td>

                <a class="btn btn-secondary" href="{{route('admin.university.show',$university)}}"><i class="fas fa-eye"></i>Show</a>
                <a class="btn btn-warning" href="{{route('admin.university.edit',$university)}}"><i class="fas fa-edit"></i>Edit</a>
                <form class="d-inline" onclick="return confirm('Are you sure to delete this?')" action="{{route('admin.university.destroy',$university)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger">
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