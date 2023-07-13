@extends('frontend.layouts.master')
@section('title', 'Contact')
@section('header')
    @include('frontend.layouts.headers.otherPageHeader')
@endsection
@section('content')
<!--Page Title-->
<section class="page-title centred" style="background-image: {{asset('frontend/images/background/page-title-5.jpg')}};">
    <div class="auto-container">
        <div class="content-box clearfix">
            <h1>Contact Us</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{route('index')}}">Home</a></li>
                <li>Get In Touch</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->

{{-- @dd($contact) --}}
<!-- contact-information -->
<section class="contact-information centred">
    <div class="auto-container">
        <div class="sec-title right">
            <h5>{{$contact?$contact->title:null}}</h5>
            <h2>{{$contact?$contact->short_description:null}}</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-4 col-md-6 col-sm-12 single-column">
                <div class="single-item wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="icon-box"><i class="far fa-map"></i></div>
                        <h3>Office Location</h3>
                        <p>{{$contact?$contact->address:null}}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 single-column">
                <div class="single-item wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="icon-box"><i class="fas fa-phone"></i></div>
                        <h3>Calling Support</h3>
                        <p> <a href="tel:{{$contact?$contact->phone_primary:null}}">{{$contact?$contact->phone_primary:null}}</a></p>
                        <p><a href="tel:{{$contact?$contact->phone_secondary:null}}">{{$contact?$contact->phone_secondary:null}}</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 single-column">
                <div class="single-item wow fadeInUp" data-wow-delay="400ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="icon-box"><i class="far fa-envelope-open"></i></div>
                        <h3>Email Information</h3>
                        <p><a href="mailto:{{$contact?$contact->email_primary:null}}">{{$contact?$contact->email_primary:null}}</a><br /><a href="mailto:{{$contact?$contact->email_secondary:null}}">{{$contact?$contact->email_secondary:null}}</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact-information end -->






<!-- contact-style-two -->
<section class="contact-style-two" style="background-image: {{asset('frontend/images/background/contact-3.jpg')}};">
    <div class="auto-container">
        <div class="col-xl-8 col-lg-12 col-md-12 inner-column">
            <div class="sec-title left light">
                <h5>try our service</h5>
                <h2>Drop Us a Line</h2>
                <p>If you have any queries related to our service <br />Please feel free to contact us.</p>
            </div>
            <form method="post" action="http://azim.commonsupport.com/Fionca/sendemail.php" id="contact-form" class="default-form"> 
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                        <input type="text" name="username" placeholder="Your Name" required="">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                        <input type="email" name="email" placeholder="Email address" required="">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                        <input type="text" name="phone" placeholder="Phone" required="">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                        <input type="text" name="subject" placeholder="Subject" required="">
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                        <textarea name="message" placeholder="Message"></textarea>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                        <button class="theme-btn style-one" type="submit" name="submit-form">Send Query</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- contact-style-two end -->


@endsection