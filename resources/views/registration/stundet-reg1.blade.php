    
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Student Login</title>

    <!-- Icons font CSS-->
    <link href="{{ url('vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ url('vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="{{ url('css/particle.css') }}" rel="stylesheet" media="all">
    <!-- Vendor CSS-->
    <link href="{{ url('vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ url('vendor/datepicker/daterangepicker.css') }}" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Main CSS-->
    <link href="{{ url('css/main.css') }}" rel="stylesheet" media="all">
<style>
      .alert{
    position: relative;
        top:10vh;
    width: 350px;
    z-index: 11;
    
    overflow: auto;
  }
</style>
</head>

<body class="bg-gra-03 ">
    
<div id="particle-container">
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
    <div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
</div>
    <div class="container-fluid">
        @include('flash_message.flash_message')
    <div class="page-wrapper   p-b-50">
        <nav class="navbar navbar-expand-sm navbar-light bg-transparent ">
            <ul class="navbar-nav mr-auto  mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#">
                        <img src="{{ url('logo/logo.png') }}" width="150" alt="">
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto  mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#">
                        <img src="{{ url('logo/iso.png') }}" width="160" alt="">
                    </a>
                </li>
            </ul>

        </nav>
   
        <div class="wrapper wrapper--w790 p-2">
            <!-- Inspired by: https://codepen.io/natewiley/pen/Ciwyn -->

            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Student Registration</h2>
                </div>
                <div class="card-body">
                    <form  action="{{ route('student.registration-1') }}" method="POST">
                        @csrf
                        <input type="hidden" name="sujectCode" value="{{ $subjectCode }}">
                        <input type="hidden" name="school" value="{{ $school }}">
                      <div class="row my-3">
                          <div class="col-md-12 my-3">
                              <label class="label label--block">Full Name<sup class="text-danger">*</sup></label>
                            <input class="input--style-5  form-control border-0"  placeholder="enter full name" type="text" name="name" required>
                          </div>
                          <div class="col-md-12 my-3">
                            <label class="label label--block">School Roll Number<sup class="text-danger">*</sup></label>
                          <input class="input--style-5  form-control border-0"  placeholder="enter school roll number" type="text" name="roll" required>
                        </div>
                          <div class="col-md-6 my-3">
                            <label class="label label--block">Email</label>
                          <input class="input--style-5  form-control border-0"  placeholder="enter email" type="email" name="email" >
                        </div>
                        <div class="col-md-6 my-3">
                            <label class="label label--block">Phone<sup class="text-danger">*</sup></label>
                          <input class="input--style-5  form-control border-0"  placeholder="enter phone" type="text" name="phone"  minlenght="10" maxlenght="10" required>
                        </div>
                        <div class="col-md-12 my-3">
                            <label class="label label--block">Grade<sup class="text-danger">*</sup></label>
                            <select name="class" class="input--style-5  form-control border-0" id="">
                                <option value="">Select  Grade</option>
                                <option value="01">1</option>
                                <option value="02">2</option>
                                <option value="03">3</option>
                                <option value="04">4</option>
                                <option value="05">5</option>
                                <option value="06">6</option>
                                <option value="07">7</option>
                                <option value="08">8</option>
                                <option value="09">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                        <div class="col-md-12 my-3">
                            <label class="label label--block">Subject<sup class="text-danger">*</sup></label>
                            
                            <div class="form-check">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" name="subject[]"  value="Science">Science
                                </label>
                              </div>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" name="subject[]"  value="English">English
                                
                                </label>
                              </div>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" name="subject[]"   value="Mathematics" >Mathematics
                                
                                </label>
                              </div>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" name="subject[]"  value="GK" >General Knowledge
                                
                                </label>
                              </div>
                        </div>
                        <div class="col-md-12 my-3">
                            <label class="label label--block">Password<sup class="text-danger">*</sup></label>
                          <input class="input--style-5  form-control border-0"  placeholder="Create Your Password" type="password" name="password"   required>
                          <span class="text-danger">Password must meet the following requirements<br>
                          <ul class="ml-4">
                            <li>At least <b>one letter</b></li>
                            <li>At least <b>one capital letter</b></li>
                            <li>At least <b>one number</b></li>
                            <li>Be at least <b>8 characters</b></li>
                          </ul>
                          </span>
                        </div>
                        <div class="col-md-12 my-3">
                            <label class="label label--block">Confirm Password<sup class="text-danger">*</sup></label>
                          <input class="input--style-5  form-control border-0"  placeholder="confirm password" type="password" name="confirm_password"   required>
                        </div>

                        
                      </div>
                     
                    
                      
                        
                        <div class="text-right" id="submitButton">
                            <button class="btn btn--radius-2 btn--red" type="submit">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Jquery JS-->
    <script src="{{ url('vendor/jquery/jquery.min.js') }}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Vendor JS-->
    <script src="{{ url('vendor/select2/select2.min.js') }}"></script>
    <script src="{{ url('vendor/datepicker/moment.min.js') }}"></script>
   
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- <!-- Main JS-->
    <script src="{{ url('j  s/global.js') }}"></script> --}}
        <script>
         $( "form" ).on( "submit", function( event ) {
            event.preventDefault();
           $.ajax({
               type:'post',
               url:"{{ url('stundentRegistration') }}",
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
                    `  <button class="btn btn--radius-2 btn--red" type="submit">Register</button>`
                );
               
                    }else{
                        Swal.fire({
                        title: 'success :)',
                        text: e,
                        icon: 'success',
                        confirmButtonText: 'ok',
                        footer: `<a href="{{ url('login') }}">Back to login</a>`,
                        }).then(function() {
                          window.location.href = "{{ url('login') }}";
                          });
                        $('#submitButton').html(
                    ` <button class="btn btn--radius-2 btn--red" type="button">Register Complete</button>`
                );
              //  window.location.href = "{{ URL('login') }}";
                    }
                   });
                  
               }
           })
            });

          
        </script>
</body>

</html>
