<header class="main-header style-one style-six">
    <div class="header-lower">
        <div class="auto-container">
            <div class="outer-box clearfix">
                <div class="logo-box pull-left">
                    <figure class="logo"><a href="{{route('index')}}"><img src="frontend/images/TempLogo.png" alt=""></a></figure>
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
                    <figure class="logo"><a href="{{route('index')}}"><img src="frontend/images/TempLogo.png" alt=""></a></figure>
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
        <div class="nav-logo"><a href="{{route('index')}}"><img src="frontend/images/TempLogo.png" alt="" title=""></a></div>
        <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
        <div class="contact-info">
            <h4>Contact Info</h4>
            <ul>
                <li>Baneshwor, Kathmandu, Nepal</li>
                <li><a href="tel:+8801682648101">+(977) 9841111111</a></li>
                <li><a href="mailto:info@example.com">info@example.com</a></li>
            </ul>
        </div>
        <div class="social-links">
            <ul class="clearfix">
                <li><a href=""><span class="fab fa-twitter"></span></a></li>
                <li><a href=""><span class="fab fa-facebook-square"></span></a></li>
                <li><a href=""><span class="fab fa-pinterest-p"></span></a></li>
                <li><a href=""><span class="fab fa-instagram"></span></a></li>
                <li><a href=""><span class="fab fa-youtube"></span></a></li>
            </ul>
        </div>
    </nav>
</div><!-- End Mobile Menu -->