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
                        <h2 class="title  text-capitalize">AWARDS & RECOGNITION</h2>
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
<div class="section blog-standard-section section-padding my-5">
    <div class="container">
        <!-- Blog Wrapper Start -->
        <div class="blog-standard-wrapper wrapper">
            <div class="row">
               
                <div class="col-md-12">
                    <div class="blog-post-wrapper">
                      <div class="row my-4">
                          <div class="col-md-12">
                            <div class="section-title section-devider text-center">
                                <h2 class="title">For School</h2>
                            </div>
                           <div class="my-4">
                            <div class="row">
                                <div class="col-md-3 p-2 text-center" >
                                    <div class="card text-center border-0">
                                     <div class="text-center">
                                        <img class="" style="width: 100px;height:100px" src="{{ url('web/assets/images/img/rep.png') }}" alt="">
                                     </div>
                                      <div class="card-body ">
                                        <h4 class="card-title">Student Performance <br>
                                            Report</h4>
                                     
                                      </div>
                                    </div>
                                </div>
                                <div class="col-md-3 p-2 text-center" >
                                    <div class="card text-center border-0">
                                     <div class="text-center">
                                        <img class="" style="width: 100px;height:100px" src="{{ url('web/assets/images/img/cert.png') }}" alt="">
                                     </div>
                                      <div class="card-body ">
                                        <h4 class="card-title">Appreciation 
                                            Certificate<br>
                                            for School</h4>
                                     
                                      </div>
                                    </div>
                                </div>
                                <div class="col-md-3 p-2 text-center" >
                                    <div class="card text-center border-0">
                                     <div class="text-center">
                                        <img class="" style="width: 100px;height:100px" src="{{ url('web/assets/images/img/letter.png') }}" alt="">
                                     </div>
                                      <div class="card-body ">
                                        <h4 class="card-title">Appreciation Letter<br>
                                            for the Principal</h4>
                                     
                                      </div>
                                    </div>
                                </div>
                                <div class="col-md-3 p-2 text-center" >
                                    <div class="card text-center border-0">
                                     <div class="text-center">
                                        <img class="" style="width: 100px;height:100px" src="{{ url('web/assets/images/img/cer.png') }}" alt="">
                                     </div>
                                      <div class="card-body ">
                                        <h4 class="card-title">Certificate of <br>
                                            Appreciation for <br>
                                            Olympiad Coordinato</h4>
                                     
                                      </div>
                                    </div>
                                </div>
                            </div>
                           </div>
                          </div>
                        
                      </div>
                    </div>
                </div>
               
            </div>
           
            <div class="row my-4">
                <div class="col-md-12">
                  <div class="section-title section-devider text-center">
                      <h2 class="title">For Students</h2>
                  </div>
                 <div class="my-4">
                     <h4 class="my-2">• International Excellence Award</h4>
                  <div class="row">
                      <div class="col-md-4 p-2 text-center" >
                          <div class="card text-center border-0">
                           <div class="text-center">
                              <img class="" style="width: 150px;height:150px" src="{{ url('web/assets/images/img/gold.png') }}" alt="">
                           </div>
                            <div class="card-body ">
                              <h4 class="card-title">Gold Medal: 
                               </h4>
                               <p> Top 1st Percentile</p>
                           
                            </div>
                          </div>
                      </div>
                      <div class="col-md-4 p-2 text-center" >
                          <div class="card text-center border-0">
                           <div class="text-center">
                              <img class="" style="width: 150px;height:150px" src="{{ url('web/assets/images/img/sil.png') }}" alt="">
                           </div>
                            <div class="card-body ">
                              <h4 class="card-title">Silver Medal: 
                               </h4>
                                <p> Top 2nd Percentile</p>
                           
                            </div>
                          </div>
                      </div>
                      <div class="col-md-4 p-2 text-center" >
                          <div class="card text-center border-0">
                           <div class="text-center">
                              <img class="" style="width: 150px;height:150px" src="{{ url('web/assets/images/img/bron.png') }}" alt="">
                           </div>
                            <div class="card-body ">
                              <h4 class="card-title">Bronze Medal:<br>
                              
                            </h4>
                            <p>  Top 3rd Percentile</p>
                           
                            </div>
                          </div>
                      </div>
                     
                  </div>
                  <h4 class="my-2">• Certificate of Excellence at School Level to Class Toppers (Ranks: 1st, 2nd and 3rd)</h4>
                  <h4 class="my-2">• Participation/Achievement Certificates (e-certificate)</h4>
                  <h4 class="my-2">• Student Performance Reports (e-report)</h4>
                 </div>
                </div>
              
            </div>
        </div>
    </div>
</div>
@endsection