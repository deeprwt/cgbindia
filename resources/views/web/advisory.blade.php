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
                        <h2 class="title ">International Advisory Council</h2>
                        <ul class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}" class="">Home</a></li>
                            <li class="breadcrumb-item active " aria-current="page">Advisory Panel </li>
                        </ul>
                    </div>
                    <!-- Page Banner Content End -->
                </div>
            </div>
        </div>
        <!-- Page Banner Wrapper End -->
    </div>
</div>
        <!-- Team Profile Section Start -->
        <div class="section team-profile-section section-padding-02 mb-3">
            <div class="container mb-5">
                <!-- Team Profile Wrapper Start -->
                <div class="row">
                    <div class="col-md-3">
                        <ul class="list-group">
                            <li class="list-group-item"><a href="{{ url('about-isfo') }}"><i class="fa fa-angle-double-right font-weight-bold"></i>  About ISFO</a></li>
                            <li class="list-group-item"><a href="{{ url('advisory-council') }}"><i class="fa fa-angle-double-right font-weight-bold"></i>Advisory Panel </a></li>
                            <li class="list-group-item"><a href="{{ url('our-partner') }}"><i class="fa fa-angle-double-right font-weight-bold"></i>Our Partner</a></li>
                            <li class="list-group-item"><a href="{{ url('why-isfo') }}"><i class="fa fa-angle-double-right font-weight-bold"></i>Why ISFO </a></li>
                        </ul>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="text-center">
                                    <img src="{{ url('web/assets/images/img/ad1.png') }}" style="width:150px;height:150px" alt="">
                                </div>
                            </div>
                            <div class="col-md-9">
                                <h3 class="name">Henry Ong</h3>
                                    
                                <p>Henry Ong is the managing director at Excel 
                                    League Pte. Ltd. After a successful career in a 
                                    global MNC like Whirlpool, Henry decided to 
                                    run global Maths Competitions like SASMO 
                                    and SIMOC. Today SASMO is held in 25 
                                    countries. Henry is also President of 
                                    Singapore Scholastic Trust (SST) which offers 
                                    various scholarships to meritorious students.</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="text-center">
                                    <img src="{{ url('web/assets/images/img/add22.png') }}" style="width:150px;height:150px" alt="">
                                </div>
                            </div>
                            <div class="col-md-9">
                                <h3 class="name">Dr. Farooq 
                                    Ahmad Wasil</h3>
                                
                                <p>With over 30 years in the field of Education, 
                                    Dr. Farooq Ahmad Wasil, with a doctorate 
                                    specializing in Education, is currently with 
                                    Goldline Education, Dubai, UAE, as Chief 
                                    Executive Officer. He has been awarded 
                                    the prestigious National Teacher Award 
                                    from Ex.-President of India Dr. A.P.J. Abdul 
                                    Kalam in 2005</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="text-center">
                                    <img src="{{ url('web/assets/images/img/add33.png') }}" style="width:150px;height:150px" alt="">
                                </div>
                            </div>
                            <div class="col-md-9">
                                <h3 class="name">Christopher 
                                    Olley</h3>
                                
                                <p>Christopher Olley - the director of the 
                                    Secondary Mathematics Post Graduate 
                                    Certificate in Education, is a graduate level 
                                    teacher at King's College London. 
                                    Christopher is co-author of the highest rated 
                                    text book series in secondary mathematics 
                                    in Uganda and has also designed a variety of 
                                    curriculum and educational support 
                                    projects for Mathematics.</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="text-center">
                                    <img src="{{ url('web/assets/images/img/add1.png') }}" style="width:150px;height:150px" alt="">
                                </div>
                            </div>
                            <div class="col-md-9">
                                <h3 class="name">Yan Kow 
                                    Cheong</h3>
                                
                                <p>Yan Kow Cheong has been active in 
                                    Singapore's mathematics scene for over 
                                    two decades with teaching appointments 
                                    at the ACS (Independent), NUS Extension, 
                                    Institute of Technical Education, and 
                                    Singapore Science Centre. Yan Kow 
                                    Cheong is the author of Singapore's 
                                    bestselling Mathematical Quickies & 
                                    Trickies series.</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="text-center">
                                    <img src="{{ url('web/assets/images/img/add333.png') }}" style="width:150px;height:150px" alt="">
                                </div>
                            </div>
                            <div class="col-md-9">
                                <h3 class="name">Dr Kevin Mohney</h3>
                                    
                                <p>Dr. Kevin Mahoney is an Independent school curriculum administrator and mathematics education consultant 
                                    focused on Singapore's elementary math curriculum. He is the rst American to earn a doctorate focused on the 
                                    study of Singapore's Elementary math curriculum.</p>
                            </div>
                      
                    </div>
                    </div>
                </div>
               
        </div>
@endsection