@extends('web.layout.template')
@section('main')
            <!-- Page Banner Start -->
            <div class="section page-banner-section py-5 header_background hero-section-4">
                <div class="container">
                    <!-- Page Banner Wrapper Start -->
                    <div class="page-banner-wrapper">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Page Banner Content Start -->
                                <div class="page-banner text-center">
                                    <h2 class="title text-white">Contact Us</h2>
                                    <ul class="breadcrumb justify-content-center">
                                        <li class="breadcrumb-item text-white"><a href="{{ url('/') }}" class="">Home</a></li>
                                        <li class="breadcrumb-item active text-white" aria-current="page">Contact us</li>
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
           <!-- Contact Form Start -->
        <div class="section contact-form-section section-padding-02" >
            <div class="container">
                <!-- Contact Form Wrapper Start -->
                <div class="contact-form-wrapper">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Contact Form Start -->
                            <div class="contact-form">
                                <h4 class="title">LEAVE A MESSAGE</h4>
                                <form action="{{ route('isfoContact.store') }}" method="POST" id="contactUs">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- Single Form Start -->
                                            <div class="single-form">
                                                <input type="text" name="name" placeholder="Your Name">
                                            </div>
                                            <!-- Single Form End -->
                                        </div>
                                        <div class="col-sm-12">
                                            <!-- Single Form Start -->
                                            <div class="single-form">
                                                <input type="email" name="email" placeholder="Your Email">
                                            </div>
                                            <!-- Single Form End -->
                                        </div>
                                        <div class="col-sm-12">
                                            <!-- Single Form Start -->
                                            <div class="single-form">
                                                <input type="text" name="phone" placeholder="Phone">
                                            </div>
                                            <!-- Single Form End -->
                                        </div>
                                        <div class="col-sm-12">
                                            <!-- Single Form Start -->
                                            <div class="single-form">
                                                <textarea name="sms" placeholder="Message..."></textarea>
                                            </div>
                                            <!-- Single Form End -->
                                        </div>
                                        <!-- <div class="col-sm-12">

                                            <div class="single-form">
                                                <input type="text" name="school" placeholder="School Name">
                                            </div>

                                        </div> -->
                                        <div class="col-sm-12">
                                            <!-- Single Form Start -->
                                            <div class="contact-btn" id="submitButton">
                                                <button class="btn" type="submit">Submit Message</button>
                                            </div>
                                            <!-- Single Form End -->
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                       
                        <div class="col-md-6 pt-5 pl-5">
                            <div class="col-md-12">
                              <h2>Our Address</h2>
                              <div id="response"></div>
                              <div class="clearfix"></div>
                              <!--<ul class="contacts" style="margin-top:15px; font-weight:bold;">
                                                      
                                                      
                                                      <li class="fa fa-home"></li> International Society for Olympiad<br>
                   25/11  A - Block  DLF  Phase -1  Sikanderpur<br>
                   Gurgaon (HR) - 122002   India <br>
                                                           <i class="fa fa-mobile"></i> 9910336673 | <i class="fa fa-phone"></i> 0124-4386346 <br>
                                                          <li class="fa fa-envelope"></li> <a href="#" >info@isfo.in</a>,  <a href="mailto:hr@isfo.in">hr@isfo.in</a> 
                                                      </ul>-->
                              <ul class="contacts" style="margin-top:15px; font-weight:bold;">
                                <li class="fa fa-home"></li>
                                No.1/1, 1 st Floor, 21 st Cross,<br /> 
                                CMH Road,Lakshmipuram, Ulsoor,<br />
                                 Bangalore – 560008 <br>
                                <!--<li class="fa fa-mobile"></li>  7042292974 [10 A.M. to 6 P.M.] |  <i class="fa fa-phone"></i> 0124-4386346 <br>-->
                                <!--<li class="fa fa-mobile"></li> 9910336673, 7042292974 |-->
                                 <i class="fa fa-phone"></i> 01161400200 <!--011-61400200--> <!--+91-9899999241, +91-8630069975<br> Mon-Fri [10 A.M. to 6 P.M.]--><br>
                                <li class="fa fa-envelope"></li>
                                <a href="mailto:support@isfo.in ">info@cgbindia.com</a>
                              </ul>
                              <hr>
                             </div>
                    </div>
                </div>
            </div>
        </div>
                            <!-- Contact Form End -->

@endsection
@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $( "#contactUs" ).on( "submit", function( event ) {
            event.preventDefault();
           $.ajax({
               type:'post',
               url:"{{ route('isfoContact.store') }}",
               data:$( this ).serialize(),
               beforeSend: function () {
                $('#submitButton').html(
                    `<div class="spinner-border text-info"></div>`
                );
                },
               success:function(res){
                   $.each(res,function(i,e){
                       console.log(i)
                    if(i != 'success'){
                        Swal.fire({
                        title: 'Error!',
                        text: e,
                        icon: 'error',
                        confirmButtonText: 'ok'
                        })
                        $('#submitButton').html(
                    `  <button class="btn" type="submit">Submit</button>`
                );
                    }else{
                        Swal.fire({
                        title: 'success :)',
                        text: e,
                        icon: 'success',
                        confirmButtonText: 'ok',
                       
                        })
                        $('#submitButton').html(
                    ` <button class="btn " type="button">Enquiry sent successfully</button>`
                        );
                      
                    }
                   });
                  
               }
           })
            


});
    </script>
@endsection