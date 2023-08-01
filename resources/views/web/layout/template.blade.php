<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    
    
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{ url('web/assets/css/plugins/all.min.css') }}">
    <link rel="stylesheet" href="{{ url('web/assets/css/plugins/flaticon.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ url('web/assets/css/plugins/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('web/assets/css/plugins/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ url('web/assets/css/plugins/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ url('web/assets/css/plugins/aos.css') }}">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ url('web/assets/css/style.css') }}">
        @yield('head')

    <!--====== Use the minified version files listed below for better performance and remove the files listed above ======-->
    <!-- <link rel="stylesheet" href="assets/css/vendor/plugins.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css"> -->

</head>

<body>

    <div class="main-wrapper">


        <!-- Preloader start -->
        <div class="preloader">
            <div class="loader">
                <div class="ytp-spinner">
                    <div class="ytp-spinner-container">
                        <div class="ytp-spinner-rotator">
                            <div class="ytp-spinner-left">
                                <div class="ytp-spinner-circle"></div>
                            </div>
                            <div class="ytp-spinner-right">
                                <div class="ytp-spinner-circle"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Preloader End -->

   <!-- Header Start  -->
   <div id="header" class="header section">

            <div class="container">

                <!-- Header Wrapper Start  -->
                <div class="header-wrapper">
                      <!-- Header Logo start -->
                <div class="header-logo d-md-none d-none d-lg-block">
                        <a href="{{ url('/') }}" class="flex-lg-row d-flex "><img src="{{ url('web/assets/images/logo/cgb.png') }}" class="img-fluid" alt="Logo"></a>
                    </div>
                     <!-- Header Logo End -->
                    <!-- Header Right Start -->
                    <div class="header-right">
            

                        <!-- Header Menu Start -->
                        <div class="header-menu d-none d-lg-block">
                            <ul class="main-menu">
                                <li><a href="{{ url('/') }}">Home</a></li>                               
                                    <!-- <ul class="sub-menu">
                                        <li><a href="{{ url('about-isfo') }}">About ISFO</a></li>
                                        <li><a href="{{ url('advisory-council') }}">Advisory Panel </a></li>
                                        <li><a href="{{ url('our-partner') }}">Our Partner</a></li>
                                        <li><a href="{{ url('why-isfo') }}">Why ISFO </a></li>
                                    </ul> -->
                                </li>
                                <li><a href="{{ url('/#people') }}">People</a></li>                               
                                <li><a href="{{ url('/#tech') }}">Tech</a></li>
                                <li><a href="{{ url('/#build') }}">Build</a></li>                                                                
                            </ul>
                        </div>
                        <!-- Header Menu End -->

                        <!-- Header Meta Start -->
                        <div class="header-meta">
                            <div class="header-login-join d-none d-lg-block">
                              
                                <a class="btn join-btn" href="{{ url('contact') }}">Contact Us</a>
                            </div>
                            <!-- Header Login Join End -->
                        </div>
                        <!-- Header Meta End -->

                        <div class="header-toggle d-lg-none">
                            <button data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                    <!-- Header Right End -->

                      <!-- Header Logo Start -->
                      <div class="header-logo  d-lg-none">
                        <a href="{{ url('/') }}" class="flex-lg-row d-flex"> &nbsp; <img src="{{ url('web/assets/images/logo/cgb.png') }}" class="img-fluid" alt="Logo"></a>
                    </div>
                    <!-- Header Logo End -->
                </div>
                <!-- Header Wrapper End -->

            </div>
        </div>

        <div class="offcanvas offcanvas-start" id="offcanvasMenu">

            <div class="offcanvas-header">
                <!-- Offcanvas Logo Start -->
                <div class="offcanvas-logo">
                    <a href="#"><img src="assets/images/logo.png" alt=""></a>
                </div>
                <!-- Offcanvas Logo End -->
                <button class="btn-close" data-bs-dismiss="offcanvas"></button>
            </div>
        
            <div class="offcanvas-body">
                <div class="offcanvas-menu">
                    <ul class="main-menu">
                        <li><a href="{{ url('/') }}">Home</a></li>                                
                        <li><a href="{{ url('/#people') }}">
                        <button class="btn_nav_cls" data-bs-dismiss="offcanvas">People</button>
                        </a>
                            <!-- <ul class="sub-menu">
                                <li><a href="{{ url('about-isfo') }}">About ISFO</a></li>
                                <li><a href="{{ url('advisory-council') }}">Advisory Panel </a></li>
                                <li><a href="{{ url('our-partner') }}">Our Partner</a></li>
                                <li><a href="{{ url('why-isfo') }}">Why ISFO </a></li>
                            </ul> -->
                        </li>
                        <li><a href="{{ url('/#tech') }}"><button class="btn_nav_cls" data-bs-dismiss="offcanvas">Tech</button></a></li>                       
                        <li><a href="{{ url('/#build') }}"><button class="btn_nav_cls" data-bs-dismiss="offcanvas">Build</button></a></li>                      
                        <a class="btn join-btn" href="{{ url('contact') }}">Contact Us</a>
                    </ul>
                </div>
            </div>
        
        </div>
        <!-- Offcanvas End -->
        
        
        <!-- Header End -->

        <!-- Offcanvas Start -->
       
      @yield('main')
        <!-- Call to Action End -->
        <!-- Footer Start -->
     
        <div class="footer-section section hero-section-4 header_background">
            <div class="container">
                    <div class="row">
                        <div class="col-md-3 ">
                            <div class="header-logo">
                            </div>
                            <a href="{{ url('/') }}"><img src="{{ url('web/assets/images/logo/cgb.png') }}"  style="width:auto;height:80px;margin:10px;" alt="Logo"></a>
                            <br>
                            <p class="text-light"> <i class="fa fa-home"></i> No.1/1, 1 st Floor, 21 st Cross,
                            CMH Road,Lakshmipuram,
                             Ulsoor, Bangalore – 560008</p><br>
                            <br>
                            <a href="mailto:info@cgbindia.com" class="text-light">  <i class="fa fa-envelope"></i>&nbsp;&nbsp;info@cgbindia.com</a>
                            <a href="tel:011 41198254" class="text-light"><i class="fa fa-phone"></i>&nbsp;&nbsp;  011 41198254</a>
                        </div>
                        <div class="col-md-3 p-2">
                            <h4 class="text-white">INFORMATION</h4>
                            <hr>
                            <ul class="text-white">
                                <li><a href="{{ url('/') }}" class="hvr-float-shadow">Home </a></li>
                                <li><a href="{{ url('about-isfo') }}" class="hvr-float-shadow">About Us </a></li>
                                <!--<li><a href="https://www.isfo.in/test-your-self.php" class="hvr-float-shadow">Test Yourself</a></li>-->
                                <!--<li><a href="#" class="hvr-float-shadow">Academic Workshops</a></li>-->
                               <!-- <li><a href="https://www.isfo.in/isfo/5" class="hvr-float-shadow">Achiever Section</a></li>-->
                                
                              <!--  <li><a href="#" class="hvr-float-shadow">Gallery</a></li>-->
                                <li><a href="{{ url('contact') }}" class="hvr-float-shadow">Contact Us</a></li>
                                <li><a href="{{ url('faq') }}" class="hvr-float-shadow">Frequently Asked Questions</a></li>
                                
                               </ul>
                               

                        </div>
                        <div class="col-md-3 p-2">
                            <h4 class="text-white">Services</h4>
                            <hr>
                                <ul class="text-white">
                                    <li>
                                    <a  class="hvr-float-shadow" href="#" target="_blank">IT Staffing </a>
                                </li>
                                <li>
                                    <a  class="hvr-float-shadow" href="#" target="_blank">Non IT Staffing</a>
                                    
                                </li>
                                <li><a href="#" target="_blank" class="hvr-float-shadow" >Office and Home Automation</a></li>
                                <li><a href="#" class="hvr-float-shadow" >General Staffing</a></li>
                                <li><a href="#" class="hvr-float-shadow" >Turnkey Design</a></li>
                                </ul>
                        </div>
                        <div class="col-md-3 p-2">
                        <h4 class="text-white">Connect With Us</h4> <hr>
                            
                            <a href="#" class="text-light px-2 "><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            <a href="#" class="text-light px-2 "><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#" class="text-light px-2 "><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            <a href="#" class="text-light px-2 "><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                            <br>
                            <a href="{{ url('/') }}"> <img src="{{ url('web/assets/images/cgb_images/contact.png') }}" class="pb-1" style="width:auto;" alt="Logo"></a>
                           
                            
                        </div>
                       
                    </div>
                <!-- Footer Copyright End -->
                <div class="footer-copyright">
                        <div class="text-center text-light">
                            <p>&copy;  Copyright 2023 CGBIndia | All Rights Reserved.. </p>
                        </div>
                </div>
                <!-- Footer Copyright End -->
            </div>
        </div>
        <!-- Footer End -->
        <!-- Back to Top End -->
        <button class="back-btn" id="backBtn"><i class="flaticon-left-arrow-1"></i></button>
        <!-- Back to Top End -->
    </div>

    <!-- edit new js script  -->

    <!-- JS
    ============================================ -->
   <!-- Main JS -->
    <script src="{{ url('web/assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ url('web/assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ url('web/assets/js/plugins/swiper-bundle.min.js') }}"></script>
    <script src="{{ url('web/assets/js/main.js') }}"></script>
    @yield('js')

</body>

</html>