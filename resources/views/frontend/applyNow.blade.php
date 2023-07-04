@extends('frontend.layouts.master')
@section('title', 'ApplyNow')
@section('header')
    @include('frontend.layouts.headers.otherPageHeader')
@endsection
@section('content')
<!--Page Title-->
<section class="page-title centred" style="background-image: {{asset('frontend/images/background/page-title-2.jpg')}};">
    <div class="auto-container">
        <div class="content-box clearfix">
            <h1>Apply Now</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="index.html">Home</a></li>
                <li>Apply</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->


    <!-- support-section -->
    <section class="support-section service-page-1 mt-4 form-container">
        <div class="auto-container">
          <div class="inner-container">
            <div class="row clearfix">
              <div class="col-lg-7 col-md-6 col-sm-12 inner-column">
                <div class="inner-box">
                  <div class="sec-title light left">
                    <h5>enquiry</h5>
                    <h2>Contact Us</h2>
                    <p>
                      If you have any queries related to our service then please
                      feel free to contact us anytime.
                    </p>
                  </div>
  
                  <form>
                    <div class="form-group">
                      <input type="text" placeholder="Your Name" />
                    </div>
                    <div class="form-group">
                      <input type="email" placeholder="Email address" />
                    </div>
                    <div class="form-group">
                      <input type="tel" placeholder="Phone" />
                    </div>
                    <div class="form-group">
                      <select>
                        <option selected disabled>Select Level</option>
                        <option>Bachelor</option>
                        <option>Masters</option>
                        <option>Doctorate</option>
                        <option>PhD</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <select>
                        <option selected disabled>Select Course</option>
                        <option>BBA</option>
                        <option>MBA</option>
                        <option>DBA</option>
                        <option>MSIT</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <textarea placeholder="Message"></textarea>
                    </div>
                    <div class="form-group message-btn">
                      <button type="submit" class="theme-btn style-one">
                        Submit
                      </button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="col-lg-5 col-md-6 col-sm-12 info-column">
                <div class="info-inner">
                  <figure class="image-box">
                    <img src="{{asset('frontend/images/resource/info-1.jpg')}}" alt="" />
                  </figure>
                  <div class="info-box">
                    <figure class="info-logo">
                      <img src="{{asset('frontend/images/icons/info-logo.png')}}" alt="" />
                    </figure>
                    <div class="icon-box"><i class="fas fa-phone"></i></div>
                    <h2><a href="tel:18003698527">(+977) 9841111111</a></h2>
                    <div class="email">
                      <a href="mailto:support@my-domain.net"
                        >support@my-domain.net</a
                      >
                    </div>
                    <ul class="list-item clearfix">
                      <li>.&nbsp;<a href="index.html">Experienced</a>&nbsp;.</li>
                      <li><a href="index.html">Specialized</a>&nbsp;.</li>
                      <li><a href="index.html">Professional</a>&nbsp;.</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- support-section end -->
@endsection