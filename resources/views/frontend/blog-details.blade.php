@extends('frontend.layouts.master')
@section('title', 'blog')
@section('header')
    @include('frontend.layouts.headers.otherPageHeader')
@endsection
@section('content')

<!--Page Title-->
<section
class="page-title style-two centred"
style="background-image: {{asset('frontend/images/background/page-title-5.jpg')}}"
>
<div class="auto-container">
  <div class="content-box clearfix">
    <h1>{{$blog->title}}</h1>
    
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
        <div class="sec-title style-two pull-left">
                        
          <h2>{{$blog->title}}</h2>
      </div>
        <figure class="image-box">
          <img src="{{asset($blog->image)}}" alt="" />
        </figure>
        <div class="inner-box" style="border-style: none">
          
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