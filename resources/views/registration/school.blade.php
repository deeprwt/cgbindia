    
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>Au Register </title>

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
       .select2-container--default .select2-selection--single{
        height: calc(1.5em + .75rem + 2px);
        padding-top: .2rem;
       }
       .select2-selection__arrow{
        padding-top: .2rem;
       }
       body{ width:100%; min-width:320px; height:100%; margin:0px; padding:0px; font-family:sans-serif; font-size:16px; text-align:left; background-color:#efefef; }
			#container{ width:70%; margin:50px auto; padding:20px; background-color:rgba(255, 255, 255, 0.8); }
			.content{ margin:40px auto; }
			.license{ font-size:12px; margin-top:60px; }
			.options{ list-style:none; }
			.options>.option{ display:inline-block; width:auto; padding:5px 10px; margin:0px; margin-right:20px; cursor:pointer; border:1px outset #fff; background-color:rgba(128, 128, 128, 0.1); }
			.options>.option.active,.options>.option:active,.options>.option:hover{ border-style:inset; background-color:rgba(128, 128, 128, 0.2); }
            .options>.option.active, .options>.option:active, .options>.option:hover {
    border-style: inset;
    display: none;
    background-color: rgba(128, 128, 128, 0.2);
}

  .alert{
    position: relative;
   
    width: 350px;
    z-index: 11;
    
    overflow: auto;
  }
 
    </style>
   
</head>

<body class="bg-gra-03 " id="container option circlus d-none" onClick="showCirclus()">
    <ul class="options">
				
        <li class="option circlus d-none"></li>
        
    </ul>
    <div class="container-fluid">
   
    <div class="page-wrapper   p-b-50 text-left">
        <nav class="navbar navbar-expand-sm navbar-light bg-transparent ">
            <ul class="navbar-nav mr-auto  mt-lg-0">
                <li class="nav-item active" style="padding-top:0.8rem">
                    <a class="nav-link" href="#">
                        <img src="{{ url('logo/logo.png') }}" width="150" alt="">
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">
                        <img src="{{ url('logo/iso.png') }}" width="160" alt="">
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav mr-auto  mt-lg-0">
                
            </ul>

        </nav>
        <div class="box-absolute">
            @include('flash_message.flash_message')
        </div>
        <div class="wrapper wrapper--w790 p-2">
            <!-- Inspired by: https://codepen.io/natewiley/pen/Ciwyn -->

            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">ISFO Registration Form</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('schoolMaster.store') }}">
                        @csrf
                      <div class="row my-3">
                          <div class="col-md-12">
                              <label class="label label--block">School Name<sup class="text-danger">*</sup></label>
                            <input class="input--style-5  form-control border-0" type="text" name="school_name" required>
                          </div>
                          
                      </div>
                      <div class="row my-3 input-group">
                        <div class="col-md-6 mb-3">
                            <label class="label label--block">State<sup class="text-danger">*</sup></label>
                            <select required name="state" id="state" class="form-control" style="width:100%;height:1.3em">
                                <option></option>
                             @foreach ($state as $item)
                                 <option value="{{ $item->id  }}">{{ $item->state }}</option>
                             @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                        <label class="label label--block">City<sup class="text-danger">*</sup></label>
                        <input type="text" name="city" class="form-control" required id="">
                    </div>
                        
                    </div>
                    <div class="row my-3">
                        <div class="col-md-12">
                            <label class="label label--block">Address<sup class="text-danger">*</sup></label>
                            <textarea required name="address" class="form-control" id="" cols="30" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-6 mb-3">
                            <label class="label label--block">Pin Code<sup class="text-danger">*</sup></label>
                           <input type="number" name="pin" class="form-control" required id="">
                        </div>
                    </div>
                      <hr>
                    <div class="row my-3">
                        <div class="col-md-6 mb-3">
                            <label class="label label--block">Principle Name<sup class="text-danger">*</sup></label>
                          <input class="input--style-5  form-control border-0" required type="text" name="principle_name">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="label label--block">Principle Phone<sup class="text-danger">*</sup></label>
                          <input required minlength="10" maxlength="10" class="input--style-5  form-control border-0" type="text" name="principle_phone">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="label label--block">Principle Email<sup class="text-danger">*</sup></label>
                          <input required class="input--style-5  form-control border-0" type="email" name="principle_email">
                        </div>
                        
                    </div>
                    <hr>
                    <div class="row my-3">
                        <div class="col-md-6 mb-3">
                            <label class="label label--block">Coordinator 1 Name<sup class="text-danger">*</sup></label>
                          <input class="input--style-5  form-control border-0" type="text" name="coordinator_name_1" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="label label--block">Coordinator 1 Phone<sup class="text-danger">*</sup></label>
                          <input class="input--style-5  form-control border-0" minlength="10" maxlength="10"  type="text" name="coordinator_phone_1" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="label label--block">Coordinator 1 Email<sup class="text-danger">*</sup></label>
                          <input class="input--style-5  form-control border-0" type="email" name="coordinator_email_1" required>
                        </div>
                        
                    </div>
                    <hr>
                    <div class="row my-3">
                        <div class="col-md-6 mb-3 ">
                            <label class="label label--block">Coordinator 2 Name</label>
                          <input  class="input--style-5  form-control border-0" type="text" name="coordinator_name_2">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="label label--block">Coordinator 2  Phone</label>
                          <input minlength="10" maxlength="10"  class="input--style-5  form-control border-0" type="text" name="coordinator_phone_2">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="label label--block">Coordinator 2 Email</label>
                          <input   class="input--style-5  form-control border-0" type="email" name="coordinator_email_2">
                        </div>
                        
                    </div>
                    <hr>
                    <div class="row my-3">
                        <div class="col-md-6 mb-3">
                            <label class="label label--block">Sales Rep<sup class="text-danger">*</sup></label>
                          <input required class="input--style-5  form-control border-0" type="text" name="sales">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="label label--block">No of Invitation Codes<sup class="text-danger">*</sup></label>
                          <input required  class="input--style-5  form-control border-0" type="number" name="invitation">
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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ url('vendor/select2/select2.min.js') }}"></script>
    <script src="{{ url('vendor/datepicker/moment.min.js') }}"></script>
    <script src="{{ url('vendor/datepicker/daterangepicker.js') }}"></script>
    <script>
      $('#state').select2({
        placeholder: "Select a state",
        allowClear: true
      });


    </script>
     <script type="text/javascript" src="{{ url('js/jquery-cabg-circlus.js') }}"></script>
     <script type="text/javascript">
         var initialOption = "circlus";
         
         jQuery(document).ready(function($){
                 if(initialOption)
                 {
                     var options = jQuery(".option");
                     options.filter("."+initialOption).click();
                 }
             });
         
         function setSelectedOption(selected){
                 if(selected)
                 {
                     var options = jQuery(".option");
                     options.removeClass("active");
                     options.filter("."+selected).addClass("active");
                 }
             };
         
         function showCirclus(){
                 jQuery("body").circlus({
                         fps: 30,
                         scale: 1,
                         background: false,
                         items: 55,
                         itemMinSpeed: 1000,
                         itemMaxSpeed: 2500,
                         itemMinSize: 20,
                         itemMaxSize: 50,
                         itemShapes: ["circle"],
                         itemColors: ["#0000ff", "#00ff00", "#00ffff", "#ff0000", "#ff00ff", "#ffff00"],
                         unique: true,
                     });
                 setSelectedOption("circlus");
             };
     
     </script>
    {{-- <!-- Main JS-->
    <script src="{{ url('js/global.js') }}"></script> --}}

</body>

</html>
