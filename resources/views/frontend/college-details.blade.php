@extends('frontend.layouts.master')
@section('title', 'Home')
@section('header')
    @include('frontend.layouts.headers.otherPageHeader')
@endsection
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

                        <form>
                            <div class="form-group">
                                <input type="text" placeholder="Your Name" />
                            </div>
                            <div class="form-group">
                                <input type="email" placeholder="Email address" />
                            </div>
                            <div class="form-group">
                                <input type="tel" placeholder="Phone" />
                            </div>
                            <input name="university_id" type="text" value="{{ $college->id }}" hidden />
                            <div class="form-group">
                                <select>
                                    <option selected disabled>Select Level</option>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select>
                                    <option selected disabled>Select Course</option>
                                    @foreach ($levels as $level)
                                        <option value="{{ $level->id }}">{{ $level->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <textarea placeholder="Message"></textarea>
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
