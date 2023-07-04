@extends('frontend.layouts.master')
@section('title', 'blog')
@section('header')
    @include('frontend.layouts.headers.otherPageHeader')
@endsection
@section('content')
<!--Page Title-->
<section
class="page-title style-three centred"
style="background-image: {{asset('frontend/images/background/page-title-5.jpg')}}"
>
<div class="auto-container">
  <div class="content-box clearfix">
    <h1>Latest News</h1>
    <ul class="bread-crumb clearfix">
      <li><a href="index.html">Home</a></li>
      <li>Blog Details</li>
    </ul>
  </div>
</div>
</section>
<!--End Page Title-->

<!-- sidebar-page-container -->
<section class="sidebar-page-container details-content">
<div class="auto-container">
  <div class="row clearfix">
    <div class="col-12content-side">
      <div class="blog-details-content">
        <figure class="image-box">
          <img src="{{asset('frontend/images/news/news-20.jpg')}}" alt="" />
        </figure>
        <div class="inner-box">
          <ul class="post-info clearfix">
            <li>
              <i class="far fa-user"></i
              ><a href="blog-classic.html">Admin</a>
            </li>
          </ul>
          <div class="text">
            <h2>Taking Action For Benefits Of Education</h2>
            <p>
              Eabore etsu dolore magn aliqua enim veniam quis nostrud
              exercitas reprehenderit voluptate sed bvelit esse cillum
              dolore eu fugiat nulla pariatur. Excepteur sint occaecat
              cupidatat non.
            </p>
            <h5>
              Eabore dolore magn aliqua enim veniam quis nostrud exercitas
              reprehenderit sint esse cillum dolore fugiat nulla pariatur
              excepteur sint.
            </h5>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elitm
              sed do eiusmod tempor incididunt labore ets magna
              aliquatenim minim veniam quis nostrud exercitation ullamco
              laboris nisut aliquip ex ea commod Duis aute irure dolorn
              reprehenderit voluptate velit esse. Excepteur sint uda
              occaecat cupidatat non pro sunt culpa qui officia deserunt
              mollit anim id est laborum sed utm pers piciatis unde omnis
              iste dolor nat ipsum diu enimery sed ipsum voluptatem.
            </p>
            <h3>How to become a top conference speaker?</h3>
            <p>
              Magna aliquatenim minim veniam quis nostrud
              <span>exercitation ullamco laboris nisut</span> aliquip exa
              commod Duis aute irure dolorn reprehenderit voluptate velit
              es. Excepteur sint uda occaecat cupidatat non proid sunt
              culpa qui officia deserunt mollit anim id est laborum sed
              utms.
            </p>
          </div>
          <div class="two-column">
            <div class="row clearfix">
              <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                <figure class="image-box">
                  <img src="{{asset('frontend/images/news/news-21.jpg')}}" alt="" />
                </figure>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                <figure class="image-box">
                  <img src="{{asset('frontend/images/news/news-22.jpg')}}" alt="" />
                </figure>
              </div>
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