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
      <li><a href="{{route('index')}}">Home</a></li>
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
          
          <div class="text">
            {!!$blog->body!!}
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