@extends('frontend.layouts.master')
@section('title', 'Home')
@section('header')
    @include('frontend.layouts.headers.homePageHeader')
@endsection
@section('content')
    <!-- banner-section -->
    <section class="banner-section">
        <div class="banner-carousel owl-theme owl-carousel owl-dots-none autoplay-false">
            @foreach ($homeSlider as $item)
             
            
            @if ($item->extension=='jpg'||$item->extension=='JPG'||$item->extension=='png'||$item->extension=='PNG'||$item->extension=='jpeg'||$item->extension=='PNG'||$item->extension=='JPEG')
                
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
                            <a href="{{ route('apply') }}" class="theme-btn style-one">Admit Now</a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if ($item->extension=='mp4'||$item->extension=='MP4'||$item->extension=='MOV'||$item->extension=='movs')
                
            <div class="video-slide-item">
                <section class="main-banner" id="top" data-section="section1">
                    <video autoplay muted loop id="bg-video">
                        <source src="{{ asset($item->file) }}" type="video/mp4" />
                    </video>
                    <div class="video-overlay header-text">
                        <div class="video-slider-container">
                            <div class="video-slider-content">
                                <h5>{{$item->sub_heading}}</h5>
                                <h1 class="video-content-title">{{$item->title}}</h1>
                                <p class="slider-text slider-content">{{$item->description}}
                                </p>
                                <div class="btn-box">
                                    <a href="{{ route('apply') }}" class="theme-btn style-one">Apply Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            @endif
        @endforeach 
            {{-- <div class="slide-item">
                <div class="image-layer"
                    style="background-image: url('{{ asset('frontend/images/banner/banner-3.jpg') }}')"></div>
                <div class="auto-container">
                    <div class="content-box ">
                        <h5>get on the right way</h5>
                        <h1>Slider 3 title information<br> here</h1>
                        <p class="slider-text slider-content">Anything more information on slider one is kept here</p>
                        <div class="btn-box">
                            <a href="{{ route('index') }}" class="theme-btn style-one mr-10">Admit Now</a>
                        </div>
                    </div>
                </div>
            </div> --}}

        </div>
    </section>

    <!-- banner-section end -->


    <!-- about-section -->
    <section class="about-section bg-color-1">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-12">
                    <div class="banner-carousel owl-theme owl-carousel owl-dots-none owl-autoplay-true owl-loop-true">

                        @foreach ($images as $image)
                            <div class="custom-slide-item">
                                <div class="image-layer" style="background: url('{{ asset($image->image) }}')">
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <div class="col-12 content-column">
                    <div id="content_block_one">
                        <div class="content-box">
                            <div class="sec-title left">
                                <h5>About Spell</h5>
                                <h2>Why study in India ?</h2>
                            </div>
                            <div class="text">
                                <p>{{ $about ? $about->description : null }}</p>
                            </div>
                            <div class="btn-box d-flex justify-content-center flex-nowrap">
                                <a href="{{ route('index') }}" class="theme-btn style-one">Admit Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- about-section end -->

    <!--University section-->
    <section class="university-section">
        <div class="university-container">
            <div class="sec-title centred">
                <h2>Our University</h2>
                <div class="sec-text">
                    <p class="blog-text" style="max-width:100%">Let us know your interest and we will find you the right
                        institution</p>
                </div>
            </div>
            <div class="three-item-carousel owl-carousel owl-theme owl-nav-none owl-dot-style-one">
                @foreach ($universities as $university)
                    <div class="uni-container">
                        <div class="news-block-one">
                            {{-- route('college-detail', Crypt::encrypt($university->id)) --}}
                            <div class="rounded inner-div">
                                <figure class="image-box"><a
                                        href="{{ route('college-detail', Crypt::encrypt($university->id)) }}"><img
                                            src="{{ asset($university->image) }}" class="uni-image" alt=""></a>
                                </figure>
                                <div class="lower-content uni-lower-content">
                                    {{-- <ul class="post-info">
                                    <li>ESTD. 1997</li>
                                </ul> --}}
                                    <h3 class="uni-title-main"><a
                                            href="{{ route('college-detail', Crypt::encrypt($university->id)) }}"
                                            class="uni--title">{{ $university->uname }}</a></h3>
                                    <div class="link view-course"><a href="{{ route('courses') }}"><i
                                                class="fas fa-arrow-right uni-icon "></i><span>View all Courses and
                                                Fees</span></a></div>
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
    </section>
    <!--University section end-->



    <!-- courses-section -->
    <section class="team-section">
        <div class="auto-container">
            <div class="upper-box clearfix">
                <div class="sec-title style-two pull-left">
                    <h5>Courses</h5>
                    <h2>Our Provided Courses</h2>
                </div>
                <div class="btn-box pull-right">
                    <a href="{{ route('courses') }}"><i class="fas fa-user"></i>view all courses</a>
                </div>
            </div>
            <div class="four-item-carousel owl-carousel owl-theme owl-nav-none owl-dot-style-one">
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
                                    <a href="{{ route('course-detail', Crypt::encrypt($course->id)) }}"
                                        class="theme-btn style-one">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach






            </div>
        </div>
    </section>
    <!-- courses-section end -->
    <!-- scholarship-section -->
    <section class="project-style-four bg-color-1">
        <div class="auto-container">
            <div class="title-inner clearfix">
                <div class="sec-title style-four right pull-left">
                    <h5>our scholarship scheme</h5>
                    <h2>Institue Scholarship</h2>
                </div>
                <div class="btn-box pull-right"><a href="{{ route('scholarship') }}">View More Scholarships</a></div>
            </div>
            <div class="two-column-carousel owl-carousel owl-theme owl-nav-none">
                <div class="project-block-three">
                    <div class="inner-box">
                        <figure class="image-box"><img src="{{ asset('frontend/images/gallery/project-17.jpg') }}"
                                alt=""></figure>
                        <div class="lower-content">
                            <div class="inner">
                                <h3>Scholarship Title</h3>
                                {{-- <p>Acepteur sintas haecat sed non sed dui proident sunt sed ipsum tempor adipisicing elit
                                    sed incidunt.</p> --}}
                                <a href="{{ route('scholarship') }}"><i class="fas fa-arrow-right"></i><span>Read
                                        More</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="project-block-three">
                    <div class="inner-box">
                        <figure class="image-box"><img src="{{ asset('frontend/images/gallery/project-18.jpg') }}"
                                alt=""></figure>
                        <div class="lower-content">
                            <div class="inner">
                                <h3>Scholarship Title</h3>
                                <p>Acepteur sintas haecat sed non sed dui proident sunt sed ipsum tempor adipisicing elit
                                    sed incidunt.</p>
                                <a href="{{ route('scholarship') }}"><i class="fas fa-arrow-right"></i><span>Read
                                        More</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="project-block-three">
                    <div class="inner-box">
                        <figure class="image-box"><img src="{{ asset('frontend/images/gallery/project-17.jpg') }}"
                                alt=""></figure>
                        <div class="lower-content">
                            <div class="inner">
                                <h3>Scholarship Title</h3>
                                <p>Acepteur sintas haecat sed non sed dui proident sunt sed ipsum tempor adipisicing elit
                                    sed incidunt.</p>
                                <a href="{{ route('scholarship') }}"><i class="fas fa-arrow-right"></i><span>Read
                                        More</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="project-block-three">
                    <div class="inner-box">
                        <figure class="image-box"><img src="{{ asset('frontend/images/gallery/project-18.jpg') }}"
                                alt=""></figure>
                        <div class="lower-content">
                            <div class="inner">
                                <h3>Scholarship Title</h3>
                                <p>Acepteur sintas haecat sed non sed dui proident sunt sed ipsum tempor adipisicing elit
                                    sed incidunt.</p>
                                <a href="{{ route('scholarship') }}"><i class="fas fa-arrow-right"></i><span>Read
                                        More</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="project-block-three">
                    <div class="inner-box">
                        <figure class="image-box"><img src="assets/images/gallery/project-17.jpg" alt="">
                        </figure>
                        <div class="lower-content">
                            <div class="inner">
                                <h3>Scholarship Title</h3>
                                <p>Acepteur sintas haecat sed non sed dui proident sunt sed ipsum tempor adipisicing elit
                                    sed incidunt.</p>
                                <a href="{{ route('scholarship') }}"><i class="fas fa-arrow-right"></i><span>Read
                                        More</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="project-block-three">
                    <div class="inner-box">
                        <figure class="image-box"><img src="{{ asset('frontend/images/gallery/project-18.jpg') }}"
                                alt=""></figure>
                        <div class="lower-content">
                            <div class="inner">
                                <h3>Scholarship Title</h3>
                                <p>Acepteur sintas haecat sed non sed dui proident sunt sed ipsum tempor adipisicing elit
                                    sed incidunt.</p>
                                <a href="{{ route('scholarship') }}"><i class="fas fa-arrow-right"></i><span>Read
                                        More</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                                        href="{{ route('blog-detail', Crypt::encrypt($blog->id)) }}"><img
                                            src="{{ asset($blog->image) }}" alt=""></a></figure>
                                <div class="lower-content">
                                    {{-- <ul class="post-info">
                                    <li>August 25, 2028</li>
                                </ul> --}}
                                    <h3><a
                                            href="{{ route('blog-detail', Crypt::encrypt($blog->id)) }}">{{ $blog->title }}</a>
                                    </h3>
                                    <p>{{ $blog->short_description }}</p>
                                    <div class="link"><a href="{{ route('blog-detail', Crypt::encrypt($blog->id)) }}"><i
                                                class="fas fa-arrow-right"></i><span>Read More</span></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach



            </div>
            <div class="btn-box blog-door">
                <a href="{{ route('blog') }}" class="theme-btn style-one">Load More</a>
            </div>
        </div>
    </section>
    <!-- news-section end -->
@endsection
