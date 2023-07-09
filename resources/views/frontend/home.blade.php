@extends('frontend.layouts.master')
@section('title', 'Home')
@section('header')
    @include('frontend.layouts.headers.homePageHeader')
@endsection
@section('content')
    <!-- banner-section -->
    <section class="banner-section">
        <div class="banner-carousel owl-theme owl-carousel owl-dots-none autoplay-false">
            
            <div class="slide-item first-slide">
                <div class="image-layer" style="background-image:{{asset('frontend/images/banner/banner-1.jpg')}}"></div>
                <div class="auto-container">
                    <div class="content-box first-slide-content">
                        <h5>get on the right way</h5>
                        <h1>Slider 1 title information<br />here</h1>
                        <div class="btn-box">
                            <!-- <a href="index-6.html" class="user-btn"><i class="far fa-user"></i><span>Find a Consultant</span></a> -->
                            <p class="slider-text slider-content">Anthing more information on slider one is kept here</p>
                            <a href="{{route('index')}}" class="theme-btn style-one">Admit Now</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="video-slide-item">
                <section class="main-banner" id="top" data-section="section1">
                    <video autoplay muted loop id="bg-video">
                        <source src="{{asset('frontend/images/course-video.mp4')}}" type="video/mp4" />
                    </video>

                    <div class="video-overlay header-text">
                        <div class="video-slider-container">
                            <div class="video-slider-content">

                                <h1 class="video-content-title">Slider 2 title information <br />here</h1>

                                <p class="slider-text slider-content">Anything more information on slider two is kept here
                                </p>

                                <div class="btn-box">
                                    <a href="{{route('index')}}" class="theme-btn style-one">Apply Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

            {{-- <div class="slide-item last-slide">
                <div class="image-layer" style="background-image:{{asset('frontend/images/banner/banner-3.jpg')}}"></div>
                <div class="auto-container">
                    <div class="content-box last-slide-content">
                        <h5>get on the right way</h5>
                        <h1>Slider 3 title information<br> here</h1>
                        <p class="slider-text slider-content">Anthing more information on slider one is kept here</p>
                        <div class="btn-box">
                            <a href="{{route('index')}}" class="theme-btn style-one mr-10">Admit Now</a>
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
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="banner-carousel owl-theme owl-carousel owl-dots-none owl-autoplay-true owl-loop-true">
                        <div class="custom-slide-item">
                            <div class="image-layer" style="background: url({{asset('frontend/images/gallery/project-2.jpg')}})">
                            </div>
                        </div>

                        <div class="custom-slide-item">
                            <div class="image-layer" style="background-image: url({{asset('frontend/images/gallery/project-1.jpg')}})">

                            </div>
                        </div>

                        <div class="custom-slide-item">
                            <div class="image-layer" style="background-image: url({{asset('frontend/images/gallery/project-17.jpg')}})">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                    <div id="content_block_one">
                        <div class="content-box">
                            <div class="sec-title left">
                                <h5>About Spell</h5>
                                <h2>Why study in India ?</h2>
                            </div>
                            <div class="text">
                                <p>The Indian education system began with ancient scriptures thousands of years ago. It has now transformed into modern-day education imparted in the finest institutions. The network of 42,000+ colleges and 1000+ universities has aided India to become an attractive education hub for international students. The same richness of Indian higher education needed due focus and led to the birth of the idea of the Study in India program.</p>
                            </div>
                            <div class="btn-box">
                                <a href="{{route('index')}}" class="theme-btn style-one">Admit Now</a>
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
                    <p class="blog-text" style="max-width:100%">Let us know your interest and we will find you the right institution</p>
                </div>
            </div>
            <div class="three-item-carousel owl-carousel owl-theme owl-nav-none owl-dot-style-one">

                <div class="uni-container">
                    <div class="news-block-one">
                    
                        <div class="">
                            <figure class="image-box"><a href="{{route('college-detail')}}"><img src="{{asset('frontend/images/University/bangalore.jpeg')}}" class="uni-image" alt=""></a></figure>
                            <div class="lower-content uni-lower-content">
                                <ul class="post-info">
                                    <li>ESTD. 1997</li>
                                </ul>
                                <h3 class="uni-title-main"><a href="{{route('college-detail')}}" class="uni--title">Bangalore Technological Institute</a></h3>
                                <div class="link view-course"><a href="{{route('college-detail')}}"><i class="fas fa-arrow-right uni-icon"></i><span>View all Courses and Fees</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="uni-container">
                    <div class="news-block-one">
                        <div class="">
                            <figure class="image-box"><a href="{{route('college-detail')}}"><img src="{{asset('frontend/images/University/gurunanak.jpeg')}}" class="uni-image" alt=""></a></figure>
                            <div class="lower-content uni-lower-content">
                                <ul class="post-info">
                                    <li>ESTD. 1997</li>
                                </ul>
                                <h3 class="uni-title-main"><a href="{{route('college-detail')}}" class="uni--title">Guru Nanak Institutions</a></h3>
                                <div class="link view-course"><a href="{{route('college-detail')}}"><i class="fas fa-arrow-right uni-icon"></i><span>View all Courses and Fees</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="uni-container">
                    <div class="news-block-one inner-uni">

                        <div class="rounded inner-div">
                            <figure class="image-box"><a href="{{route('college-detail')}}"><img src="{{asset('frontend/images/University/Anna.jpeg')}}" alt="" class="uni-image"></a></figure>
                            <div class="lower-content uni-lower-content">
                                <ul class="post-info">
                                    <li>ESTD. 1978</li>
                                </ul>
                                <h3 class="uni-title-main"><a href="{{route('college-detail')}}"  class="uni--title">Anna University</a></h3>
                                <div class="link view-course"><a href="{{route('college-detail')}}.html"><i class="fas fa-arrow-right uni-icon"></i><span>View all Courses and Fees</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="uni-container">
                    <div class="news-block-one">
                    
                        <div class="">
                            <figure class="image-box"><a href="{{route('college-detail')}}"><img src="{{asset('frontend/images/University/Ambedkar.jpeg')}}" class="uni-image" alt=""></a></figure>
                            <div class="lower-content uni-lower-content">
                                <ul class="post-info">
                                    <li>ESTD. 1979</li>
                                </ul>
                                <h3 class="uni-title-main"><a href="{{route('college-detail')}}" class="uni--title">Dr. Amberdkar Institue of Technology</a></h3>
                                <div class="link view-course"><a href="{{route('college-detail')}}"><i class="fas fa-arrow-right uni-icon"></i><span>View all Courses and Fees</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>

           

            <div class="btn-box d-flex align-items-center justify-content-center mt-4">
                <a href="college.html" class="theme-btn style-one mb-4">View all</a>
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
                    <a href="{{route('courses')}}"><i class="fas fa-user"></i>view all courses</a>
                </div>
            </div>
            <div class="four-item-carousel owl-carousel owl-theme owl-nav-none owl-dot-style-one">
                <div class="team-block-one">
                    <div class="inner-box">
                        <figure class="image-box"><img src="{{asset('frontend/images/courses/B.E E&C.jpg')}}" alt=""></figure>
                        <div class="lower-content">
                            <div class="content-box">
                                <h3 class="course-title"><a href="{{route('index')}}">Bachelor of Engineering in Electronics and
                                        Communication </a></h3>
                                <span class="designation">(B.E. E&C)</span>
                            </div>
                            <div class="ovellay-box">
                                <a href="{{route('index')}}" class="theme-btn style-one">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="team-block-one">
                    <div class="inner-box">
                        <figure class="image-box"><img src="{{asset('frontend/images/courses/BBA.jpg')}}" alt=""></figure>
                        <div class="lower-content">
                            <div class="content-box">
                                <h3 class="course-title"><a href="{{route('index')}}">Bachelors in Business Administration</a>
                                </h3>
                                <span class="designation">(BBA)</span>
                            </div>
                            <div class="ovellay-box">
                                <a href="{{route('index')}}" class="theme-btn style-one">View Details</a>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="team-block-one">
                    <div class="inner-box">
                        <figure class="image-box"><img src="{{asset('frontend/images/courses/MBA.jpg')}}" alt=""></figure>
                        <div class="lower-content">
                            <div class="content-box">
                                <h3 class="course-title"><a href="{{route('index')}}">Master in Business Administration</a></h3>
                                <span class="designation">(MBA)</span>
                            </div>
                            <div class="ovellay-box">
                                <a href="{{route('index')}}" class="theme-btn style-one">View Details</a>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="team-block-one">
                    <div class="inner-box">
                        <figure class="image-box"><img src="{{asset('frontend/images/courses/BBA.jpg')}}" alt=""></figure>
                        <div class="lower-content">
                            <div class="content-box">
                                <h3 class="course-title"><a href="{{route('index')}}">Master of Science in Information
                                        Technology</a></h3>
                                <span class="designation">(MSIT)</span>
                            </div>
                            <div class="ovellay-box">
                                <a href="{{route('index')}}" class="theme-btn style-one">View Details</a>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="team-block-one">
                    <div class="inner-box">
                        <figure class="image-box"><img src="{{asset('frontend/images/courses/DBA.jpg')}}" alt=""></figure>
                        <div class="lower-content">
                            <div class="content-box">
                                <h3 class="course-title"><a href="{{route('index')}}">Doctorate of Business Administration</a>
                                </h3>
                                <span class="designation">(DBA)</span>
                            </div>
                            <div class="ovellay-box">
                                <a href="{{route('index')}}" class="theme-btn style-one">View Details</a>

                            </div>
                        </div>
                    </div>
                </div>

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
            <div class="btn-box pull-right"><a href="{{route('scholarship')}}">View More Scholarships</a></div>
        </div>
        <div class="two-column-carousel owl-carousel owl-theme owl-nav-none">
            <div class="project-block-three">
                <div class="inner-box">
                    <figure class="image-box"><img src="{{asset('frontend/images/gallery/project-17.jpg')}}" alt=""></figure>
                    <div class="lower-content">
                        <div class="inner">
                            <h3>Scholarship Title</h3>
                            <p>Acepteur sintas haecat sed non sed dui proident sunt sed ipsum tempor adipisicing elit sed incidunt.</p>
                            <a href="{{route('scholarship')}}"><i class="fas fa-arrow-right"></i><span>Read More</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="project-block-three">
                <div class="inner-box">
                    <figure class="image-box"><img src="{{asset('frontend/images/gallery/project-18.jpg')}}" alt=""></figure>
                    <div class="lower-content">
                        <div class="inner">
                            <h3>Scholarship Title</h3>
                            <p>Acepteur sintas haecat sed non sed dui proident sunt sed ipsum tempor adipisicing elit sed incidunt.</p>
                            <a href="{{route('scholarship')}}"><i class="fas fa-arrow-right"></i><span>Read More</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="project-block-three">
                <div class="inner-box">
                    <figure class="image-box"><img src="{{asset('frontend/images/gallery/project-17.jpg')}}" alt=""></figure>
                    <div class="lower-content">
                        <div class="inner">
                            <h3>Scholarship Title</h3>
                            <p>Acepteur sintas haecat sed non sed dui proident sunt sed ipsum tempor adipisicing elit sed incidunt.</p>
                            <a href="{{route('scholarship')}}"><i class="fas fa-arrow-right"></i><span>Read More</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="project-block-three">
                <div class="inner-box">
                    <figure class="image-box"><img src="{{asset('frontend/images/gallery/project-18.jpg')}}" alt=""></figure>
                    <div class="lower-content">
                        <div class="inner">
                            <h3>Scholarship Title</h3>
                            <p>Acepteur sintas haecat sed non sed dui proident sunt sed ipsum tempor adipisicing elit sed incidunt.</p>
                            <a href="{{route('scholarship')}}"><i class="fas fa-arrow-right"></i><span>Read More</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="project-block-three">
                <div class="inner-box">
                    <figure class="image-box"><img src="assets/images/gallery/project-17.jpg" alt=""></figure>
                    <div class="lower-content">
                        <div class="inner">
                            <h3>Scholarship Title</h3>
                            <p>Acepteur sintas haecat sed non sed dui proident sunt sed ipsum tempor adipisicing elit sed incidunt.</p>
                            <a href="{{route('scholarship')}}"><i class="fas fa-arrow-right"></i><span>Read More</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="project-block-three">
                <div class="inner-box">
                    <figure class="image-box"><img src="{{asset('frontend/images/gallery/project-18.jpg')}}" alt=""></figure>
                    <div class="lower-content">
                        <div class="inner">
                            <h3>Scholarship Title</h3>
                            <p>Acepteur sintas haecat sed non sed dui proident sunt sed ipsum tempor adipisicing elit sed incidunt.</p>
                            <a href="{{route('scholarship')}}"><i class="fas fa-arrow-right"></i><span>Read More</span></a>
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
                <p class="blog-text">Belis nisl adipiscing sapien sed malesu diame lacus eget erat Cras mollis scelerisqu
                    Nullam arcu liquam here was consequat.</p>
            </div>
            <div class="row clearfix">
                <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                    <div class="news-block-one wow fadeInUp animated animated" data-wow-delay="00ms"
                        data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box"><a href="{{route('blog-detail')}}"><img
                                        src="{{asset('frontend/images/blogs/first.jpg')}}" alt=""></a></figure>
                            <div class="lower-content">
                                <ul class="post-info">
                                    <li>August 25, 2028</li>
                                </ul>
                                <h3><a href="{{route('blog-detail')}}">Some say education is the process of gaining information is
                                        nation.</a></h3>
                                <p>Exea conse quat duis irurey dolor sed reprehen derit volupta velit cilum lorem incididunt
                                    labore sed magna exceptur aliqua.</p>
                                <div class="link"><a href="{{route('blog-detail')}}"><i
                                            class="fas fa-arrow-right"></i><span>Read More</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                    <div class="news-block-one wow fadeInUp animated animated" data-wow-delay="300ms"
                        data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box"><a href="{{route('blog-detail')}}"><img
                                        src="{{asset('frontend/images/blogs/second.jpg')}}" alt=""></a></figure>
                            <div class="lower-content">
                                <ul class="post-info">
                                    <li>August 25, 2018</li>
                                </ul>
                                <h3><a href="{{route('blog-detail')}}">Education gives us a knowledge of the world around us and
                                        changes</a></h3>
                                <p>Exea conse quat duis irurey dolor sed reprehen derit volupta velit cilum lorem incididunt
                                    labore sed magna exceptur aliqua.</p>
                                <div class="link"><a href="{{route('blog-detail')}}"><i
                                            class="fas fa-arrow-right"></i><span>Read More</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                    <div class="news-block-one wow fadeInUp animated animated" data-wow-delay="600ms"
                        data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box"><a href="{{route('blog-detail')}}"><img
                                        src="{{asset('frontend/images/blogs/third.jpg')}}" alt=""></a></figure>
                            <div class="lower-content">
                                <ul class="post-info">
                                    <li>August 25, 2018</li>
                                </ul>
                                <h3><a href="{{route('blog-detail')}}">One thing I wish I can do is, to provide education for all
                                        child left behind</a></h3>
                                <p>Exea conse quat duis irurey dolor sed reprehen derit volupta velit cilum lorem incididunt
                                    labore sed magna exceptur aliqua.</p>
                                <div class="link"><a href="{{route('blog-detail')}}"><i
                                            class="fas fa-arrow-right"></i><span>Read More</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="btn-box blog-door">
                <a href="blog-grid.html" class="theme-btn style-one">Load More</a>
            </div>
        </div>
    </section>
    <!-- news-section end -->
@endsection
