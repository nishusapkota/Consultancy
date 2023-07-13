@extends('frontend.layouts.master')
@section('title', 'Home')
@section('header')
    @include('frontend.layouts.headers.otherPageHeader')
@endsection
@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@section('content')
    <!--Page Title-->
    <section class="page-title style-three centred"
        style="background-image: {{ asset('frontend/images/background/page-title-5.jpg') }}">
        <div class="auto-container">
            <div class="content-box clearfix">
                <h1>{{ $college->uname }}</h1>
                {{-- <ul class="bread-crumb clearfix">
      <li><a href="index.html">Home</a></li>
      <li>College Details</li>
    </ul> --}}
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- main0-content-container -->
    <section class="sidebar-page-container details-content">
        <div class="auto-container px-lg-3 px-md-2 px-0">
            <div class="row clearfix">
                <div class="col-lg-7 col-md-12 col-sm-12 content-side">
                    <div class="blog-details-content">
                        <div class="sec-title style-two pull-left">
                        
                            <h2>{{$college->uname}}</h2>
                        </div>
                        <figure class="image-box">
                            <img src="{{ asset($college->image) }}" class="mb-4" alt="" />
                            <!-- <span class="category">business</span> -->
                        </figure>
                        <div class="inner-box">
                            <!-- <ul class="post-info clearfix">
                                  <li><i class="far fa-user"></i><a href="blog-classic.html">Admin</a></li>
                              </ul> -->
                            <div class="text">
                                {!! $college->details !!}
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12">

                    <div>
                        <h3 class="mb-4 mt-3">Fill Out Your Form</h3>

                        <form method="post" action="{{route('enquiry.post')}}">
                            @csrf
                            <div class="form-group">
                                <input type="text" placeholder="Your Name"  name="name" class="@error('name') is-invalid @enderror"" required/>
                                @error('name')
                                    <small class="form-text text-danger">
                                        {{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="email" placeholder="Email address"  name="email" class="@error('email') is-invalid @enderror"" required/>
                                @error('email')
                                    <small class="form-text text-danger">
                                        {{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="tel" placeholder="Phone"name="contact"  class="@error('contact') is-invalid @enderror" required/>
                                @error('contact')
                                    <small class="form-text text-danger">
                                        {{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="tel" placeholder="Address"name="address"  class="@error('address') is-invalid @enderror" required/>
                                @error('address')
                                    <small class="form-text text-danger">
                                        {{ $message }}</small>
                                @enderror
                            </div>
                            <input name="university_id" type="text" value="{{ $college->id }}" hidden required />
                            <div class="form-group">
                                <select name="level_id" class="@error('level_id') is-invalid @enderror" required >
                                    <option selected value="">Select Level</option>
                                    @foreach ($levels as $course)
                                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                                    @endforeach
                                </select>
                                @error('level_id')
                                    <small class="form-text text-danger">
                                        {{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <select name="course_id" class="@error('course_id') is-invalid @enderror" required>
                                    <option selected value="" >Select Course</option>
                                    @foreach ($courses as $level)
                                        <option value="{{ $level->id }}">{{ $level->name }}</option>
                                    @endforeach
                                </select>
                                @error('course_id')
                                    <small class="form-text text-danger">
                                        {{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea placeholder="Message" name="message" class="@error('name') is-invalid @enderror"" required></textarea>
                                @error('message')
                                    <small class="form-text text-danger">
                                        {{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group message-btn">
                                <button type="submit" class="theme-btn style-one">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="team-section">
        <div class="auto-container px-lg-3 px-md-2 px-0">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 content-side">
                    <div class="upper-box clearfix">
                        <div class="sec-title style-two pull-left">
                            <h2>Our Courses</h2>
                        </div>

                    </div>
                    <div class="four-item-carousel owl-carousel owl-theme owl-nav-none owl-dot-style-one">
                        {{-- @dd($courses) --}}
                        @foreach ($courses as $course)
                            <div class="team-block-one">
                                <div class="inner-box">
                                    <figure class="image-box"><img src="{{ asset($course->image) }}" alt="">
                                    </figure>
                                    <div class="lower-content">
                                        <div class="content-box">
                                            <h3 class="course-title"><a
                                                    href="{{ route('course-detail',$course->name) }}">{{ $course->name }}</a>
                                            </h3>
                                            <span class="designation">(
                                                {{ $course->category->name }}
                                                )</span>
                                        </div>
                                        <div class="ovellay-box">
                                            <a href="{{ route('course-detail',$course->name) }}"
                                                class="theme-btn style-one">View Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach



                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- main-content-container end -->
@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        @if(Session::has('success'))
            toastr.success('{{ Session::get('success') }}')
            @endif

    </script>
@endpush
