@extends('web.layout.template')
@section('main')
            <!-- Page Banner Start -->
            <div class="section page-banner-section py-5" style="background-image: url({{ url('web/assets/images/bg/brd.jpg') }});">
                <div class="container">
                    <!-- Page Banner Wrapper Start -->
                    <div class="page-banner-wrapper">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Page Banner Content Start -->
                                <div class="page-banner text-center ">
                                    <h2 class="title ">About ISFO</h2>
                                    <ul class="breadcrumb justify-content-center">
                                        <li class="breadcrumb-item"><a href="{{ url('/') }}" class="">Home</a></li>
                                        <li class="breadcrumb-item active " aria-current="page">About ISFO</li>
                                    </ul>
                                </div>
                                <!-- Page Banner Content End -->
                            </div>
                        </div>
                    </div>
                    <!-- Page Banner Wrapper End -->
                </div>
            </div>
            <!-- Page Banner End -->
            <!-- Report Career Section Start -->
        <div class="section report-career-2-section section-padding-02 pb-4 mb-5">
            <div class="container">
                <!-- Report Career Wrapper Start -->
                <div class="report-career-2-wrapper">
                    <div class="row">
                        <div class="col-md-3">
                            <ul class="list-group">
                                <li class="list-group-item"><a href="{{ url('about-isfo') }}"><i class="fa fa-angle-double-right font-weight-bold"></i>  About ISFO</a></li>
                                <li class="list-group-item"><a href="{{ url('advisory-council') }}"><i class="fa fa-angle-double-right font-weight-bold"></i>Advisory Panel </a></li>
                                <li class="list-group-item"><a href="{{ url('our-partner') }}"><i class="fa fa-angle-double-right font-weight-bold"></i>Our Partner</a></li>
                                <li class="list-group-item"><a href="{{ url('why-isfo') }}"><i class="fa fa-angle-double-right font-weight-bold"></i>Why ISFO </a></li>
                            </ul>
                        </div>
                        <div class="col-md-8 d-lg-flex align-items-center">
                            <!-- Report Career Content Start -->
                            <div class="report-career-content report-career-2-content">
                                <div class="section-title section-devider">
                                    <h2 class="title">About ISFO</h2>
                                </div>
                                <p>International Society for Olympiad (ISFO), registered as a non-profit organization in India and UAE, aims to identify, encourage and promote students with a creative bent of mind and affinity towards the disciplines of
Maths, Science and English. It aims to nurture & enhance the latent genius in students through tests & competitive exams of exemplary global quality and standard. ISFO aims to create an army of global learners who challenge the boundaries of existing educational structure & emerge as international Olympiad champions.

                                    </p>
                                <!-- Report Career-3 Wrapper Start -->
                                    <!-- <p>
                                        We focus on application of knowledge and encourage higher order thinking skills. ISFO aims to provide an international platform for students to prove their mettle against students of varying nationalities. 
                                    </p> -->
                                <!-- Report Career-3 Wrapper End -->
                            </div>
                            <!-- Report Career Content End -->
                        </div>
                    </div>
                </div>
                <!-- Report Career Wrapper End -->
            </div>
        </div>
        <!-- Report Career Section End -->

@endsection