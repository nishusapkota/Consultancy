@extends('admin.layout')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-secondary">
                <h3 class="card-title" style="font-size:1.3rem;line-height:1.8;
        font-weight:bold">
                    Show Category</h3>
                <div class="card-tools">
                    <a class="btn btn-primary" href="{{route('admin.course-category.create')}}">
                        <i class="fas fa-plus circle-left mr-2"></i>
                        Add Category
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
                <table class="table table-bordered table-condensed" style="width:50%">
                <tr>
                    <th>ID</th>
                    <td>{{$course_category->id}}</td>
                </tr>
                <tr>
                    <th>Category</th>
                    <td>{{$course_category->name}}</td>
                </tr>

            </table>

            </div>
        </div>



    </div>
</section>
@endsection