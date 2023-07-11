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
            @foreach ($blogs as $blog)
            <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                <div class="news-block-one wow fadeInUp animated animated">
                    <div class="inner-box">
                        <figure class="image-box"><a href="#"><img src="{{asset($blog->image)}}" alt=""></a></figure>
                        <div class="lower-content">
                            <ul class="post-info">
                                {{-- <li>August 25, 2028</li> --}}
                            </ul>
                            <h3><a href="{{route('blog-detail',Crypt::encrypt($blog->id))}}">{{$blog->title}}</a></h3>
                            <p>{{$blog->short_description}}</p>
                            <div class="link"><a href="{{route('blog-detail',Crypt::encrypt($blog->id))}}"><i class="fas fa-arrow-right"></i><span>Read More</span></a></div>
                        </div>
                    </div>
                </div>
            </div> 
            @endforeach
        </div>
    </div>
</section>
<!-- news-section end -->

@endsection