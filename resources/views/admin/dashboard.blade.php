@extends('admin.layout')
@section('header')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard v1</li>
        </ol>
      </div>
    </div>
  </div>
</div>
@endsection
@section('content')
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{$uni_count}}</h3>

            <p>University</p>
          </div>
          <div class="icon">
            <i class="fa fa-university"></i>
          </div>
          <a href="{{route('admin.university.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{$scholarship_count}}</h3>

            <p>Scholarship</p>
          </div>
          <div class="icon">
            <i class="fa fa-graduation-cap" aria-hidden="true"></i>
          </div>
          <a href="{{route('admin.scholarship.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>{{$course_count}}</h3>

            <p>Courses</p>
          </div>
          <div class="icon">
            <i class="fa fa-book" aria-hidden="true"></i>
          </div>
          <a href="{{route('admin.courses.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>{{$enquiry_count}}</h3>

            <p>Student Enquiry</p>
          </div>
          <div class="icon">
            <i class="fa fa-question-circle" aria-hidden="true"></i>
          </div>
          <a href="{{route('admin.indexStudentEnquiry')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>

  </div><!-- /.container-fluid -->
</section>
@endsection