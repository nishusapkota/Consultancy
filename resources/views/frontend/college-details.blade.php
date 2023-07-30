@extends('frontend.layouts.master')
@section('title', 'Home')

@section('header')
    @include('frontend.layouts.headers.otherPageHeader')
@endsection
@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@section('content')
    <!--Page Title-->
    <section class="banner-section">
        <div class="banner-carousel owl-theme owl-carousel owl-dots-none autoplay-false">
            @foreach ($images as $image)
                <div class="slide-item " style="height: 20px;">
                    @if (in_array($image->ext, ['jpg', 'jpeg', 'png']))
                    <div class="image-layer" style="background-image: url('{{ asset($image->image) }}')">
                        <!-- Show the image -->
                        <img src="{{ asset($image->image) }}" alt="Current Image" style="max-width: 100%; max-height: 300px;">
                    </div>
                @elseif (in_array($image->ext, ['mp4', 'mov', 'mkv']))
                    <div class="image-layer">
                        <!-- Show the video -->
                        <video autoplay muted loop width="100%" height="490">
                            <source src="{{ asset($image->image) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                @endif
                    <div class="auto-container">
                        <div class="content-box ">
                            {{-- <h5></h5> --}}
                            <h1>{{ $college->uname }}</h1>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </section>
    <!--End Page Title-->

    <!-- main0-content-container -->
    <section class="sidebar-page-container details-content pb-0">
        <div class="auto-container px-lg-3 px-md-2 px-3">
            <div class="row clearfix">
                <div class="col-lg-7 col-md-12 col-sm-12 content-side ml-3 ml-sm-0">
                    <div class="blog-details-content">
                        {!! $college->details !!}
                        
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12">

                    <div>
                        <h3 class="mb-4 mt-3">Fill Out Your Form</h3>

                        @foreach ($errors->all() as $error)
                        <li class="text-danger">{{ $error }}</li>
                        @endforeach
                        <form method="post" action="{{ route('enquiry.post') }}" class='mx-sm-4'>
                            @csrf
                            <div class="form-group">
                                <input type="text" placeholder="Your Name" name="name"
                                    class="@error('name') is-invalid @enderror" required />
                                @error('name')
                                    <small class="form-text text-danger">
                                        {{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="email" placeholder="Email address" name="email"
                                    class="@error('email') is-invalid @enderror" required />
                                @error('email')
                                    <small class="form-text text-danger">
                                        {{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="tel" placeholder="Phone" name="phone"
                                    class="@error('phone') is-invalid @enderror" required />
                                @error('phone')
                                    <small class="form-text text-danger">
                                        {{ $message }}</small>
                                @enderror
                            </div>
                            
                            <input name="university_id" type="text" value="{{ $college->id }}" hidden required />
                            <div class="form-group">
                                <select name="level_id" class="@error('level_id') is-invalid @enderror" required>
                                    <option selected value="">Select Level</option>
                                    @foreach ($levels as $level)
                                        <option value="{{ $level->id }}">{{ $level->name }}</option>
                                    @endforeach
                                </select>
                                @error('level_id')
                                    <small class="form-text text-danger">
                                        {{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <select name="course_id" class="@error('course_id') is-invalid @enderror" required>
                                    <option selected value="">Select Course</option>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                                    @endforeach
                                </select>
                                @error('course_id')
                                    <small class="form-text text-danger">
                                        {{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea placeholder="Message" name="message" class="@error('name') is-invalid @enderror"" required></textarea>
                                @error('message')
                                    <small class="form-text text-danger">
                                        {{ $message }}</small>
                                @enderror
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
    @if (!$certificates->isEmpty())

        <section class="team-section py-0">
            <div class="auto-container px-lg-3 px-md-2 px-0">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 content-side">
                        <div class="upper-box clearfix ">
                            <div class="sec-title style-two pull-left">
                                <h2>Certificates</h2>
                            </div>

                        </div>
                        <div class="four-item-carousel owl-carousel owl-theme owl-nav-none owl-dot-style-one">

                            @foreach ($certificates as $certificate)
                                <div class="team-block-one">
                                    <div class="inner-box" >
                                        <figure class="image-box"><img src="{{ asset($certificate->image) }}" alt="">
                                        </figure>
                                        <div class="lower-content">
                                            <div class="content-box">
                                                <h3 class="course-title">
                                                </h3>
                                                <span class="designation"></span>
                                            </div>
                                            {{-- <div class="ovellay-box">
                                                
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach



                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <section class="team-section py-0">
        <div class="auto-container px-lg-3 px-md-2 px-0">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 content-side">
                    <div class="upper-box clearfix ">
                        <div class="sec-title style-two pull-left">
                            <h2>Our Courses</h2>
                        </div>

                    </div>
                    <div class="four-item-carousel owl-carousel owl-theme owl-nav-none owl-dot-style-one">
                        {{-- @dd($courses) --}}
                        @foreach ($courses as $course)
                            <div class="team-block-one">
                                <div class="inner-box">
                                    <figure class="image-box"><img src="{{ asset($course->image) }}" alt="">
                                    </figure>
                                    <div class="lower-content">
                                        <div class="content-box">
                                            <h3 class="course-title"><a
                                                    href="{{ route('course-detail', ['name' => $course->name, 'university' => $college->uname]) }}">{{ $course->name }}</a>
                                            </h3>
                                            <span class="designation">(
                                                {{ $course->category->name }}
                                                )</span>
                                        </div>
                                        <div class="ovellay-box">
                                            <a href="{{ route('course-detail-from-uni', ['name' => $course->name, 'university' => $college->uname]) }}"
                                                class="theme-btn style-one">View Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach



                    </div>
                </div>
            </div>
        </div>
    </section>



    @if (!$scholarships->isEmpty())
        <section class="team-section pt-0">
            <div class="auto-container px-lg-3 px-md-2 px-0">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 content-side">
                        <div class="upper-box clearfix mb-0">
                            <div class="sec-title style-two pull-left">
                                <h2>Scholarships/Offers</h2>
                            </div>

                        </div>
                        <div class="four-item-carousel owl-carousel owl-theme owl-nav-none owl-dot-style-one">
                            {{-- @dd($courses) --}}
                            @foreach ($scholarships as $course)
                                <div class="team-block-one">
                                    <div class="inner-box">
                                        <figure class="image-box"><img src="{{ asset($course->image) }}" alt="">
                                        </figure>
                                        <div class="lower-content">
                                            <div class="content-box">
                                                <h3 class="course-title"><a
                                                        href="{{ route('course-detail', $course->title) }}">{{ $course->title }}</a>
                                                </h3>
                                            </div>
                                            <div class="ovellay-box">
                                                <a href="{{ route('scholarship-detail', $course->title) }}"
                                                    class="theme-btn style-one">View Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach



                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- main-content-container end -->
@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        @if (Session::has('success'))
            toastr.success('{{ Session::get('success') }}')
        @endif
        $(window).on('load', function() {
        $('.owl-carousel').trigger('refresh.owl.carousel');
        });
    </script>
@endpush
