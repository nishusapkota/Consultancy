@extends('admin.layout')
@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header bg-secondary">
        <h3 class="card-title" style="font-size:1.3rem;line-height:1.8;font-weight:bold">
          Edit User</h3>
        <div class="card-tools">
          <a class="btn btn-primary" href="{{ route('admin.user.index') }}">
            <i class="fas fa-arrow-circle-left mr-2"></i>
            Go Back
          </a>
        </div>
      </div>

      <div class="card-body">
        <form method="post" action="{{ route('admin.user.update', $user) }}" enctype="multipart/form-data">
          @if($errors->any())
          <div class="alert alert-danger">
            <button class="close" data-dismiss="alert">X</button>
            {{ $errors->first() }}
          </div>
          @endif
          @csrf
          @method('PUT')

          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}">
            @error('name')
            <small class="form-text text-danger">
              {{ $message }}</small>
            @enderror
          </div>
          
          
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}">
            @error('email')
            <small class="form-text text-danger">
              {{ $message }}</small>
            @enderror
          </div>

          <div class="form-group">
            <label for="username">UserName</label>
            <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" value="{{ $user->username }}">
            @error('username')
            <small class="form-text text-danger">
              {{ $message }}</small>
            @enderror
          </div> 

          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}">
            @error('password')
            <small class="form-text text-danger">
              {{ $message }}
            </small>
            @enderror
          </div>

          <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" value="{{ old('password_confirmation') }}">
            @error('password_confirmation')
            <small class="form-text text-danger">
              {{ $message }}
            </small>
            @enderror
          </div> 

       
         

          

         

         


          <button class="btn btn-primary">
            <i class="fas fa-save mr-2"></i>
            Update
          </button>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection