@extends('frontend.layouts.master')
@section('title', 'Course-Detail')
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
    <section class="page-title custom-height style-two centred"
        style="background-image: {{ asset('frontend/images/background/page-title-5.jpg') }};">
        <div class="auto-container">
            <div class="content-box clearfix">
                <h1>{{ $course->name }}</h1>
                {{-- <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li>Course Details</li>
                </ul> --}}
            </div>
        </div>
    </section>
    <!--End Page Title-->


    <!-- sidebar-page-container -->
    <section class="sidebar-page-container details-content">
        <div class="auto-container px-3 px-xxl-5">
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                    <div class="blog-details-content">
                        <div class="custom-class">
                            <h2>{{ $course->name }}</h2>

                            {{-- <h3>
                                @if ($course->level_id)
                                    {{ $course->levels->name }} ,
                                @endif
                                @if ($course->cat_id)
                                    {{ $course->category->name }}
                                @endif
                            </h3> --}}
                        </div>
                        <figure class="image-box">
                            <img src="{{ asset($course->image) }}" class="mb-4" alt="">
                            <!-- <span class="category">business</span> -->
                        </figure>
                        <div class="inner-box" style="border-style: none">
                            <!-- <ul class="post-info clearfix">
                                            <li><i class="far fa-user"></i><a href="blog-classic.html">Admin</a></li>
                                        </ul> -->
                            <div class="text">
                                {{-- <h2></h2>
                                <p>Eabore etsu dolore magn aliqua enim veniam quis nostrud exercitas reprehenderit voluptate sed bvelit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.</p>
                                <h5>Eabore dolore magn aliqua enim veniam quis nostrud exercitas reprehenderit sint esse cillum dolore fugiat nulla pariatur excepteur sint.</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elitm sed do eiusmod tempor incididunt labore ets magna aliquatenim minim veniam quis nostrud exercitation ullamco laboris nisut aliquip ex ea commod Duis aute irure dolorn reprehenderit voluptate velit esse. Excepteur sint uda occaecat cupidatat non pro sunt culpa qui officia deserunt mollit anim id est laborum sed utm pers piciatis unde omnis iste dolor nat ipsum diu enimery sed ipsum voluptatem.</p>
                                <h3>How to become a top conference speaker?</h3>
                                <p>Magna aliquatenim minim veniam quis nostrud <span>exercitation ullamco laboris nisut</span> aliquip exa commod Duis aute irure dolorn reprehenderit voluptate velit es. Excepteur sint uda occaecat cupidatat non proid sunt culpa qui officia deserunt mollit anim id est laborum sed utms.</p>
                             --}}
                                {!! $course->description !!}
                            </div>
                            {{-- <div class="two-column">
                                <div class="row clearfix">
                                    <div class="col-md-6 col-sm-12 image-column">
                                        <figure class="image-box"><img src="{{asset($course->image)}}" alt=""></figure>
                                    </div>
                                    <div class="col-md-6 col-sm-12 image-column">
                                        <figure class="image-box"><img src="{{asset($course->image)}}" alt=""></figure>
                                    </div>
                                </div>
                            </div> --}}

                        </div>
                        
                            <h4>
                                @if ($course->level_id)
                                    {{ $course->levels->name }} ,
                                @endif
                                @if ($course->cat_id)
                                    {{ $course->category->name }}
                                @endif
                            </h4>
                        

                    </div>
                </div>

                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div>
                        <h3 class="mb-4 mt-3">Fill Your Form</h3>
                        @foreach ($errors->all() as $error)
                        <li class="text-danger">{{ $error }}</li>
                        @endforeach
                        <form method="post" action="{{route('enquiry.post')}}">
                            @csrf
                            <div class="form-group">
                                <input type="text" placeholder="Your Name"  name="name" class="@error('name') is-invalid @enderror" required/>
                                @error('name')
                                    <small class="form-text text-danger">
                                        {{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="email" placeholder="Email address"  name="email" class="@error('email') is-invalid @enderror" required/>
                                @error('email')
                                    <small class="form-text text-danger">
                                        {{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="tel" placeholder="Phone" name="phone"  class="@error('phone') is-invalid @enderror" required/>
                                @error('phone')
                                    <small class="form-text text-danger">
                                        {{ $message }}</small>
                                @enderror
                            </div>
                            
                            <input name="course_id" value="{{$course->id}}" hidden/>
                            <div class="form-group">
                              <select name="level_id" class="@error('level_id') is-invalid @enderror" required>
                                <option selected value="">Select Level</option>
                                @foreach ($levels as $level)
                                <option value="{{$level->id}}" @if ($level->id && !is_null($level->id))
                                    selected
                                    @endif>{{$level->name}}</option>
                                @endforeach
                              </select>
                              @error('level_id')
                                    <small class="form-text text-danger">
                                        {{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                              <select name="university_id" class="@error('university_id') is-invalid @enderror" required>
                                <option selected value="">Select University</option>
                                @foreach ($universities as $uni)
                                <option value="{{$uni->id}}"
                                    @if ($uni->id && !is_null($uni->id))
                                    selected
                                    @endif
                                    >{{$uni->uname}}</option>
                                @endforeach
                              </select>
                              @error('university_id')
                                    <small class="form-text text-danger">
                                        {{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea placeholder="Message" name="message" class="@error('name') is-invalid @enderror" required></textarea>
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
        </div>

        </div>
        </div>


    </section>
    <!-- sidebar-page-container end -->
    @if (!$universities->isEmpty())
    <section class="team-section py-0">
        <div class="auto-container px-lg-3 px-md-2 px-0">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 content-side">
                    <div class="upper-box clearfix ">
                        <div class="sec-title style-two pull-left">
                            <h2>College/University</h2>
                        </div>

                    </div>
                    <div class="four-item-carousel owl-carousel owl-theme owl-nav-none owl-dot-style-one">
                        {{-- @dd($courses) --}}
                        @foreach ($universities as $university)
                            <div class="team-block-one">
                                <div class="inner-box">
                                    <figure class="image-box"><img src="{{ asset($university->image) }}" alt="">
                                    </figure>
                                    <div class="lower-content">
                                        <div class="content-box">
                                            <h3 class="course-title"><a
                                                    href="{{ route('college-detail', $university->uname) }}">{{ $university->uname }}</a>
                                            </h3>
                                            {{-- <span class="designation">(
                                                {{ $->category->name }}
                                                )</span> --}}
                                        </div>
                                        {{-- {{ route('course-d-from-uni', ['name' => $course->name, 'university' => $college->uname]) }} --}}
                                         <div class="ovellay-box">
                                            <a href="{{ route('college-detail', $university->uname) }}"
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
@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        @if(Session::has('success'))
           //  toastr.info("Have fun storming the castle!")
            toastr.success('{{ Session::get('success') }}')
            @endif

    </script>
@endpush
