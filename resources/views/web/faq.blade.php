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
                        <h2 class="title ">Frequently Asked Questions</h2>
                        <ul class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}" class="">Home</a></li>
                            <li class="breadcrumb-item active " aria-current="page">FAQ's </li>
                        </ul>
                    </div>
                    <!-- Page Banner Content End -->
                </div>
            </div>
        </div>
        <!-- Page Banner Wrapper End -->
    </div>
</div>

 <!-- Faq Start -->
 <div class="section faq-section section-padding">
    <div class="container">
        <div class="faq-wrapper">
            <!-- Section Title Start -->
            <div class="section-title text-center">
                <h2 class="title">Frequently Asked Questions</h2>
            </div>
            <!-- Section Title End -->

            <!-- Faq Accordion Start -->
            <div class="faq-accordion">
                <div class="accordion" id="accordionExample">
                    <div class="faq-accordion-wrapper">
                        <!-- Faq col Start -->
                        <div class="">
                            <!-- Faq Accordion Item Start -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Why should a student register for the ISFO Olympiad?
                                        <span class="faq-button"><i class="fas fa-chevron-right"></i></span>
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>Olympiad exams provide a wider platform for students to compete and analyse their academic knowledge and strength across subjects. They can gauge how they stand academically at different levelswithin the school, at national level and above all at international level.<br>

                                        ISFO provides students an opportunity to appear for and check their knowledge and application skills in Mathematics, Science and English. The wide spectrum of competition helps the students to acquire knowledge beyond the books, learn to face questions and gain confidence to appear in competitive exams throughout his/her learning years.<br>
                                            
                                        All students are provided a detailed and elaborate performance analysis report that enables them to understand their strengths and improvement areas in each of the subjects they have taken the exam.
                                            
                                            </p>
                                    </div>
                                </div>
                            </div>
                            <!-- Faq Accordion Item End -->
                            <!-- Faq Accordion Item Start -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        How can we enrol for the ISFO exam?
                                        <span class="faq-button"><i class="fas fa-chevron-right"></i></span>
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>Students can only enrol via their schools (minimum 50 students from a school) and appear for the Exams with their school as a centre at Level 1. </p>
                                    </div>
                                </div>
                            </div>
                            <!-- Faq Accordion Item End -->
                            <!-- Faq Accordion Item Start -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Who is eligible for the ISFO exam?
                                        <span class="faq-button"><i class="fas fa-chevron-right"></i></span>
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>Students of Grades I to X are eligible to appear for the 1st level Olympiads. There is no other eligibility criterion like minimum marks. Students who secure 70% and above in Level 1 exam qualify for the Level 2 exam. </p>
                                    </div>
                                </div>
                            </div>
                            <!-- Faq Accordion Item End -->
                                                        <!-- Faq Accordion Item Start -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingSix">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                        If a school is not participating in the ISFO Olympiad exams, can individuals register on their own?
                                        <span class="faq-button"><i class="fas fa-chevron-right"></i></span>
                                    </button>
                                </h2>
                                <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>There is no individual participation this year. You can only register via your school. If you want your school to participate, please share the name of your school and the contact details of the person whom we can talk with. Our representative will get in touch with your school.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Faq Accordion Item End -->
                                                        <!-- Faq Accordion Item Start -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingSeven">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                        How can a school register for the ISFO Olympiad exams?
                                        <span class="faq-button"><i class="fas fa-chevron-right"></i></span>
                                    </button>
                                </h2>
                                <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>This year Olympiads are only via School Invitation. A school can also contact us at www.isfo.in and leave details about the school. A representative from our end will approach the respective school at the earliest.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Faq Accordion Item End -->
                              <!-- Faq Accordion Item Start -->
                              <div class="accordion-item">
                                <h2 class="accordion-header" id="headingEight">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                        What is the structure and pattern of the examination?
                                        <span class="faq-button"><i class="fas fa-chevron-right"></i></span>
                                    </button>
                                </h2>
                                <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>For details please click the following link: <a href="https://www.isfo.in/es/ISFO-Test-Paper-Scheme-&-Marking-2021-22.pdf"> http://skool.ai/isfo/web/assets/pdf/scheme.pdf</a></p>
                                    </div>
                                </div>
                            </div>
                            <!-- Faq Accordion Item End -->
                            <!-- Faq Accordion Item Start -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour1">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour1" aria-expanded="false" aria-controls="collapseFour1">
                                        When are the results of the Olympiad exams declared?
                                        <span class="faq-button"><i class="fas fa-chevron-right"></i></span>
                                    </button>
                                </h2>
                                <div id="collapseFour1" class="accordion-collapse collapse" aria-labelledby="headingFour1" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>Results of the Olympiad exams are declared within 6 weeks of the examination. The results are sent to the respective schools. The results are also made available on our website.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Faq Accordion Item End -->
                            <!-- Faq Accordion Item Start -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour2">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour2" aria-expanded="false" aria-controls="collapseFour2">
                                        What is the last date for registration?
                                        <span class="faq-button"><i class="fas fa-chevron-right"></i></span>
                                    </button>
                                </h2>
                                <div id="collapseFour2" class="accordion-collapse collapse" aria-labelledby="headingFour2" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>20th October 2022</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Faq Accordion Item end -->
                            <!-- Faq Accordion Item Start -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour3">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour3" aria-expanded="false" aria-controls="collapseFour3">
                                        What is the venue for the examinations?
                                        <span class="faq-button"><i class="fas fa-chevron-right"></i></span>
                                    </button>
                                </h2>
                                <div id="collapseFour3" class="accordion-collapse collapse" aria-labelledby="headingFour3" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>Level 1 examination to be held in respective schools and invigilated by schoolteachers. <br>
                                         Level 2 examination are held at a common venue /respective school to be invigilated by IFSO representative. </p>
                                    </div>
                                </div>
                            </div>
                            <!-- Faq Accordion Item end -->
                            <!-- Faq Accordion Item Start -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour4">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour4" aria-expanded="false" aria-controls="collapseFour4">
                                    When is the Level 1 exam scheduled?
                                        <span class="faq-button"><i class="fas fa-chevron-right"></i></span>
                                    </button>
                                </h2>
                                <div id="collapseFour4" class="accordion-collapse collapse" aria-labelledby="headingFour4" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>

                                        The Level 1 exams are scheduled as follows: <br>
                                        &nbsp;&nbsp;•&nbsp; 	Wednesday 23rd November 2022 – Mathematics (from 9:00 am to 10:00 am)<br>
                                        &nbsp;&nbsp;•&nbsp; 	Thursday 24th November 2022 – Science (from 9:00 am to 10:00 am)<br>
                                        &nbsp;&nbsp;•&nbsp; 	Friday 25th November 2022 – English (from 9:00 am to 10:00 am)<br>
                                        </p>
                                    </div>
                                </div>
                            </div>
                             <!-- Faq Accordion Item end -->
                               <!-- Faq Accordion Item Start change the id-->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour410">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour410" aria-expanded="false" aria-controls="collapseFour410">
                                    When is the Level 2 exam scheduled?
                                        <span class="faq-button"><i class="fas fa-chevron-right"></i></span>
                                    </button>
                                </h2>
                                <div id="collapseFour410" class="accordion-collapse collapse" aria-labelledby="headingFour410" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>


                                        Tentatively in the second week of February 2023
                                        </p>
                                    </div>
                                </div>
                            </div>
                             <!-- Faq Accordion Item end -->
                             <!-- Faq Accordion Item Start -->
                             <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour11">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour11" aria-expanded="false" aria-controls="collapseFour11">
                                        What will be the duration of these exams?
                                        <span class="faq-button"><i class="fas fa-chevron-right"></i></span>
                                    </button>
                                </h2>
                                <div id="collapseFour11" class="accordion-collapse collapse" aria-labelledby="headingFour11" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>
                                        Each paper is of 60 minutes. The exams will be held between 9:00 am to 10:00 am. 
                                     </p>
                                    </div>
                                </div>
                            </div>
                             <!-- Faq Accordion Item end -->
                             <!-- Faq Accordion Item Start -->
                             <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour110">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour110" aria-expanded="false" aria-controls="collapseFour110">
                                    What is the participation fee per student?
                                        <span class="faq-button"><i class="fas fa-chevron-right"></i></span>
                                    </button>
                                </h2>
                                <div id="collapseFour110" class="accordion-collapse collapse" aria-labelledby="headingFour110" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>
                                        The participation fee is INR 300 (inclusive of e-Practice workbook worth INR 150), per student per subject 
                                     </p>
                                    </div>
                                </div>
                            </div>
                             <!-- Faq Accordion Item end -->
                             <!-- Faq Accordion Item Start -->
                             <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour46">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour46" aria-expanded="false" aria-controls="collapseFour46">
                                        What is the minimum number of participants required for a school sign up?
                                        <span class="faq-button"><i class="fas fa-chevron-right"></i></span>
                                    </button>
                                </h2>
                                <div id="collapseFour46" class="accordion-collapse collapse" aria-labelledby="headingFour46" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>Only 50 registrations across all eligible classes & subjects (Maths, Science & English) is required
                                            </p>
                                    </div>
                                </div>
                            </div>
                             <!-- Faq Accordion Item end -->
                             <!-- Faq Accordion Item Start -->
                             <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour460">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour460" aria-expanded="false" aria-controls="collapseFour460">
                                    In case there are less than 50 enrolments, how will the interested students participate in the Olympiad?
                                        <span class="faq-button"><i class="fas fa-chevron-right"></i></span>
                                    </button>
                                </h2>
                                <div id="collapseFour460" class="accordion-collapse collapse" aria-labelledby="headingFour460" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>In the unlikely scenario, where there are less than 50 enrolments across all three subjects, it is not feasible for ISFO to hold the exam. A minimum of 50 enrolments should be there from a school for a school to become a centre at Level 1.                                             </p>
                                    </div>
                                </div>
                            </div>
                             <!-- Faq Accordion Item end -->
                             <!-- Faq Accordion Item Start -->
                             <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour43">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour43" aria-expanded="false" aria-controls="collapseFour43">
                                        Would students be provided any content support that helps them prepare for the Olympiad exam?
                                        <span class="faq-button"><i class="fas fa-chevron-right"></i></span>
                                    </button>
                                </h2>
                                <div id="collapseFour43" class="accordion-collapse collapse" aria-labelledby="headingFour43" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>Post registration each participant will be able to download a specific preparatory booklet subject and grade-wise from the ISFO website. They will also have access to a Practice Test.                                             </p>
                                    </div>
                                </div>
                            </div>
                             <!-- Faq Accordion Item end -->
                             <!-- Faq Accordion Item Start -->
                             <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour44">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour44" aria-expanded="false" aria-controls="collapseFour44">
                                    How would the students get access to the e-Study Booklet & e-Practice Test on the ISFO Website?
                                        <span class="faq-button"><i class="fas fa-chevron-right"></i></span>
                                    </button>
                                </h2>
                                <div id="collapseFour44" class="accordion-collapse collapse" aria-labelledby="headingFour44" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>Post registration, a unique user id & password would be provided to the school for each student. The school will send this user id and password to the students. The students will use their unique user id and password to access the study material, the practice test, and their results.                                            </p>
                                    </div>
                                </div>
                            </div>
                             <!-- Faq Accordion Item end -->
                             <!-- Faq Accordion Item Start -->
                             <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour421">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour422" aria-expanded="false" aria-controls="collapseFour422">
                                        When will the Practice test be available?
                                        <span class="faq-button"><i class="fas fa-chevron-right"></i></span>
                                    </button>
                                </h2>
                                <div id="collapseFour422" class="accordion-collapse collapse" aria-labelledby="headingFour421" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>The practice tests will be available from 30th October 2022.


                                            </p>
                                    </div>
                                </div>
                            </div>
                             <!-- Faq Accordion Item end -->
                             <!-- Faq Accordion Item Start -->
                             <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour433">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour433" aria-expanded="false" aria-controls="collapseFour433">
                                    Where can I get the e-Practice test?
                                        <span class="faq-button"><i class="fas fa-chevron-right"></i></span>
                                    </button>
                                </h2>
                                <div id="collapseFour433" class="accordion-collapse collapse" aria-labelledby="headingFour433" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>The Practice test is only available online. You will need to login to the website using your login details to attempt the Practice test. 


                                            </p>
                                    </div>
                                </div>
                            </div>
                             <!-- Faq Accordion Item end -->
                             <!-- Faq Accordion Item Start -->
                             <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour419">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour419" aria-expanded="false" aria-controls="collapseFour419">
                                    What rewards are accorded to the participating schools?
                                        <span class="faq-button"><i class="fas fa-chevron-right"></i></span>
                                    </button>
                                </h2>
                                <div id="collapseFour419" class="accordion-collapse collapse" aria-labelledby="headingFour419" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>
                                        &nbsp;&nbsp;•&nbsp; 	Appreciation Certificate for school Mathematics (from 9:00 am to 10:00 am)<br>
                                        &nbsp;&nbsp;•&nbsp; 	Appreciation Certificate for the Principal<br>
                                        &nbsp;&nbsp;•&nbsp; 	Certificate of Appreciation for Olympiad Coordinator<br>
                                        &nbsp;&nbsp;•&nbsp; 	School Trophy (for schools with more than 500 enrolments)<br>
                                        </p>
                                    </div>
                                </div>
                            </div>
                             <!-- Faq Accordion Item end -->
                             <!-- Faq Accordion Item Start -->
                             <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour409">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour409" aria-expanded="false" aria-controls="collapseFour409">
                                    What are the types of rewards for the students?
                                        <span class="faq-button"><i class="fas fa-chevron-right"></i></span>
                                    </button>
                                </h2>
                                <div id="collapseFour409" class="accordion-collapse collapse" aria-labelledby="headingFour409" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>
                                    &nbsp;&nbsp;•&nbsp; 		Those who are in the top first percentile at level 2 for each grade and each subject, are given a gold medal & an International Excellence Certificate    <br>
                                    &nbsp;&nbsp;•&nbsp; 		Those who are in the top second percentile at level 2 for each grade and each subject, are given a silver medal & an International Excellence Certificate <br>
                                    &nbsp;&nbsp;•&nbsp; 		Those who are in the top third percentile at level 2 for each grade and each subject, are given a bronze medal & an International Excellence Certificate <br>
                                    &nbsp;&nbsp;•&nbsp; 		Students at Level 2 are given Achievement Certificates (e-certificates) <br>
                                    &nbsp;&nbsp;•&nbsp; 		Students who do not qualify for Level 2 are given a Participation certificate (e-certificate)
                                                                </p>
                                    </div>
                                </div>
                            </div>
                             <!-- Faq Accordion Item end -->
                             <!-- Faq Accordion Item Start -->
                             <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour45">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour45" aria-expanded="false" aria-controls="collapseFour45">
                                        Are all students and schools eligible for Class Topper Certificates?
                                        <span class="faq-button"><i class="fas fa-chevron-right"></i></span>
                                    </button>
                                </h2>
                                <div id="collapseFour45" class="accordion-collapse collapse" aria-labelledby="headingFour45" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>Class Topper Certificates, called Outstanding Achievement Certificates (e-certificates) are given to top three students per subject per class provided they have obtained more that 70% marks in Level 1 exams.
                                            </p>
                                    </div>
                                </div>
                            </div>
                             <!-- Faq Accordion Item end -->
                              <!-- Faq Accordion Item Start -->
                              <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour45">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour45" aria-expanded="false" aria-controls="collapseFour45">
                                    From where can we obtain the e-Certificates?
                                        <span class="faq-button"><i class="fas fa-chevron-right"></i></span>
                                    </button>
                                </h2>
                                <div id="collapseFour45" class="accordion-collapse collapse" aria-labelledby="headingFour45" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>The e-Certificates (Achievement, Participation & Outstanding Achievement) can be obtained from your dashboard on the website when you use your login details to login and are downloadable.                                             </p>
                                    </div>
                                </div>
                            </div>
                             <!-- Faq Accordion Item end -->
                              <!-- Faq Accordion Item Start -->
                              <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFive">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive5" aria-expanded="false" aria-controls="collapseFive5">
                                    What is the Tie-Breaker Round in Level 2?
                                        <span class="faq-button"><i class="fas fa-chevron-right"></i></span>
                                    </button>
                                </h2>
                                <div id="collapseFive5" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>
                                        In Level 2, there are five additional questions at a higher level of difficulty. The marks for these questions are considered for scoring in the situation there is a tie of marks in the main paper only.  
                                    </p>
                                    </div>
                                </div>
                            </div>
                             <!-- Faq Accordion Item end -->
                              <!-- Faq Accordion Item Start -->
                              <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour47">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour47" aria-expanded="false" aria-controls="collapseFour47">
                                    Who are eligible for the prizes?
                                        <span class="faq-button"><i class="fas fa-chevron-right"></i></span>
                                    </button>
                                </h2>
                                <div id="collapseFour47" class="accordion-collapse collapse" aria-labelledby="headingFour47" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>Prizes are given to the top three students at each grade per subject at level 2. 
                                            </p>
                                    </div>
                                </div>
                            </div>
                             <!-- Faq Accordion Item end -->
                              <!-- Faq Accordion Item Start -->
                              <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour48">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour48" aria-expanded="false" aria-controls="collapseFour48">
                                    What are the criteria for being eligible for the grand prizes at each grade and each subject?
                                        <span class="faq-button"><i class="fas fa-chevron-right"></i></span>
                                    </button>
                                </h2>
                                <div id="collapseFour48" class="accordion-collapse collapse" aria-labelledby="headingFour48" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>There is a tie-breaker round (comprising of five questions) at Level 2. If there is more than one winner in Level 2, then the marks obtained in the Tie-Breaker Round are taken into consideration. If there is still a tie, then the scores of the Brain box section of Level 2 are considered. In case of a further tie, we refer to the total scores obtained at Level 1. In case of yet a further tie, the brain box scores of Level 1 are taken into consideration.                                            </p>
                                    </div>
                                </div>
                            </div>
                             <!-- Faq Accordion Item end -->
                              <!-- Faq Accordion Item Start -->
                              <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour31">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour31" aria-expanded="false" aria-controls="collapseFour31">
                                    If I do not get the grand prize, am I still eligible for any other awards?
                                        <span class="faq-button"><i class="fas fa-chevron-right"></i></span>
                                    </button>
                                </h2>
                                <div id="collapseFour31" class="accordion-collapse collapse" aria-labelledby="headingFour31" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>If you are not the topper but still in the first percentile, you are eligible for a gold medal & an International Excellence Certificate.      </p>
                                    </div>
                                </div>
                            </div>
                             <!-- Faq Accordion Item end -->
                                <!-- Faq Accordion Item Start -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour20">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour20" aria-expanded="false" aria-controls="collapseFour20">
                                    How can I not be eligible for the grand prize but still be in the top first percentile?
                                        <span class="faq-button"><i class="fas fa-chevron-right"></i></span>
                                    </button>
                                </h2>
                                <div id="collapseFour20" class="accordion-collapse collapse" aria-labelledby="headingFour20" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>Based on your score in the four sections in the Level 2 exam, you are placed in the 1st, 2nd, 3rd percentile. Hence you are eligible for a medal and a certificate. However, based on your score in the Tie-breaker section (that is taken into consideration only if there are more than one first percentile ranker) are you considered for the grand prize. </p>
                                    </div>
                                </div>
                            </div>
                             <!-- Faq Accordion Item end -->
                                <!-- Faq Accordion Item Start -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    What is your refund policy?
                                        <span class="faq-button"><i class="fas fa-chevron-right"></i></span>
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>We do not refund part or full fees paid under any circumstances. </p>
                                    </div>
                                </div>
                            </div>
                             <!-- Faq Accordion Item end -->
                        </div>

                            <!-- Faq Accordion Item End -->
                        </div>
                        <!-- Faq col End -->
                    </div>
                </div>
            </div>
            <!-- Faq Accordion End -->

        </div>
    </div>
</div>
<!-- Faq End -->

@endsection