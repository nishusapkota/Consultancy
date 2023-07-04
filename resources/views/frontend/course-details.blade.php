@extends('frontend.layouts.master')
@section('title', 'Home')
@section('header')
    @include('frontend.layouts.headers.otherPageHeader')
@endsection
@section('content')

    <!--Page Title-->
    <section class="page-title style-three centred" style="background-image: {{asset('frontend/images/background/page-title-5.jpg')}};">
        <div class="auto-container">
            <div class="content-box clearfix">
                <h1>Course Name</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="index.html">Home</a></li>
                    <li>Course Details</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->


    <!-- sidebar-page-container -->
    <section class="sidebar-page-container details-content">
        <div class="fluid-container px-5">
            <div class="row clearfix">
                <div class="col-lg-7 col-md-12 col-sm-12 content-side">
                    <div class="blog-details-content">
                        <figure class="image-box">
                            <img src="{{asset('frontend/images/courses/MBA.jpg')}}" class="mb-4" alt="">
                            <!-- <span class="category">business</span> -->
                        </figure>
                        <div class="inner-box">
                            <!-- <ul class="post-info clearfix">
                                <li><i class="far fa-user"></i><a href="blog-classic.html">Admin</a></li>
                            </ul> -->
                            <div class="text">
                                <h2>Taking Action For Benefits Of Education</h2>
                                <p>Eabore etsu dolore magn aliqua enim veniam quis nostrud exercitas reprehenderit voluptate sed bvelit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.</p>
                                <h5>Eabore dolore magn aliqua enim veniam quis nostrud exercitas reprehenderit sint esse cillum dolore fugiat nulla pariatur excepteur sint.</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elitm sed do eiusmod tempor incididunt labore ets magna aliquatenim minim veniam quis nostrud exercitation ullamco laboris nisut aliquip ex ea commod Duis aute irure dolorn reprehenderit voluptate velit esse. Excepteur sint uda occaecat cupidatat non pro sunt culpa qui officia deserunt mollit anim id est laborum sed utm pers piciatis unde omnis iste dolor nat ipsum diu enimery sed ipsum voluptatem.</p>
                                <h3>How to become a top conference speaker?</h3>
                                <p>Magna aliquatenim minim veniam quis nostrud <span>exercitation ullamco laboris nisut</span> aliquip exa commod Duis aute irure dolorn reprehenderit voluptate velit es. Excepteur sint uda occaecat cupidatat non proid sunt culpa qui officia deserunt mollit anim id est laborum sed utms.</p>
                            </div>
                            <div class="two-column">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="image-box"><img src="{{asset('frontend/images/news/news-21.jpg')}}" alt=""></figure>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="image-box"><img src="{{asset('frontend/images/news/news-22.jpg')}}" alt=""></figure>
                                    </div>
                                </div>
                            </div>
                    
                        </div>
                
                    </div>
                </div>
               
                <div class="col-lg-5 col-md-12 col-sm-12">
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
            </div>
            
        </div>
    </section>
    <!-- sidebar-page-container end -->

@endsection