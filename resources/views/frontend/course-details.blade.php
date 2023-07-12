@extends('frontend.layouts.master')
@section('title', 'Course-Detail')
@section('header')
    @include('frontend.layouts.headers.otherPageHeader')
@endsection
@section('content')

    <!--Page Title-->
    <section class="page-title style-three centred"
        style="background-image: {{ asset('frontend/images/background/page-title-5.jpg') }};">
        <div class="auto-container">
            <div class="content-box clearfix">
                <h1>{{ $course->name }}</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li>Course Details</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->


    <!-- sidebar-page-container -->
    <section class="sidebar-page-container details-content">
        <div class="auto-container px-3 px-xxl-5">
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                    <div class="blog-details-content">
                        <div class="custom-class">
                            <h2>{{ $course->name }}</h2>

                            <h3>
                              @if ($course->level_id)
                                        {{ $course->levels->name }} ,  
                                @endif
                                @if ($course->cat_id)
                                        {{ $course->category->name }}   
                                @endif
                            </h3>
                        </div>
                        <figure class="image-box">
                            <img src="{{ asset($course->image) }}" class="mb-4" alt="">
                            <!-- <span class="category">business</span> -->
                        </figure>
                        <div class="inner-box">
                            <!-- <ul class="post-info clearfix">
                                <li><i class="far fa-user"></i><a href="blog-classic.html">Admin</a></li>
                            </ul> -->
                            <div class="text">
                                {!!$course->description!!}
                            </div>
                            

                        </div>

                    </div>
                </div>

                <div class="col-lg-4 col-md-12 col-sm-12">
                  <div>
                    <h3 class="mb-4 mt-3">Fill Your Form</h3>
    
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
                        <input type="course_id" placeholder="Email address" value="{{ $course->id }}" hidden />
                        <div class="form-group">
                            <select name="level_id">
                                <option selected disabled>Select Level</option>
                                @foreach ($levels as $level)
                                    <option value="{{ $level->id }}">{{ $level->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="university_id">
                                <option selected disabled>Select University</option>
                                @foreach ($university as $course)
                                    <option value="{{ $course->id }}">{{ $course->uname }}</option>
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
              </div>

        </div>
        </div>

       
    </section>
    <!-- sidebar-page-container end -->

@endsection
