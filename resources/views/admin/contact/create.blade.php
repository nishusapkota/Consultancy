@extends('admin.layout')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-secondary">
                    <h3 class="card-title" style="font-size:1.3rem;line-height:1.8;
        font-weight:bold">
                        Add New Contact</h3>
                    <div class="card-tools">
                        <a class="btn btn-primary" href="{{ route('admin.contact.index') }}">
                            <i class="fas fa-arrow-circle-left mr-2"></i>
                            Go Back
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <form method="post" action="{{ route('admin.contact.store') }}" enctype="multipart/form-data">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <button class="close" data-dismiss="alert">X</button>
                                {{ $errors->first() }}
                            </div>
                        @endif
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title"
                                class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                            @error('title')
                                <small class="form-text text-danger">
                                    {{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" id="address"
                                class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}">
                            @error('address')
                                <small class="form-text text-danger">
                                    {{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="short_description">Description</label>
                            <textarea name="short_description" id="short_description"
                                class="form-control @error('short_description')is-invalid @enderror" rows="4"></textarea>
                            @error('short_description')
                                <small class="form-text text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>



                        <div class="form-group">
                            <label for="phone[0]">Phone</label>
                            <input type="text" name="phone[0]" placeholder="Enter first phone number" id="phone[0]"
                                class="form-control @error('phone.0') is-invalid @enderror" required
                                value="{{ old('phone.0') }}">
                            @error('phone.0')
                                <small class="form-text text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                            <br>
                            <input type="text" name="phone[1]" placeholder="Enter second phone number" id="phone[1]"
                                class="form-control @error('phone.1') is-invalid @enderror" value="{{ old('phone.1') }}">
                            @error('phone.1')
                                <small class="form-text text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email[0]">Email</label>
                            <input type="text" name="email[0]" placeholder="Enter first email address" id="email[0]"
                                class="form-control @error('email.0') is-invalid @enderror" required
                                value="{{ old('email.0') }}">
                            @error('email.0')
                                <small class="form-text text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                            <br>
                            <input type="text" name="email[1]" placeholder="Enter second email address" id="email[1]"
                                class="form-control @error('email.1') is-invalid @enderror" value="{{ old('email.1') }}">
                            @error('email.1')
                                <small class="form-text text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>




                        <button class="btn btn-primary">
                            <i class="fas fa-save mr-2"></i>
                            Save
                        </button>
                    </form>
                </div>
            </div>



        </div>
    </section>
@endsection
