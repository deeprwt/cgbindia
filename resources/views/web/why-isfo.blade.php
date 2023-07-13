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
                        <h2 class="title ">Why ISFO</h2>
                        <ul class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}" class="">Home</a></li>
                            <li class="breadcrumb-item active " aria-current="page">Why Isfo </li>
                        </ul>
                    </div>
                    <!-- Page Banner Content End -->
                </div>
            </div>
        </div>
        <!-- Page Banner Wrapper End -->
    </div>
</div>
<div class="section report-career-2-section section-padding-02 pb-4">
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
                            <h2 class="title">Why ISFO</h2>
                        </div>
                                    <p>
                                    ISFO for the first time brings a truly International Olympiad. The International Advisory panel for ISFO Olympiad comprises distinguished educationists from various countries to ensure <b>content and exams are of global standards</b> . The ISFO Olympiad exams are extremely useful for all classes from class 1 to class 10. These exams bring students from different schools and different boards on the same platform as ISFO Olympiad aims to provide an international platform for students to prove their mettle against students of varying nationalities.
                                    </p>
                                    <p>
                                    The ISFO exams help to identify a child's capability and real potential that may help him/her survive better in today's modern competitive world. ISFO Olympiad test the memory of the students rather their scientific temperament and reasoning ability as each question encourages the student to use their accrued skill set and apply the concepts they have learnt. Competing with the best, nationally and internationally, prepares students for competitive exams in higher grades and boosts their self-confidence. Other fringe benefits include development of creative and lateral thinking skills and a sense of autonomy in critical thought and action.
                                    </p>
                                    <p>
                                    As ISFO Olympiad is designed specifically to enforce scientific reasoning, mathematics & linguistic prowess, these exams encourage the students to apply the generic concepts learnt in school in a more creative and applicative manner. The focus is on the concepts; hence these exams are autonomous and not any Board centric.  
                                    </p>
                                    <p>
                                    The ISFO Olympiad helps to identify a student’s strengths and weaknesses as it offers comprehensive performance reviews, report card and international ranking analysis for the students in a simplified and graphical manner.
                                    </p>
                                    <p>
                                    A <b>comprehensive package</b> of e-Study Material, e-Practice Tests and Exams for three subjects - Mathematics, Science and English are offered at the same price. <b>NO EXTRA FEES</b> . Participants are screened for their basic understanding of the subjects. It essays their skills, learning, talent, practical application, and classroom knowledge. 
                                    </p>
                            
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