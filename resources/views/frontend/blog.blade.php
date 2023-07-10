@extends('frontend.layouts.master')
@section('title', 'blog')
@section('header')
    @include('frontend.layouts.headers.otherPageHeader')
@endsection
@section('content')
 <!--Page Title-->
 <section class="page-title style-two centred" style="background-image: {{asset('frontend/images/background/page-title-5.jpg')}});">
    <div class="auto-container">
        <div class="content-box clearfix">
            <h1>Latest News</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{route('index')}}">Home</a></li>
                <li>Blog Grid</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->


<!-- news-section -->
<section class="news-section blog-grid sec-pad">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                <div class="news-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <figure class="image-box"><a href="#"><img src="{{asset('frontend/images/blogs/first.jpg')}}" alt=""></a></figure>
                        <div class="lower-content">
                            <ul class="post-info">
                                <li>August 25, 2028</li>
                            </ul>
                            <h3><a href="#">Some say education is the process of gaining information is nation.</a></h3>
                            <p>Exea conse quat duis irurey dolor sed reprehen derit volupta velit cilum lorem incididunt labore sed magna exceptur aliqua.</p>
                            <div class="link"><a href="#"><i class="fas fa-arrow-right"></i><span>Read More</span></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                <div class="news-block-one wow fadeInUp animated animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <figure class="image-box"><a href="#"><img src="{{asset('frontend/images/blogs/second.jpg')}}" alt=""></a></figure>
                        <div class="lower-content">
                            <ul class="post-info">
                                <li>August 25, 2018</li>
                            </ul>
                            <h3><a href="#">Education gives us a knowledge of the world around us and changes</a></h3>
                            <p>Exea conse quat duis irurey dolor sed reprehen derit volupta velit cilum lorem incididunt labore sed magna exceptur aliqua.</p>
                            <div class="link"><a href="#"><i class="fas fa-arrow-right"></i><span>Read More</span></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                <div class="news-block-one wow fadeInUp animated animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <figure class="image-box"><a href="#"><img src="{{asset('frontend/images/blogs/third.jpg')}}" alt=""></a></figure>
                        <div class="lower-content">
                            <ul class="post-info">
                                <li>August 25, 2018</li>
                            </ul>
                            <h3><a href="#">One thing I wish I can do is, to provide education for all child left behind</a></h3>
                            <p>Exea conse quat duis irurey dolor sed reprehen derit volupta velit cilum lorem incididunt labore sed magna exceptur aliqua.</p>
                            <div class="link"><a href="#"><i class="fas fa-arrow-right"></i><span>Read More</span></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- news-section end -->

@endsection