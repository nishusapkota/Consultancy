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
                            <a href="index.html" class="theme-btn style-one">Admit Now</a>
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
                                    <a href="index.html" class="theme-btn style-one">Apply Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="slide-item last-slide">
                <div class="image-layer" style="background-image:{{asset('frontend/images/banner/banner-3.jpg')}}"></div>
                <div class="auto-container">
                    <div class="content-box last-slide-content">
                        <h5>get on the right way</h5>
                        <h1>Slider 3 title information<br> here</h1>
                        <p class="slider-text slider-content">Anthing more information on slider one is kept here</p>
                        <div class="btn-box">
                            <a href="index.html" class="theme-btn style-one mr-10">Admit Now</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
    <!-- banner-section end -->


    <!-- about-section -->
    <section class="about-section bg-color-1">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <!-- <div class="video-inner">
                        <figure class="image-box"><img src="frontend/images/about-student.png" alt=""></figure>
                       
                    </div> -->
                    <div class="banner-carousel owl-theme owl-carousel owl-dots-none owl-autoplay-true owl-loop-true">
                        <div class="custom-slide-item">
                            <div class="image-layer" style="background-image:{{asset('frontend/images/gallery/project-14.jpg')}}">
                                <!-- <figure class="image-box"><img src="frontend/images/gallery/project-14.jpg" alt=""></figure> -->
                            </div>
                        </div>

                        <div class="custom-slide-item">
                            <div class="image-layer" style="background-image: {{asset('frontend/images/gallery/project-1.jpg')}}">

                            </div>
                        </div>

                        <div class="custom-slide-item">
                            <div class="image-layer" style="background-image: {{asset('frontend/images/gallery/project-17.jpg')}}">

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
                                <p>The Indian education system began with ancient scriptures thousands of years ago. It has
                                    now transformed into modern-day education imparted in the finest institutions. The
                                    network of 42,000+ colleges and 1000+ universities has aided India to become an
                                    attractive education hub for international students. The same richness of Indian higher
                                    education needed due focus and led to the birth of the idea of the Study in India
                                    program.</p>
                            </div>
                            <div class="btn-box">
                                <a href="index.html" class="theme-btn style-one">Admit Now</a>
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
                <p class="blog-text">Let us know your interest and we will find you the right institution</p>
            </div>
            <div class="grand-uni-container">
                <div class="uni-container">
                    <div class="news-block-one inner-uni">

                        <div class="rounded inner-div">
                            <figure class="image-box"><a href="blog-details.html"><img
                                        src="{{asset('frontend/images/University/manavrachna.png')}}" alt="" class="uni-image"></a>
                            </figure>
                            <div class="lower-content uni-lower-content">
                                <ul class="post-info">
                                    <li>ESTD. 1997</li>
                                </ul>
                                <h3 class="uni-title-main"><a href="blog-details.html" class="uni--title">Manav Rachna
                                        International Institute of Research And Studies</a></h3>
                                <div class="link view-course"><a href="index.html"><i
                                            class="fas fa-arrow-right uni-icon"></i><span>View all Courses and
                                            Fees</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="uni-container">
                    <div class="news-block-one">

                        <div class="">
                            <figure class="image-box"><a href="blog-details.html"><img
                                        src="{{asset('frontend/images/University/bangalore.jpeg')}}" class="uni-image" alt=""></a>
                            </figure>
                            <div class="lower-content uni-lower-content">
                                <ul class="post-info">
                                    <li>ESTD. 1997</li>
                                </ul>
                                <h3 class="uni-title-main"><a href="blog-details.html" class="uni--title">Bangalore
                                        Technological Institute</a></h3>
                                <div class="link view-course"><a href="blog-details.html"><i
                                            class="fas fa-arrow-right uni-icon"></i><span>View all Courses and
                                            Fees</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="uni-container">
                    <div class="news-block-one">
                        <div class="">
                            <figure class="image-box"><a href="blog-details.html"><img
                                        src="{{asset('frontend/images/University/gurunanak.jpeg')}}" class="uni-image"
                                        alt=""></a></figure>
                            <div class="lower-content uni-lower-content">
                                <ul class="post-info">
                                    <li>ESTD. 1997</li>
                                </ul>
                                <h3 class="uni-title-main"><a href="blog-details.html" class="uni--title">Guru Nanak
                                        Institutions</a></h3>
                                <div class="link view-course"><a href="blog-details.html"><i
                                            class="fas fa-arrow-right uni-icon"></i><span>View all Courses and
                                            Fees</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="uni-container">
                    <div class="news-block-one inner-uni">

                        <div class="rounded inner-div">
                            <figure class="image-box"><a href="blog-details.html"><img
                                        src="{{asset('frontend/images/University/Anna.jpeg')}}" alt="" class="uni-image"></a>
                            </figure>
                            <div class="lower-content uni-lower-content">
                                <ul class="post-info">
                                    <li>ESTD. 1978</li>
                                </ul>
                                <h3 class="uni-title-main"><a href="blog-details.html" class="uni--title">Anna
                                        University</a></h3>
                                <div class="link view-course"><a href="index.html"><i
                                            class="fas fa-arrow-right uni-icon"></i><span>View all Courses and
                                            Fees</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="uni-container">
                    <div class="news-block-one">

                        <div class="">
                            <figure class="image-box"><a href="blog-details.html"><img
                                        src="{{asset('frontend/images/University/Ambedkar.jpeg')}}" class="uni-image"
                                        alt=""></a></figure>
                            <div class="lower-content uni-lower-content">
                                <ul class="post-info">
                                    <li>ESTD. 1979</li>
                                </ul>
                                <h3 class="uni-title-main"><a href="blog-details.html" class="uni--title">Dr. Amberdkar
                                        Institue of Technology</a></h3>
                                <div class="link view-course"><a href="blog-details.html"><i
                                            class="fas fa-arrow-right uni-icon"></i><span>View all Courses and
                                            Fees</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="uni-container">
                    <div class="news-block-one">
                        <div class="">
                            <figure class="image-box"><a href="blog-details.html"><img
                                        src="{{asset('frontend/images/University/sikim.png')}}" class="uni-image" alt=""></a>
                            </figure>
                            <div class="lower-content uni-lower-content">
                                <ul class="post-info">
                                    <li>ESTD. 1995</li>
                                </ul>
                                <h3 class="uni-title-main"><a href="blog-details.html" class="uni--title">Sikkim Manipal
                                        University</a></h3>
                                <div class="link view-course"><a href="blog-details.html"><i
                                            class="fas fa-arrow-right uni-icon"></i><span>View all Courses and
                                            Fees</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="uni-container">
                    <div class="news-block-one inner-uni">

                        <div class="rounded inner-div">
                            <figure class="image-box"><a href="blog-details.html"><img
                                        src="{{asset('frontend/images/University/Eastpoint.jpeg')}}" alt=""
                                        class="uni-image"></a></figure>
                            <div class="lower-content uni-lower-content">
                                <ul class="post-info">
                                    <li>ESTD. 1997</li>
                                </ul>
                                <h3 class="uni-title-main"><a href="blog-details.html" class="uni--title">East Point
                                        College of Engineering And Technology</a></h3>
                                <div class="link view-course"><a href="index.html"><i
                                            class="fas fa-arrow-right uni-icon"></i><span>View all Courses and
                                            Fees</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="uni-container">
                    <div class="news-block-one">

                        <div class="">
                            <figure class="image-box"><a href="blog-details.html"><img
                                        src="{{asset('frontend/images/University/MS.jpeg')}}" class="uni-image" alt=""></a>
                            </figure>
                            <div class="lower-content uni-lower-content">
                                <ul class="post-info">
                                    <li>ESTD. 1962</li>
                                </ul>
                                <h3 class="uni-title-main"><a href="blog-details.html" class="uni--title">M S Ramalah
                                        Institue of Technology</a></h3>
                                <div class="link view-course"><a href="blog-details.html"><i
                                            class="fas fa-arrow-right uni-icon"></i><span>View all Courses and
                                            Fees</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="uni-container">
                    <div class="news-block-one">
                        <div class="">
                            <figure class="image-box"><a href="blog-details.html"><img
                                        src="{{asset('frontend/images/University/gurunanak.jpeg')}}" class="uni-image"
                                        alt=""></a></figure>
                            <div class="lower-content uni-lower-content">
                                <ul class="post-info">
                                    <li>ESTD. 1997</li>
                                </ul>
                                <h3 class="uni-title-main"><a href="blog-details.html" class="uni--title">Guru Nanak
                                        Institutions</a></h3>
                                <div class="link view-course"><a href="blog-details.html"><i
                                            class="fas fa-arrow-right uni-icon"></i><span>View all Courses and
                                            Fees</span></a></div>
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
                    <a href="index.html"><i class="fas fa-user"></i>view all courses</a>
                </div>
            </div>
            <div class="four-item-carousel owl-carousel owl-theme owl-nav-none owl-dot-style-one">
                <div class="team-block-one">
                    <div class="inner-box">
                        <figure class="image-box"><img src="{{asset('frontend/images/courses/B.E E&C.jpg')}}" alt=""></figure>
                        <div class="lower-content">
                            <div class="content-box">
                                <h3 class="course-title"><a href="index.html">Bachelor of Engineering in Electronics and
                                        Communication </a></h3>
                                <span class="designation">(B.E. E&C)</span>
                            </div>
                            <div class="ovellay-box">
                                <a href="index.html" class="theme-btn style-one">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="team-block-one">
                    <div class="inner-box">
                        <figure class="image-box"><img src="{{asset('frontend/images/courses/BBA.jpg')}}" alt=""></figure>
                        <div class="lower-content">
                            <div class="content-box">
                                <h3 class="course-title"><a href="index.html">Bachelors in Business Administration</a>
                                </h3>
                                <span class="designation">(BBA)</span>
                            </div>
                            <div class="ovellay-box">
                                <a href="index.html" class="theme-btn style-one">View Details</a>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="team-block-one">
                    <div class="inner-box">
                        <figure class="image-box"><img src="{{asset('frontend/images/courses/MBA.jpg')}}" alt=""></figure>
                        <div class="lower-content">
                            <div class="content-box">
                                <h3 class="course-title"><a href="index.html">Master in Business Administration</a></h3>
                                <span class="designation">(MBA)</span>
                            </div>
                            <div class="ovellay-box">
                                <a href="index.html" class="theme-btn style-one">View Details</a>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="team-block-one">
                    <div class="inner-box">
                        <figure class="image-box"><img src="{{asset('frontend/images/courses/BBA.jpg')}}" alt=""></figure>
                        <div class="lower-content">
                            <div class="content-box">
                                <h3 class="course-title"><a href="index.html">Master of Science in Information
                                        Technology</a></h3>
                                <span class="designation">(MSIT)</span>
                            </div>
                            <div class="ovellay-box">
                                <a href="index.html" class="theme-btn style-one">View Details</a>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="team-block-one">
                    <div class="inner-box">
                        <figure class="image-box"><img src="{{asset('frontend/images/courses/DBA.jpg')}}" alt=""></figure>
                        <div class="lower-content">
                            <div class="content-box">
                                <h3 class="course-title"><a href="index.html">Doctorate of Business Administration</a>
                                </h3>
                                <span class="designation">(DBA)</span>
                            </div>
                            <div class="ovellay-box">
                                <a href="index.html" class="theme-btn style-one">View Details</a>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- courses-section end -->
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
                <img src="{{asset('assets/images/resource/info-1.jpg')}}" alt="" />
              </figure>
              <div class="info-box">
                <figure class="info-logo">
                  <img src="{{asset('assets/images/icons/info-logo.png')}}" alt="" />
                </figure>
                <div class="icon-box"><i class="fas fa-phone"></i></div>
                <h2><a href="tel:18003698527">(+977) 9841111111</a></h2>
                <div class="email">
                  <a href="mailto:support@my-domain.net"
                    >support@my-domain.net</a
                  >
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
  <!-- form-section end -->

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
                            <figure class="image-box"><a href="blog-details.html"><img
                                        src="{{asset('frontend/images/blogs/first.jpg')}}" alt=""></a></figure>
                            <div class="lower-content">
                                <ul class="post-info">
                                    <li>August 25, 2028</li>
                                </ul>
                                <h3><a href="blog-details.html">Some say education is the process of gaining information is
                                        nation.</a></h3>
                                <p>Exea conse quat duis irurey dolor sed reprehen derit volupta velit cilum lorem incididunt
                                    labore sed magna exceptur aliqua.</p>
                                <div class="link"><a href="blog-details.html"><i
                                            class="fas fa-arrow-right"></i><span>Read More</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                    <div class="news-block-one wow fadeInUp animated animated" data-wow-delay="300ms"
                        data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box"><a href="blog-details.html"><img
                                        src="{{asset('frontend/images/blogs/second.jpg')}}" alt=""></a></figure>
                            <div class="lower-content">
                                <ul class="post-info">
                                    <li>August 25, 2018</li>
                                </ul>
                                <h3><a href="blog-details.html">Education gives us a knowledge of the world around us and
                                        changes</a></h3>
                                <p>Exea conse quat duis irurey dolor sed reprehen derit volupta velit cilum lorem incididunt
                                    labore sed magna exceptur aliqua.</p>
                                <div class="link"><a href="blog-details.html"><i
                                            class="fas fa-arrow-right"></i><span>Read More</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                    <div class="news-block-one wow fadeInUp animated animated" data-wow-delay="600ms"
                        data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box"><a href="blog-details.html"><img
                                        src="{{asset('frontend/images/blogs/third.jpg')}}" alt=""></a></figure>
                            <div class="lower-content">
                                <ul class="post-info">
                                    <li>August 25, 2018</li>
                                </ul>
                                <h3><a href="blog-details.html">One thing I wish I can do is, to provide education for all
                                        child left behind</a></h3>
                                <p>Exea conse quat duis irurey dolor sed reprehen derit volupta velit cilum lorem incididunt
                                    labore sed magna exceptur aliqua.</p>
                                <div class="link"><a href="blog-details.html"><i
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
