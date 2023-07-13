@extends('web.layout.template')
@section('main')
<div class="section page-banner-section py-5" style="background-image: url({{ url('web/assets/images/bg/brd.jpg') }});">
    <div class="container">
        <!-- Page Banner Wrapper Start -->
        <div class="page-banner-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Page Banner Content Start -->
                    <div class="page-banner text-center">
                        <h2 class="title ">Testimonials</h2>
                        <ul class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}" class="">Home</a></li>
                            <li class="breadcrumb-item active " aria-current="page">Testimonials </li>
                        </ul>
                    </div>
                    <!-- Page Banner Content End -->
                </div>
            </div>
        </div>
        <!-- Page Banner Wrapper End -->
    </div>
</div>
<div class="section testimonial-section section-padding">
    <div class="container">
        <div class="section-title text-center">
            <h2 class="title">TESTIMONIALS</h2>
        </div>
        <!-- Testimonial Wrapper Start -->
        <div class="testimonial-wrapper swiper-container testimonial-active">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <!-- Single Testimonial Start -->
                    <div class="single-testimonial">
                        <div class="testimonial-img">
                            <img src="{{ url('web/assets/images/testimonial/t1.jpg') }}" alt="">
                        </div>
                        <div class="testimonial-content color-1">
                            <p>“ISFO gave my child the opportunity to compete with other children from different schools. It has enhanced her outlook, skills and her overall personality. The books of ISFO are commendable, my child reads them in her leisure time too. The sample papers, practice questions etc available online are very helpful in the study. Competitions like this should be conducted more often.”<br>
                                Mother of Delisha Mehta, Grade 9,<br>
                                Pathways World Schools, Aravali</p>
                            
                            <div class="testimonial-bottom">
                                <div class="name-degree">
                                    <span class="name">Dr. Vijita Mehta</span>
                                   
                                </div>
                                <span><i class="flaticon-straight-quotes"></i></span>
                            </div>
                        </div>
                    </div>
                    <!-- Single Testimonial End -->
                </div>
                <div class="swiper-slide">
                    <!-- Single Testimonial Start -->
                    <div class="single-testimonial">
                        <div class="testimonial-img">
                            <img src="{{ url('web/assets/images/testimonial/t2.jpg') }}" alt="">
                        </div>
                        <div class="testimonial-content color-2">
                            <p>We at Kalinga Public School are very thankful to International Society for Olympiad for having given our students an opportunity to participate in a truly International contest. We are even extremely happy with the success of our student Arpita Tripathy who has topped in the class 2 pass category.<br>
                                Wishing ISFO the very best for all its accomplishments and also confirming the participation of my school in all its future endeavors.<br>
                                Principal, KPS</p>
                            <div class="testimonial-bottom">
                                <div class="name-degree">
                                    <span class="name">Sombhadra Tripathy</span>
                                 
                                </div>
                                <span><i class="flaticon-straight-quotes"></i></span>
                            </div>
                        </div>
                    </div>
                    <!-- Single Testimonial End -->
                </div>
                <div class="swiper-slide">
                    <!-- Single Testimonial Start -->
                    <div class="single-testimonial">
                        <div class="testimonial-img">
                            <img src="{{ url('web/assets/images/testimonial/t3.jpg') }}" alt="">
                        </div>
                        <div class="testimonial-content w-100 color-3 ">
                            <p class="w-100">For the first time SASMO has been brought to India by ISFO. It is truly encouraging that the 2nd level of the examinations will be held abroad. We are happy that our state Odisha has been included as one of the states in its first year of launch by Indian co-ordinating agency ISFO.<br>
                                A parent of class VI student of DAV public school, Bhubaneswar</p>
                            <div class="testimonial-bottom">
                                <div class="name-degree">
                                    <span class="name">Chittaranjan Pragyan</span>
                                   
                                </div>
                                <span><i class="flaticon-straight-quotes"></i></span>
                            </div>
                        </div>
                    </div>
                    <!-- Single Testimonial End -->
                </div>
                <div class="swiper-slide">
                    <!-- Single Testimonial Start -->
                    <div class="single-testimonial">
                        <div class="testimonial-img">
                            <img src="{{ url('web/assets/images/testimonial/t4.jpg') }}" alt="">
                        </div>
                        <div class="testimonial-content color-4">
                            <p>At the outset I would like to thank International Society for Olympiad for having brought in an Olympiad of International level to our country. It has given the students of my school an excellent opportunity to get exposed to the highest level of testing.<br>
                                Again I would like to thank International Society for Olympiad for having undertaken this endeavour and wish them the very best for all their future endeavours.
                            </p>
                            <div class="testimonial-bottom">
                                <div class="name-degree">
                                    <span class="name">K. K. Rao</span>
                                 
                                </div>
                                <span><i class="flaticon-straight-quotes"></i></span>
                            </div>
                        </div>
                    </div>
                    <!-- Single Testimonial End -->
                </div>

            </div>
            <!-- Add Pagination -->
            <div class="testimonial-arrow swiper-button-next"></div>
            <div class="testimonial-arrow swiper-button-prev"></div>

            <div class="swiper-pagination"></div>
        </div>
    </div>
</div>
@endsection