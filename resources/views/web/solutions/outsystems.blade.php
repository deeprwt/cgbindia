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
                                <div class="page-banner text-center">
                                    <h2 class="title ">Outsystems</h2>
                                    <ul class="breadcrumb justify-content-center">
                                        <li class="breadcrumb-item"><a href="{{ url('/') }}" class="">Home</a></li>
                                        <li class="breadcrumb-item active " aria-current="page">Outsystems</li>
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
            <!-- new section start  -->
            <div class="section section-padding">
                <div class="container">
                    <div class="row">
                                <div class="col-md-12 align-items-center">
                                    <div class="report-career-content report-career-2-content">
                                        <div class="section-title section-devider">
                                            <h2 class="title">Outsystems</h2>
                                        </div>                                
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 p-2 text-center">
                                        <video class="w-100" autoplay loop muted>
                                            <source src="{{ url('web/assets/images/videos/outsystems2.mp4') }}" type="video/mp4" />
                                        </video>
                                </div>
                                <div class="col-md-6 col-sm-12 p-2">
                                    <img src="{{ url('web/assets/images/software/outsystems.png') }}" class="img-fluid shadow_drop" alt="outsytems">
                                </div>
                                <div class="col-md-12 col-sm-12 p-2">
                                    <div class="background_hrms">
                                        <img src="{{ url('web/assets/images/software/outsystems_main.png') }}" class="img-fluid p-5 shadow_drop" alt="outsytems">
                                    </div>
                                </div>
                    </div>
                </div>
            </div>
            <!-- new section end  -->

            <!-- new section start  -->
            <div class="section section-padding bg_color_1">
                <div class="container">
                    <div class="row">
                                <div class="col-md-6 col-sm-12 p-2 text-center">
                                    <h1>ATS content</h1>
                                </div>
                                <div class="col-md-6 col-sm-12 p-2">
                                    <img src="{{ url('web/assets/images/software/hrms.png') }}" class="img-fluid shadow_drop" alt="">
                                </div>
                                <div class="col-md-12 col-sm-12 p-2">
                                    <div class="background_ats">
                                        <img src="{{ url('web/assets/images/software/ats.png') }}" class="img-fluid p-5 shadow_drop" alt="">
                                    </div>
                                </div>
                    </div>
                </div>
            </div>
            <!-- new section end  -->

@endsection