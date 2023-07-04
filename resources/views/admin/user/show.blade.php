@extends('admin.layout')
@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header bg-secondary">
        <h3 class="card-title" style="font-size:1.3rem;line-height:1.8;
        font-weight:bold">
          Show Level</h3>
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
            <td>{{$university->id}}</td>
          </tr>
          <tr>
            <th>Name</th>
            <td>{{$university->name}}</td>
          </tr>
          <tr>
            <th>Address</th>
            <td>{{$university->address}}</td>
          </tr>
          <tr>
            <th>Image</th>
            <td>
              <div style="width: 100px; height: 100px; overflow: hidden;">
                <img src="{{ asset($university->image) }}" alt="University Image" style="width: 100%; height: auto; object-fit: cover;">
              </div>
            </td>
          </tr>
          <tr>
            <th>Details</th>
            <td>{{$university->details}}</td>
          </tr>
          <tr>
            <th>Status</th>
            <td>{{$university->status}}</td>
          </tr>

        </table>


      </div>
    </div>



  </div>
</section>
@endsection