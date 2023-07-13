    
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
    <title>Registration : Olympaid</title>

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
                    <h2 class="title">ISO Registration Form</h2>
                </div>
                <div class="card-body">
                    <form method="POST">
                      <div class="row my-3">
                          <div class="col-md-6">
                              <label class="label label--block">School Code</label>
                            <input class="input--style-5  form-control border-0" type="text" name="first_name">
                          </div>
                          <div class="col-md-6">
                            <label class="label label--block">School Code</label>
                          <input class="input--style-5  form-control border-0" type="text" name="first_name">
                        </div>
                      </div>
                      <div class="row my-3">
                        <div class="col-md-12">
                            <label class="label label--block">Student Name</label>
                          <input class="input--style-5  form-control border-0" type="text" name="first_name">
                        </div>
                        
                    </div>
                    <div class="row my-3">
                        <div class="col-md-12">
                            <label class="label label--block">Class</label>
                          
                               
                                    <div class="input-group">
                                        <div class="rs-select2 js-select-simple w-100">
                                            <select name="subject" class="form-control">
                                                <option disabled="disabled" selected="selected">Choose option</option>
                                                <option>Subject 1</option>
                                                <option>Subject 2</option>
                                                <option>Subject 3</option>
                                            </select>
                                            <div class="select-dropdown"></div>
                                        </div>
                                    </div>
                                 </div>
                             </div>
                      
                        <div class="form-row p-t-20">
                            <label class="label label--block">Subject</label>
                            <div class="p-2">
                                <label class="radio-container m-r-55">English
                                    <input type="checkbox"  name="exist">
                                    <span class="checkmark"></span>
                                </label><br>
                                <label class="radio-container">Science
                                    <input type="checkbox" name="exist">
                                    <span class="checkmark"></span>
                                </label><br>
                                <label class="radio-container m-r-55">Mathematics
                                    <input type="checkbox"  name="exist">
                                    <span class="checkmark"></span>
                                </label><br>
                               
                             
                                <label class="radio-container">General Knowledge
                                    <input type="checkbox" name="exist">
                                    <span class="checkmark"></span>
                                </label><br>
                            </div>
                            <div class="p-2">
                               
                            </div>
                        </div>
                        <div class="text-right">
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
    <!-- Vendor JS-->
    <script src="{{ url('vendor/select2/select2.min.js') }}"></script>
    <script src="{{ url('vendor/datepicker/moment.min.js') }}"></script>
    <script src="{{ url('vendor/datepicker/daterangepicker.js') }}"></script>

    {{-- <!-- Main JS-->
    <script src="{{ url('js/global.js') }}"></script> --}}

</body>

</html>
