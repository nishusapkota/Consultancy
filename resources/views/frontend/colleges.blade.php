@extends('frontend.layouts.master')
@section('title', 'Colleges/Universities')
@section('header')
    @include('frontend.layouts.headers.otherPageHeader')
@endsection

@section('content')
    <!--Page Title-->
    <section class="page-title custom-height style-two centred"
        style="background-image: {{ asset('frontend/images/background/page-title-3.jpg') }};">
        <div class="auto-container">
            <div class="content-box clearfix">
                <h1>LIST OF TOP UNIVERSITIES IN INDIA</h1>
                {{-- <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li>University</li>
                </ul> --}}
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- University-section -->

    <section class="university-section">
        <div class="university-container mt-5">
            <div class="parent-uni-container">
                @foreach ($universities as $university)
                    <div class="uni-container">
                        <div class="news-block-one inner-uni">

                            <div class="rounded inner-div">
                                <figure class="image-box"><a href="{{ route('college-detail', $university->uname) }}">
                                        <img src="{{ asset($university->image) }}" alt="" class="uni-image"></a>
                                </figure>
                                <div class="lower-content uni-lower-content">
                                    <ul class="post-info">
                                        {{-- <li>ESTD. 1997</li> --}}
                                    </ul>
                                    <h3 class="uni-title-main"><a href="{{ route('college-detail', $university->uname) }}"
                                            class="uni--title">{{ $university->uname }}</a></h3>
                                    <!-- <p>Exea conse quat duis irurey dolor sed reprehen derit volupta velit cilum lorem incididunt labore sed magna exceptur aliqua.</p> -->
                                    <div class="link view-course"><a
                                            href="{{ route('college-detail', $university->uname) }}"><i
                                                class="fas fa-arrow-right uni-icon"></i><span>View detail</span></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach



            </div>
        </div>
    </section>
    <!-- University-section end -->
@endsection
