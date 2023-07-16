<header class="main-header style-one style-six">
    <div class="header-top">
            <div class="auto-container">
                <div class="top-inner clearfix">
                    <ul class="info top-left pull-left">
                        <li><i class="fas fa-map-marker-alt"></i>{{$footer->address}}</li>
                        <li><i class="fas fa-headphones"></i>Support <a href="tel:{{$footer->phone}}">{{$footer->phone}}</a></li>
                    </ul>
                    <div class="top-right pull-right">
                        <ul class="social-links clearfix">
                            @foreach($socialMedias as $socialMedia)
                            <li><a href="{{$socialMedia->link}}"><span class="fab fa-{{$socialMedia->name}}"></span></a></li>
                            @endforeach
                            {{-- <li><a href="index.html"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="index.html"><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a href="index.html"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="index.html"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="index.html"><i class="fab fa-instagram"></i></a></li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    <div class="header-lower">
        <div class="auto-container">
            <div class="outer-box clearfix">
                <div class="logo-box pull-left">
                    <figure class="logo">
                        <a href="{{route('index')}}"><img src="{{asset($footer->image)}}" alt="" width="150" height="50"></a></figure>
                </div>
                <div class="menu-area pull-right">
                    <div class="mobile-nav-toggler">
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                    </div>
                    <nav class="main-menu navbar-expand-md navbar-light">
                        <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix">
                                <li class="{{ request()->is('/') ? 'current' : '' }}">
                                    <a href="{{ route('index') }}">Home</a>
                                </li> 
                                <li class="{{ request()->is('courses') ? 'current' : '' }}">
                                    <a href="{{ route('courses') }}">Courses</a>
                                </li>
                                <li class="{{ request()->is('colleges') ? 'current' : '' }}">
                                    <a href="{{ route('college') }}">University/Colleges</a>
                                </li>
                                <li class="{{ request()->is('scholarship') ? 'current' : '' }}">
                                    <a href="{{ route('scholarship') }}">Scholarship</a>                                        
                                </li>
                                <li class="{{ request()->is('blogs') ? 'current' : '' }}">
                                    <a href="{{ route('blog') }}">Blogs</a>
                                </li>
                                <li class="{{ request()->is('contacts') ? 'current' : '' }}">
                                    <a href="{{ route('contact') }}">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    
                    <div class="menu-right-content clearfix">
                        <div class="btn-box">
                            <a href="{{route('apply')}}" class="theme-btn style-one">Apply Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- -------------------------------sticky Header -->
    <div class="sticky-header">
        <div class="auto-container">
            <div class="outer-box clearfix">
                <div class="logo-box pull-left">
                    <figure class="logo"><a href="{{route('index')}}"><img src="{{asset($footer->image)}}" alt="" width="150" height="50"></a></figure>
                </div>
                <div class="menu-area pull-right">
                    <nav class="main-menu clearfix">
    <!-- -----------------------------------Keep This Empty / Menu will come through Javascript -->
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Mobile Menu  -->
<div class="mobile-menu">
    <div class="menu-backdrop"></div>
    <div class="close-btn"><i class="fas fa-times"></i></div>
    
    <nav class="menu-box">
        <div class="nav-logo"><a href="{{route('index')}}"><img src="{{asset($footer->image)}}" alt="" title="" width="150" height="50"></a></div>
        <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
        <div class="contact-info">
            <h4>Contact Info</h4>
            <ul>
                <li>{{$footer->address}}</li>
                <li><a href="tel:{{$footer->phone}}">+(977) {{$footer->phone}}</a></li>
                <li><a href="mailto:{{$footer->email}}">{{$footer->email}}</a></li>
            </ul>
        </div>
        <div class="social-links">
            <ul class="clearfix">
                @foreach($socialMedias as $socialMedia)
                <li><a href="{{$socialMedia->link}}"><span class="fab fa-{{$socialMedia->name}}"></span></a></li>
                @endforeach
                {{-- <li><a href=""><span class="fab fa-twitter"></span></a></li>
                <li><a href=""><span class="fab fa-facebook-square"></span></a></li>
                <li><a href=""><span class="fab fa-pinterest-p"></span></a></li>
                <li><a href=""><span class="fab fa-instagram"></span></a></li>
                <li><a href=""><span class="fab fa-youtube"></span></a></li> --}}
            </ul>
        </div>
    </nav>
</div><!-- End Mobile Menu -->