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
                        <h2 class="title ">Our Partner</h2>
                        <ul class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}" class="">Home</a></li>
                            <li class="breadcrumb-item active " aria-current="page">Our Partner </li>
                        </ul>
                    </div>
                    <!-- Page Banner Content End -->
                </div>
            </div>
        </div>
        <!-- Page Banner Wrapper End -->
    </div>
</div>
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
                <div class="col-md-9 d-lg-flex align-items-center">
                    <!-- Report Career Content Start -->
                    <div class="report-career-content report-career-2-content">
                        <div class="section-title section-devider">
                            <h2 class="title">Our Partner</h2>
                        </div>
                        <p>Eupheus Learning is positioned as the ‘largest, school-focused distribution platform in India’ and is already present in “One out of Four Premium Private Schools of India” in five years of starting operations. The B2B EdTech firm is bridging the gap between in-class and at-home learning by offering pedagogically differentiated, technology-led solutions. With its Classroom-first and Curriculum-focused approach, Eupheus Learning aims to reach 10 million kids in India through its curriculum and specially curated educational offerings in Kinaesthetic Learning, Reading Enhancement, STEM/STEAM, and English language learning via exclusive tie-ups with award-winning education technology companies from across the world. Unique school outreach initiatives like Story Telling Sessions for Kids, Olympiads and Coding Competitions have created differentiation for the company in this highly competitive and contested education market. 
                    </p>
                        <!-- Report Career-3 Wrapper Start -->
                            
                        <!-- Report Career-3 Wrapper End -->
                    </div>
                    <!-- Report Career Content End -->
                </div>
            </div>
        </div>
        <!-- Report Career Wrapper End -->
    </div>
</div>
@endsection