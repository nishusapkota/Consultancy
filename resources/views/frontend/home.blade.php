@extends('frontend.layouts.master')
@section('title', 'Home')
@section('header')
    @include('frontend.layouts.headers.homePageHeader')
@endsection
@push('style')
    <style>
        .aboutSLiderCss .owl-nav{
            display: none;
        }
    </style>
@endpush
@section('content')
    <!-- banner-section -->
    <section class="banner-section">
        <div class="banner-carousel owl-theme owl-carousel owl-dots-none autoplay-false">
            @foreach ($homeSlider as $item)
            @if ($item->extension=='jpg'||$item->extension=='png'||$item->extension=='PNG'||$item->extension=='jpeg'||$item->extension=='JPEG')
                
            <div class="slide-item ">
                <div class="image-layer" style="background-image: url('{{ asset($item->file) }}')">
                </div>
                <div class="auto-container">
                    <div class="content-box ">
                        <h5>{{$item->sub_heading}}</h5>
                        <h1>{{$item->title}}</h1>
                        <div class="btn-box">
                            <!-- <a href="index-6.html" class="user-btn"><i class="far fa-user"></i><span>Find a Consultant</span></a> -->
                            <p class="slider-text slider-content">{{$item->description}}</p>
                            <a href="{{ route('admit') }}" class="theme-btn style-one">Admit Now</a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if ($item->extension=='mp4'||$item->extension=='mkv'||$item->extension=='mov')
                
            <div class="video-slide-item">
                <section class="main-banner" id="top" data-section="section1">
                    <video autoplay muted loop id="bg-video">
                        <source src="{{ asset($item->file) }}" type="video/{{ $item->extension }}" />
                    </video>
                    <div class="video-overlay header-text">
                        <div class="video-slider-container">
                            <div class="video-slider-content">
                                <h5 style="color: white;">{{$item->sub_heading}}</h5>
                                <h1 class="video-content-title">{{$item->title}}</h1>
                                <p class="slider-text slider-content">{{$item->description}}
                                </p>
                                <div class="btn-box">
                                    <a href="{{ route('admit') }}" class="theme-btn style-one">Apply Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            @endif
        @endforeach 
           
        </div>
    </section>

    <!-- banner-section end -->


    <!-- about-section -->
    <section class="about-section bg-color-1">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-md-6 col-12">
                    <div class="banner-carousel aboutSLiderCss owl-theme owl-carousel owl-dots-none owl-autoplay-true owl-loop-true">

                        @foreach ($images as $image)
                            <div class="custom-slide-item ">
                                <div class="custom-image-layer" style="background: url('{{ asset($image->image) }}')">
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <div class="col-md-6 col-12 content-column">
                    <div id="content_block_one">
                        <div class="content-box">
                            <div class="sec-title left">
                                <h5>About Study India</h5>
                                <h2>Why study in India ?</h2>
                            </div>
                            <div class="text">
                                <p>{{ $about ? $about->description : null }}</p>
                            </div>
                            <div class="btn-box d-flex justify-content-center flex-nowrap">
                                <a href="{{ route('admit') }}" class="theme-btn style-one">Admit Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- about-section end -->
    <section class="team-section">
        <div class="auto-container">
            <div class="sec-title centred">
                <h2>University/Colleges</h2>
                <div class="sec-text">
                    <p class="blog-text" style="max-width:100%">Let us know your interest and we will find you the right institution</p>
                </div>
            </div>
            <div class="three-item-carousel owl-carousel owl-theme owl-nav-none owl-dot-style-one">
                @foreach ($universities as $university)
            <div class="uni-container">
                <div class="news-block-one inner-uni">

                    <div class="rounded inner-div">
                        <figure class="image-box"><img src="{{ asset($university->image) }}" alt="" class="uni-image"></figure>
                        <div class="lower-content uni-lower-content">
                            <h3 class="uni-title-main">{{ $university->uname }}</h3>
                            <div class="link view-course"><a
                                href="{{ route('college-detail',$university->uname) }}"
                                class="uni--title"><i
                                        class="fas fa-arrow-right uni-icon "></i><span>View Details</span></a></div>
                        </div>
                    </div>
                </div>
            </div>
           @endforeach
      </div>
        </div>
        <div class="btn-box d-flex align-items-center justify-content-center mt-4">
            <a href="{{ route('college') }}" class="theme-btn style-one mb-4">View all</a>
        </div>
    </section>







 <!--University section-->
 {{-- <section class="university-section">
    <div class="university-container">
        <div class="sec-title centred">
            <h2>University/Colleges</h2>
            <div class="sec-text">
                <p class="blog-text" style="max-width:100%">Let us know your interest and we will find you the right institution</p>
            </div>
        </div>
        <div class="three-item-carousel owl-carousel owl-theme owl-nav-none owl-dot-style-one">
            @foreach ($universities as $university)
            <div class="uni-container">
                <div class="news-block-one inner-uni">

                    <div class="rounded inner-div">
                        <figure class="image-box"><a href="college-details.html"><img src="{{ asset($university->universityImages->first->image->image) }}" alt="" class="uni-image"></a></figure>
                        <div class="lower-content uni-lower-content">
                            <h3 class="uni-title-main">{{ $university->uname }}</h3>
                            <div class="link view-course"><a
                                href="{{ route('college-detail',$university->uname) }}"
                                class="uni--title"><i
                                        class="fas fa-arrow-right uni-icon "></i><span>View Details</span></a></div>
                        </div>
                    </div>
                </div>
            </div>
           @endforeach
            
        </div>
        <div class="btn-box d-flex align-items-center justify-content-center mt-4">
            <a href="{{ route('college') }}" class="theme-btn style-one mb-4">View all</a>
        </div>
    </div>
</section> --}}
<!--University section end-->


    <!-- courses-section -->
    <section class="team-section">
        <div class="auto-container">
            <div class="upper-box clearfix">
                <div class="sec-title style-two centred">
                    <h5>Courses</h5>
                    <h2>Our Courses</h2>
                </div>  
            </div>
            <div class="four-item-carousel owl-carousel owl-theme owl-nav-none owl-dot-style-one courses">
                @foreach ($courses as $course)
                    <div class="team-block-one">
                        <div class="inner-box">
                            <figure class="image-box"><img src="{{ asset($course->image) }}" alt=""></figure>
                            <div class="lower-content">
                                <div class="content-box">
                                    <h3 class="course-title"><a href="{{ route('index') }}">{{ $course->name }}</a></h3>
                                    <span class="designation">
                                        @forelse ($course->levels as $level)
                                            @if ($loop->last)
                                                {{ $level->name }}
                                            @endif
                                            {{ $level->name }},
                                        @empty
                                        @endforelse
                                    </span>
                                </div>
                                <div class="ovellay-box">
                                    <a href="{{ route('course-detail', $course->name) }}"
                                        class="theme-btn style-one">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        <div class="btn-box d-flex align-items-center justify-content-center mt-4">
            <a href="{{ route('courses') }}" class="theme-btn style-one mb-4">View all</a>
        </div>
    </section>
    <!-- courses-section end -->


    <!-- scholarship-section -->
    <section class="project-style-four bg-color-1">
        <div class="auto-container">
            <div class="title-inner clearfix">
                <div class="sec-title style-four right centred">
                    <h5>our scholarships</h5>
                    <h2>Scholarship/Offers</h2>
                </div>
            </div>
            <div class="two-column-carousel owl-carousel owl-theme owl-nav-none scholarship">
                @foreach ($scholarships as $scholarship)
                <div class="project-block-three  ">
                    <div class="inner-box">
                        <figure class="image-box"><img src="{{ asset($scholarship->image) }}"
                                alt=""></figure>
                        <div class="lower-content">
                            <div class="inner">
                                <h3>{{$scholarship->title}}</h3>
                                <p>{{$scholarship->university->uname}}</p> 
                                <a href="{{ route('scholarship-detail',$scholarship->title) }}"><i class="fas fa-arrow-right"></i><span>Read
                                        More</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                
                
            </div>
        </div>
        <div class="btn-box d-flex align-items-center justify-content-center mt-4">
            <a href="{{ route('scholarship') }}" class="theme-btn style-one mb-4">View all</a>
        </div>
    </section>
    <!-- scholarship-section end -->

    <!-- blog-section -->
    <section class="news-section bg-color-1">
        <div class="auto-container">
            <div class="sec-title centred">
                <h5>Read the blogs</h5>
                <h2>Blog</h2>
                {{-- <p class="blog-text">Belis nisl adipiscing sapien sed malesu diame lacus eget erat Cras mollis scelerisqu
                    Nullam arcu liquam here was consequat.</p> --}}
            </div>
            <div class="row clearfix">
                @foreach ($blogs as $blog)
                    <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                        <div class="news-block-one wow fadeInUp animated animated" data-wow-delay="00ms"
                            data-wow-duration="1500ms">
                            <div class="inner-box">
                                <figure class="image-box"><a
                                        href="{{ route('blog-detail', $blog->title) }}"><img
                                            src="{{ asset($blog->image) }}" alt=""></a></figure>
                                <div class="lower-content">
                                    {{-- <ul class="post-info">
                                    <li>August 25, 2028</li>
                                </ul> --}}
                                    <h3>{{ $blog->title }}
                                    </h3>
                                    <p>{{ $blog->short_description }}</p>
                                    <div class="link"><a href="{{ route('blog-detail',$blog->title) }}"><i class="fas fa-arrow-right">
                                        </i><span>Read More</span></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach



            </div>
            <div class="btn-box blog-door">
                <a href="{{ route('blog') }}" class="theme-btn style-one">Read More</a>
            </div>
        </div>
    </section>
    <!-- news-section end -->
@endsection
