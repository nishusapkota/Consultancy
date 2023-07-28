@extends('frontend.layouts.master')
@section('title', 'Courses')
@section('header')
    @include('frontend.layouts.headers.otherPageHeader')
@endsection
@push('style')
    <style>
        .card-header{
            background: #0275d8;
        }
        .card-header h6{
            color: white;
        }
    </style>
@endpush
@section('content')
    <!--Page Title-->
    <section class="page-title style-two centred" style="background-image:  {{asset('frontend/images/background/page-title-3.jpg')}}}">
        <div class="auto-container">
            <div class="content-box clearfix">
                <h1>Our Courses</h1>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- service-section -->
    <section class="service-section">


        <div class="custom-component">
            <div class="filter-component">
                <div class="container-lg filter-container">
                    <h1 class="filter-title">Filter</h1>
                    <form action="{{route('courses')}}" method="get">

                        <div class="card">
                            <article class="card-group-item">
                                <a class="btn px-0" data-toggle="collapse" href="#collapseExample3" role="button"
                                    aria-expanded="false" aria-controls="collapseExample" style="width:100%;">
                                <header class="card-header">
                                        <h6 class="title">University</h6>
                                    </header>
                                </a>
                                <div class="filter-content collapse" id="collapseExample3">
                                    <div class="card-body">
                                        @foreach ($universities as $level)
                                        {{-- @dd(in_array($level->id,$inputs['university_id'])) --}}
                                        <label class="form-check">
                                            <input class="form-check-input" type="checkbox" name="university_id[]" @if (in_array($level->id,$inputs['university_id']))
                                            checked
                                            @endif
                                                value="{{$level->id}}" />
                                            <span class="form-check-label"> {{$level->uname}} </span>
                                        </label> 
                                            @endforeach
                                     
                                    </div>
                                    <!-- card-body.// -->
                                </div>
                            </article>
                            <article class="card-group-item">
                                <a class="btn px-0" data-toggle="collapse" href="#collapseExample2" role="button"
                                    aria-expanded="false" aria-controls="collapseExample" style="width:100%;">
                                <header class="card-header">
                                        <h6 class="title">Level</h6>
                                    </header>
                                </a>
                                <div class="filter-content collapse" id="collapseExample2">
                                    <div class="card-body">
                                        @foreach ($levels as $level)
                                        <label class="form-check">
                                            <input class="form-check-input" type="checkbox" name="level_id[]"
                                                value="{{$level->id}}"  @if (in_array($level->id,$inputs['level_id']))
                                                checked
                                                @endif/>
                                            <span class="form-check-label"> {{$level->name}} </span>
                                        </label> 
                                            @endforeach
                                     
                                    </div>
                                    <!-- card-body.// -->
                                </div>
                            </article>
                            <!-- card-group-item.// -->
    
                            {{-- <article class="card-group-item">
                                <a class="btn px-0" data-toggle="collapse" href="#collapseExample" role="button"
                                    aria-expanded="false" aria-controls="collapseExample" style="width:100%;">
                                <header class="card-header">
                                        <h6 class="title">Courses</h6>
                                    </header>
                                </a>
                                <div class="filter-content collapse" id="collapseExample">
                                    <div class="card-body">
                                        <form>
                                            @foreach ($courses as $course)
                                            <label class="form-check">
                                                <input class="form-check-input" type="checkbox" value="{{$course->id}}" />
                                                <span class="form-check-label">{{$course->name}}</span>
                                            </label>
                                            @endforeach
                                            
                                            
                                            
                                            
                                            
        
                                        </form>
                                    </div>
                                    
                                </div>
                            </article> --}}
                            <button type="submit " class="theme-btn style-one" id="filterBtrn">
                                Filter
                            </button>
                            <!-- card-group-item.// -->
                        </div>
                    </form>
                    <!-- card.// -->

                </div>
            </div>

            <div class="course-component" style="margin-top: 4%;">
              @foreach ($courses as $course )
              {{-- @dd($course) --}}
              <div class="team-block-one">
                <div class="inner-box">
                    <figure class="image-box">
                        <img src="{{ asset($course->image) }}" alt="" />
                    </figure>
                    <div class="lower-content">
                        <div class="content-box">
                            <h3 class="course-title">
                               {{$course->name}}
                                
                            </h3>
                            <span class="designation">({{$course->category->name}})</span>
                            <div class="link view-course"><a href="{{ route('course-detail',$course->name) }}"><i class="fas fa-arrow-right uni-icon"></i><span>View detail</span></a></div>

                        </div>

                    </div>
                </div>
            </div>
              @endforeach
                
                

            </div>
        </div>
    </section>
    <!-- service-section end -->

    

@endsection
@push('script')
    
@endpush
