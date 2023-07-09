@extends('frontend.layouts.master')
@section('title', 'Courses')
@section('header')
    @include('frontend.layouts.headers.otherPageHeader')
@endsection
@section('content')
    <!--Page Title-->
    <section class="page-title centred" style="background-image: {{ asset('frontend/images/background/page-title-2.jpg') }}">
        <div class="auto-container">
            <div class="content-box clearfix">
                <h1>Our Provided Course</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('courses') }}">Home</a></li>
                    <li>Courses</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- service-section -->
    <section class="service-section">
        <div class="auto-container">
            <div class="title-box">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-6 col-sm-12 title-column">
                        <div class="sec-title right">
                            <h5>What we provides</h5>
                            <h2>Get Exceptional <br />Education For Knowledge</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 text-column">
                        <div class="text">
                            <p>
                                Tempor incididunt ut labore et dolore magna aliquat enim
                                veniam quis nostrud exercitation ullamco laboris nis aliquip
                                consequat duis aute irure dolor voluptate.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="custom-component">
            <div class="filter-component">
                <div class="container-lg filter-container">
                    <h1 class="filter-title">Filter</h1>

                    <div class="card">
                        <article class="card-group-item">
                            <header class="card-header">
                                <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample2" role="button"
                                    aria-expanded="false" aria-controls="collapseExample">
                                    <h6 class="title">Level</h6>
                                </a>
                            </header>
                            <div class="filter-content collapse" id="collapseExample2">
                                <div class="card-body">
                                    <label class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadio"
                                            value="bachelor" />
                                        <span class="form-check-label"> Bachelor </span>
                                    </label>
                                    <label class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadio" value="master" />
                                        <span class="form-check-label"> Masters </span>
                                    </label>
                                    <label class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadio"
                                            value="doctorate" />
                                        <span class="form-check-label">
                                            Doctorate
                                        </span>
                                    </label>
                                    <label class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadio" value="phd" />
                                        <span class="form-check-label">
                                            PhD
                                        </span>
                                    </label>
                                </div>
                                <!-- card-body.// -->
                            </div>
                        </article>
                        <!-- card-group-item.// -->

                        <article class="card-group-item">
                            <header class="card-header">
                                <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button"
                                    aria-expanded="false" aria-controls="collapseExample">
                                    <h6 class="title">Courses</h6>
                                </a>
                            </header>
                            <div class="filter-content collapse" id="collapseExample">
                                <div class="card-body">
                                    <form>
                                        <label class="form-check">
                                            <input class="form-check-input" type="checkbox" value="bba" />
                                            <span class="form-check-label"> BBA </span>
                                        </label>
                                        <!-- form-check.// -->
                                        <label class="form-check">
                                            <input class="form-check-input" type="checkbox" value="mba" />
                                            <span class="form-check-label"> MBA </span>
                                        </label>
                                        <!-- form-check.// -->
                                        <label class="form-check">
                                            <input class="form-check-input" type="checkbox" value="msit" />
                                            <span class="form-check-label"> MSIT </span>
                                        </label>
                                        <label class="form-check">
                                            <input class="form-check-input" type="checkbox" value="dba" />
                                            <span class="form-check-label"> DBA </span>
                                        </label>
                                        <!-- form-check.// -->
                                        <label class="form-check">
                                            <input class="form-check-input" type="checkbox" value="be" />
                                            <span class="form-check-label"> BE E&C </span>
                                        </label>
                                        <!-- form-check.// -->
                                        <!-- form-check.// -->
                                    </form>
                                </div>
                                <!-- card-body.// -->
                            </div>
                        </article>
                        <!-- card-group-item.// -->
                    </div>
                    <!-- card.// -->

                </div>
            </div>

            <div class="course-component">
              @foreach ($courses as $course )
              <div class="team-block-one">
                <div class="inner-box">
                    <figure class="image-box">
                        <img src="{{ asset('$course->image') }}" alt="" />
                    </figure>
                    <div class="lower-content">
                        <div class="content-box">
                            <h3 class="course-title">
                                <a href="{{ route('course-detail',) }}">Bachelor of Engineering in Electronics and
                                    Communication
                                </a>
                            </h3>
                            <span class="designation">(B.E. E&C)</span>
                        </div>
                        <div class="ovellay-box">
                            <a href="{{ route('course-detail') }}" class="theme-btn style-one">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
              @endforeach
                
                <div class="team-block-one">
                    <div class="inner-box">
                        <figure class="image-box">
                            <img src="{{ asset('frontend/images/courses/BBA.jpg') }}" alt="" />
                        </figure>
                        <div class="lower-content">
                            <div class="content-box">
                                <h3 class="course-title">
                                    <a href="{{ route('course-detail') }}">Bachelors in Business Administration</a>
                                </h3>
                                <span class="designation">(BBA)</span>
                            </div>
                            <div class="ovellay-box">
                                <a href="{{ route('course-detail') }}" class="theme-btn style-one">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="team-block-one">
                    <div class="inner-box">
                        <figure class="image-box">
                            <img src="{{ asset('frontend/images/courses/MBA.jpg') }}" alt="" />
                        </figure>
                        <div class="lower-content">
                            <div class="content-box">
                                <h3 class="course-title">
                                    <a href="{{ route('course-detail') }}">Master in Business Administration</a>
                                </h3>
                                <span class="designation">(MBA)</span>
                            </div>
                            <div class="ovellay-box">
                                <a href="{{ route('course-detail') }}" class="theme-btn style-one">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="team-block-one">
                    <div class="inner-box">
                        <figure class="image-box">
                            <img src="{{ asset('frontend/images/courses/BBA.jpg') }}" alt="" />
                        </figure>
                        <div class="lower-content">
                            <div class="content-box">
                                <h3 class="course-title">
                                    <a href="{{ route('course-detail') }}">Master of Science in Information Technology</a>
                                </h3>
                                <span class="designation">(MSIT)</span>
                            </div>
                            <div class="ovellay-box">
                                <a href="{{ route('course-detail') }}" class="theme-btn style-one">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="team-block-one">
                    <div class="inner-box">
                        <figure class="image-box">
                            <img src="{{ asset('frontend/images/courses/B.E E&C.jpg') }}" alt="" />
                        </figure>
                        <div class="lower-content">
                            <div class="content-box">
                                <h3 class="course-title">
                                    <a href="{{ route('course-detail') }}">Bachelor of Engineering in Electronics and
                                        Communication
                                    </a>
                                </h3>
                                <span class="designation">(B.E. E&C)</span>
                            </div>
                            <div class="ovellay-box">
                                <a href="{{ route('course-detail') }}" class="theme-btn style-one">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- service-section end -->

    <!-- form-section -->
    <section class="support-section service-page-1">
        <div class="auto-container">
            <div class="inner-container">
                <div class="row clearfix">
                    <div class="col-lg-7 col-md-6 col-sm-12 inner-column">
                        <div class="inner-box">
                            <div class="sec-title light left">
                                <h5>enquiry</h5>
                                <h2>Contact Us</h2>
                                <p>
                                    If you have any queries related to our service then please
                                    feel free to contact us anytime.
                                </p>
                            </div>

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
                                <div class="form-group">
                                    <select>
                                        <option selected disabled>Select Level</option>
                                        <option>Bachelor</option>
                                        <option>Masters</option>
                                        <option>Doctorate</option>
                                        <option>PhD</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select>
                                        <option selected disabled>Select Course</option>
                                        <option>BBA</option>
                                        <option>MBA</option>
                                        <option>DBA</option>
                                        <option>MSIT</option>
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
                    <div class="col-lg-5 col-md-6 col-sm-12 info-column">
                        <div class="info-inner">
                            <figure class="image-box">
                                <img src="{{ asset('frontend/images/resource/info-1.jpg') }}" alt="" />
                            </figure>
                            <div class="info-box">
                                <figure class="info-logo">
                                    <img src="{{ asset('frontend/images/icons/info-logo.png') }}" alt="" />
                                </figure>
                                <div class="icon-box"><i class="fas fa-phone"></i></div>
                                <h2><a href="tel:18003698527">(+977) 9841111111</a></h2>
                                <div class="email">
                                    <a href="mailto:support@my-domain.net">support@my-domain.net</a>
                                </div>
                                <ul class="list-item clearfix">
                                    <li>.&nbsp;<a href="index.html">Experienced</a>&nbsp;.</li>
                                    <li><a href="index.html">Specialized</a>&nbsp;.</li>
                                    <li><a href="index.html">Professional</a>&nbsp;.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
