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
          <img src="{{asset($blog->image)}}" alt="" />
        </figure>
        <div class="inner-box">
          <ul class="post-info clearfix">
            <li>
              <i class="far fa-user"></i
              ><a href="blog-classic.html">Admin</a>
            </li>
          </ul>
          <div class="text">
            {!!$blog->body!!}
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