@extends('frontend.layouts.master')
@section('title', 'Courses')
@section('header')
    @include('frontend.layouts.headers.otherPageHeader')
@endsection
@section('content')
    <!--Page Title-->
    <section class="page-title centred" style="background-image:  {{asset('frontend/images/background/page-title-3.jpg')}}}">
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
                    <div class="col-md-6 col-sm-12 title-column">
                        <div class="sec-title right">
                            <h5>What we provides</h5>
                            <h2>Get Exceptional <br />Education For Knowledge</h2>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 text-column">
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
                                    @foreach ($levels as $level)
                                    <label class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadio"
                                            value="{{$level->id}}" />
                                        <span class="form-check-label"> {{$level->name}} </span>
                                    </label> 
                                        @endforeach
                                 
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
                                        @foreach ($courses as $course)
                                        <label class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{$course->id}}" />
                                            <span class="form-check-label">{{$course->name}}</span>
                                        </label>
                                        @endforeach
                                        
                                        
                                        
                                        
                                        
    
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
                        <img src="{{ asset($course->image) }}" alt="" />
                    </figure>
                    <div class="lower-content">
                        <div class="content-box">
                            <h3 class="course-title">
                                <a href="{{ route('course-detail', Crypt::encrypt($course->id)) }}">{{$course->name}}
                                </a>
                            </h3>
                            <span class="designation">({{$course->category->name}})</span>
                        </div>
                        <div class="ovellay-box">
                            <a href="{{ route('course-detail', Crypt::encrypt($course->id)) }}" class="theme-btn style-one">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
              @endforeach
                
                

            </div>
        </div>
    </section>
    <!-- service-section end -->

    <!-- form-section -->
    <section class="support-section service-page-1 mt-5">
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
                                        @foreach ($levels as $level)
                                        <option value="{{$level->id}}">{{$level->name}}</option>
                                        @endforeach
                                        
                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select>
                                        <option selected disabled>Select Course</option>
                                        @foreach ($courses as $course)
                                        <option value="{{$course->id}}">{{$course->name}}</option>
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
