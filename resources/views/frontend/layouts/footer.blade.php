<footer class="main-footer alternet-5">
    <div class="footer-upper">
        <div class="auto-container">
            <div class="upper-inner clearfix">
                <div class="text pull-left">
                    <h2>Do you want to learn about us?</h2>
                    <p>If you have any further queries regarding our services then please feel free to contact us anytime.</p>
                </div>
                <div class="btn-box pull-right">
                    <a href="{{route('contact')}}" class="theme-btn style-one">Get In Touch Today</a>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-top">
        <div class="auto-container">
            <div class="widget-section">
                <div class="footer-container">

                    <div class="col-lg-3 col-md-6 col-sm-12 footer-column first-content">
                        <div class="footer-widget logo-widget">
                            <figure class="footer-logo"><a href="{{route('index')}}"><img src="{{asset($footer->image)}}" alt=""></a></figure>
                            <div class="text">
                                <p>{{$footer->description}}</p>
                            </div>
                            <ul class="info-list clearfix">
                                <li><i class="fas fa-map-marker-alt"></i>{{$footer->address}}</li>
                                <li><i class="fas fa-envelope"></i>Email <a href="mailto:{{$footer->email}}">{{$footer->email}}</a></li>
                                <li><i class="fas fa-headphones"></i>Support <a href="tel:{{$footer->phone}}">(+977){{$footer->phone}}</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                        <div class="footer-widget links-widget ml-70">
                            <div class="widget-title">
                                <h4>Useful Links</h4>
                            </div>
                            <div class="widget-content">
                                <ul class="list clearfix">
                                    <li><a href="{{route('index')}}">Home</a></li>
                                    <li><a href="{{route('courses')}}">Course</a></li>
                                    <li><a href="{{route('college')}}">University/Colleges</a></li>
                                    <li><a href="{{route('scholarship')}}">Scholarship</a></li>
                                    <li><a href="{{route('blog')}}">Blogs</a></li>
                                    <li><a href="{{route('contact')}}">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                        <div class="footer-widget links-widget">
                            <div class="widget-title">
                                <h4>Social Links</h4>
                            </div>
                            <div class="socialLink">
                                <ul class="list clearfix">
                                    @foreach($socialMedias as $socialMedia)
                                   
                                        <li><i class="fab fa-{{$socialMedia->name}} socio-icon"></i> <a href="{{$socialMedia->link}}">{{$socialMedia->link}}</a></li>
                                        @endforeach
                                    {{-- <li><i class="fab fa-facebook-f socio-icon"></i> <a href="">Facebook</a></li>
                                    <li><i class="fab fa-twitter socio-icon"></i> <a href="">Twitter</a> </li>
                                    <li><i class="fab fa-instagram socio-icon"> </i> <a href="">Instagram</a></li>
                                    <li><i class="fab fa-linkedin-in socio-icon"></i> <a href="">LinkedIn</a></li>
                                    <li><i class="fab fa-pinterest-p socio-icon"></i> <a href="">Pinterest</a></li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="auto-container">
            <div class="copyright"><p>&copy; 2020 <a href="{{route('index')}}">SPELL</a> - Business & Consulting. All rights reserved.</p></div>
        </div>
    </div>
</footer>
<!--Scroll to top-->
<button class="scroll-top scroll-to-target" data-target="html">
    <span class="fa fa-arrow-up"></span>
</button>


<!-- sidebar cart item -->
<div class="xs-sidebar-group info-group info-sidebar">
    <div class="xs-overlay xs-bg-black"></div>
    <div class="xs-sidebar-widget">
        <div class="sidebar-widget-container">
            <div class="widget-heading">
                <a href="#" class="close-side-widget">X</a>
            </div>
            <div class="sidebar-textwidget">
            <div class="sidebar-info-contents">
                <div class="content-inner">
                    <div class="upper-box">
                        <div class="logo">
                            <a href="{{route('index')}}"><img src="{{asset('frontend/images/sidebar-logo.png')}}" alt="" /></a>
                        </div>
                        <div class="text">
                            <p>Exercitation ullamco laboris nis aliquip sed conseqrure dolorn repreh deris ptate velit ecepteur duis.</p>
                        </div>
                    </div>
                    <div class="side-menu-box">
                        <div class="side-menu">
                            <nav class="menu-box">
                                <div class="menu-outer">
                                    
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="info-box">
                        <h3>Get in touch</h3>
                        <ul class="info-list clearfix">
                            <li><i class="fas fa-map-marker-alt"></i>838 Andy Street, Madison, NJ</li>
                            <li><i class="fas fa-envelope"></i><a href="mailto:support@my-domain.com">support@my-domain.com</a></li>
                            <li><i class="fas fa-headphones-alt"></i><a href="tel:101005200369">+1  0100 5200 369</a></li>
                            <li><i class="far fa-clock"></i>Monday to Friday: 9am - 6pm</li>
                        </ul>
                        <form action="http://azim.commonsupport.com/Fionca/index.html" method="post" class="subscribe-form">
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Email address" required="">
                                <button type="submit" class="theme-btn style-one">subscribe now</button>
                            </div>
                        </form>
                        <ul class="social-links clearfix">
                            <li><a href="{{route('index')}}"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="{{route('index')}}"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="{{route('index')}}"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="{{route('index')}}"><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a href="{{route('index')}}"><i class="fab fa-pinterest-p"></i></a></li>
                            <li><a href="{{route('index')}}"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
                
            </div>
        </div>
    </div>
</div>
@include('frontend.layouts.script')