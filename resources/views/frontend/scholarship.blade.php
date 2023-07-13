@extends('frontend.layouts.master')
@section('title', 'Courses')
@section('header')
    @include('frontend.layouts.headers.otherPageHeader')
@endsection
@push('style')
    <style>
        .card-header{
            background: #0275d8;
        }
        .card-header h6{
            color: white;
        }
    </style>
@endpush
@section('content')
    <!--Page Title-->
    <section class="page-title centred" style="background-image:  {{asset('frontend/images/background/page-title-3.jpg')}}}">
        <div class="auto-container">
            <div class="content-box clearfix">
                <h1>Our Scholarships</h1>
                {{-- <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('courses') }}">Home</a></li>
                    <li>Courses</li>
                </ul> --}}
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <section class="university-section">
        <div class="university-container mt-5">
            <div class="parent-uni-container">
        @foreach ($scholarships as $scholarship)
        <div class="uni-container">
            <div class="news-block-one inner-uni">
        
                <div class="rounded inner-div">
                    <figure class="image-box"><a href="{{route('scholarship-detail',$scholarship->title)}}"><img src="{{asset($scholarship->image)}}" alt="" class="uni-image"></a></figure>
                    <div class="lower-content uni-lower-content">
                        <ul class="post-info">
                            {{-- <li>ESTD. 1997</li> --}}
                        </ul>
                        <h3 class="uni-title-main"><a href="{{route('scholarship-detail', $scholarship->title)}}"  class="uni--title">{{$scholarship->title}}</a></h3>
                        <!-- <p>Exea conse quat duis irurey dolor sed reprehen derit volupta velit cilum lorem incididunt labore sed magna exceptur aliqua.</p> -->
                        <div class="link view-course"><a href="{{route('scholarship-detail', $scholarship->title)}}"><i class="fas fa-arrow-right uni-icon"></i><span>View detail</span></a></div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
                    
        
        
            </div>
        </div>
        </section>

    <!-- form-section -->
    {{-- <section class="support-section service-page-1 mt-5">
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
                                    <select name="level_id" id="level_id" required> 
                                        <option selected value="" >Select Level</option>
                                        @foreach ($levels as $level)
                                        <option value="{{$level->id}}">{{$level->name}}</option>
                                        @endforeach
                                        
                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="course_id" id="level_id" required>
                                        <option selected value="" >Select Course</option>
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
    </section> --}}

@endsection
@push('script')
    
@endpush
