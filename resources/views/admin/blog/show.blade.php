@extends('admin.layout')

@section('sidebar')
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item menu-open">
            <a href="" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-file"></i>
                <p>Courses</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-file"></i>
                <p>Colleges</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-file"></i>
                <p>Universities</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.blog.create')}}" class="nav-link active">
                <i class="nav-icon fas fa-file"></i>
                <p>Blogs</p>
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
                   Show Blog</h3>
                <div class="card-tools">
                <a class="btn btn-primary" href="{{route('admin.blog.index')}}">
            <i class="fas fa-arrow-circle-left mr-2"></i>
            Go Back
          </a>
                </div>
            </div>

            <div class="card-body">
            <table class="table table-bordered table-condensed" style="width:50%">
                <tr>
                    <th>ID</th>
                    <td>{{$blog->id}}</td>
                </tr>
                <tr>
                    <th>Title</th>
                    <td>{{$blog->title}}</td>
                </tr>
                <tr>
                    <th>Slug</th>
                    <td>{{$blog->slug}}</td>
                </tr>
                <tr>
                    <th>Short Description</th>
                    <td>{{$blog->short_description}}</td>
                </tr>
                <tr>
                    <th>Body</th>
                    <td>{{$blog->body}}</td>
                </tr>
                <tr>
                    <th>Extra</th>
                    <td>{{$blog->extra}}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{$blog->status}}</td>
                </tr>

            </table>
              

            </div>
        </div>



    </div>
</section>
@endsection