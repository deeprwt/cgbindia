<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv='cache-control' content='no-cache'>
<meta http-equiv='expires' content='0'>
<meta http-equiv='pragma' content='no-cache'>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<title>Final Exam | Eupheus Learning </title>
<link rel="stylesheet" type="text/css" href="{{ url('css/duDialog.min.css') }}">
<script async src=https://www.googletagmanager.com/gtag/js?id=G-CCKF5YW09C></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-CCKF5YW09C');
</script>

<style>
     *{
      zoom: 1.01 !important;
    -moz-transform: scale(2);
    -moz-transform-origin: 0 0;
    }
::backdrop {
    z-index:0;  
    background-color: white !important;
}

html, *:fullscreen, *:-webkit-full-screen, *:-moz-full-screen {
    background-color: white !important;
    z-index:1;
    overflow:auto;
}

</style>
</head>
<body>
<header >
    <nav class="bg-light">
        <div class="container">

       
        <div class="row p-3">
            <div class="col-md-6 text-left">
                <img src="{{ url('logo/logo.png') }}" style="width:150px"  alt="">
                <img src="{{ url('logo/iso.png') }}" style="width:150px"  alt="">
            </div>
            <div class="col-md-6 text-right mt-2">
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link text-dark font-weight-bold" href="#">{{ Auth::guard('student')->User()->name }}</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link text-dark"  onclick="toggleFullScreen(document.body)" href="#" role="button">
                            <i class="fas fa-compress-arrows-alt"></i>
                          </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link  btn btn-outline-danger" href="{{ url('login') }}">Logout</a>
                      </li>
                </ul>
            </div>
        </div>
    </div>
    </nav>
   
</header>
<section class="bg-light py-3">
    <div class="container">
    <div class="row ">
        <div class="col-md-6 p-2">
            <div class=" d-inline-block  p-2 "  >
                <h3 class="px-3">{{ $subject }}</h3>
            </div>
        </div>
        <div class="col md-6 p-2 text-right ">
            <div class=" d-inline-block border border-danger p-2 " id="" style="border-radius:1rem" >
                <div class="text-center px-3" style="font-size: 1.3rem">
                    <i class="	far fa-clock mt-2 pr-3 text-danger"></i><span class="countdown" id="timer" >--:--</span>
                </div>

            </div>
        </div>
    </div>
    </div>
</section>
<div class="jumbotron jumbotron-fluid bg-white" id="jumboBok">
    <div class="container text-center ">
        <button class="btn btn-info btn-lg"  id="statPaper">Start Test</button>
    </div>
  </div>
  <form action="{{ url('student/finalSubmit') }}" method="post">
    @csrf
    <input type="hidden" name="user" value="{{ $user }}"> 
    <input type="hidden" name="class" value="{{ Auth::guard('student')->User()->class }}"> 
    <input type="hidden" name="subject" value="{{ $subject }}">
    <input type="hidden" name="time" value="" id="timetaken">
  <section id="questions" class="container-fluid bg-light p-3">
      <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-12 d-none d-lg-block d-md-block " id="QuestionNumBtns">
           
                 
          </div>
          <div class="col-lg-9 col-md-9 col-sm-12 ">
            <div class="" id="questionCategories"></div>
            <div id="showQuestion"></div>
            <div class="my-3">
                <div class="row">
                    <div class="col-md-6 " >
                        <div class="d-none" id="Previousdiv">
                        <button class="btn btn-primary " id="Previous">Previous</button>
                    </div>
                    </div>
                    <div class="col-md-6  text-right">
                        <div class="d-none"  id="Nextdiv">
                            <button class="btn btn-success px-4"  id="Next">Next</button>
                        </div>
                       
                    </div>
                </div>
            </div>
            <div class="my-3 text-right d-none" id="Submitdiv">
                <button class="btn btn-secondary btn-lg " type="button" id="Submit">End Exam</button>
            </div>
          </div>
      </div>
  </section>
  </form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="{{ url('js/duDialog.min.js') }}"></script>
<script>
   localStorage.clear();


    //===========Full Screen 
   function cancelFullScreen() {
            var el = document;
            var requestMethod = el.cancelFullScreen||el.webkitCancelFullScreen||el.mozCancelFullScreen||el.exitFullscreen||el.webkitExitFullscreen;
            if (requestMethod) { // cancel full screen.
                requestMethod.call(el);
            } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
                var wscript = new ActiveXObject("WScript.Shell");
                if (wscript !== null) {
                    wscript.SendKeys("{F11}");
                }
            }
        }

        function requestFullScreen(el) {
            // Supports most browsers and their versions.
            var requestMethod = el.requestFullScreen || el.webkitRequestFullScreen || el.mozRequestFullScreen || el.msRequestFullscreen;

            if (requestMethod) { // Native full screen.
                requestMethod.call(el);
            } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
                var wscript = new ActiveXObject("WScript.Shell");
                if (wscript !== null) {
                    wscript.SendKeys("{F11}");
                }
            }
            return false
        }

        function toggleFullScreen(el) {
            
            if (!el) {
                el = document.body; // Make the body go full screen.
            }
            var isInFullScreen = (document.fullScreenElement && document.fullScreenElement !== null) ||  (document.mozFullScreen || document.webkitIsFullScreen);

            if (isInFullScreen) {
                cancelFullScreen();
            } else {
                requestFullScreen(el);
            }
            return false;
        }


        $('#Submit').click(function() {
              //  e.preventDefault();
                yesNoDlg.show()
            });
            yesNoDlg = duDialog(null, 'Are you sure you want to submit this test?', {
				init: true, dark: true, 
				buttons: duDialog.OK_CANCEL,
				okText: 'submit',
				callbacks: {
                  
					okClick: function() {
                        yesNoDlg.hide()
                        $('#Submit').prop("type", "submit");
                        $('#Submit').click();
                        swal({
                        text: 'Please while your paper is submitting',
                        icon: "info",
                      
                        })
                    // $('#Submit').prop("type", "button");
                        return false;
                        //  $('#Submit').trigger('submit');
						// this.hide()
                        // console.log();
						// console.log('Proceed clicked!')
					}	
				}
			})

        // Qustionss

        $(document).ready(function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var user = "{{ $user }}";
            var subject = "{{ $subject }}";
            $('#statPaper').click(function(){

                $('#questions').append(`<div id="preloader" style="margin-left:47%" class="my-3 spinner-border"></div>`);

                $('#jumboBok').addClass('d-none');
               
            $.ajax({
                type:'post',
                url:"{{ url('student/final-test') }}", 
                data:{'user':user,'subject':subject},
                success:function(res){
                   
                    if(res.status == 3){
                        swal({
                        text: res.message,
                        icon: "error",
                        buttons: true,
                        dangerMode: true,
                        })
                        .then(() => {
                            window.location.href = "{{ url('student/home') }}";
                        });
                        return false;
                    }
                    var buttons = '';
                    var questions = '';
                    var categories = '';
                    // looping
                  $.each(res,function(i,e){
                  
                    

                      //   Question Number Buttons
                      let btnid = i+1;
                      let currentQestBtn = i+1;
                        if(btnid < 10){
                           btnid = '0'+btnid
                       }
                   buttons += `
                           <button type="button" class="d-none btn btn-sm m-1 shadow btn-primary" id="qbtn`+currentQestBtn+`" data="`+currentQestBtn+`">`+btnid+`</button> 
                           `;
                    
                        var quest1 = e.question;
                        var op1 = e.opt1;
                        var op2 = e.opt2;
                        var op3 = e.opt3;
                        var op4 = e.opt4;
                        op1 = op1.replace("<p>&nbsp;</p>", "");
                        op2 = op2.replace("<p>&nbsp;</p>", "");
                        op3 = op3.replace("<p>&nbsp;</p>", "");
                        op4 = op4.replace("<p>&nbsp;</p>", "");
                        if(e.select == 'null'){
                        questions += `
                        <div class="card p-2 p-md-3 p-lg-4 border-dark rounded-lg d-none " data="`+currentQestBtn+`" id="qid`+currentQestBtn+`" data-qes="`+e.qid+`">
                            <div class="card-head d-flex">
                            <div class="flex-shrink-1">
                                <b>Q`+currentQestBtn+`.</b>&nbsp;</div>
                            <div>
                                `+quest1+`
                            </div>
                           
                            </div>    
                            <div class="card-body" >
                                <ul class="nav">
                                <li class="nav-item mr-2">
                                   a)&nbsp;&nbsp; <input type="radio" data="`+currentQestBtn+`" id="rad`+e.qid+`"  name="answers`+e.qid+`" value="opt1" >
                                </li>
                                <li class="nav-item">
                                    `+op1+`
                                </li>
                                </ul>
                                <ul class="nav">
                                <li class="nav-item mr-2">
                                    b)&nbsp;&nbsp; <input type="radio" data="`+currentQestBtn+`" id="rad`+e.qid+`" name="answers`+e.qid+`" value="opt2" >
                                </li>
                                <li class="nav-item">
                                    `+op2+`
                                </li>
                                </ul>
                                <ul class="nav">
                                <li class="nav-item mr-2">
                                    c)&nbsp;&nbsp;   <input type="radio" data="`+currentQestBtn+`" id="rad`+e.qid+`" name="answers`+e.qid+`" value="opt3" >
                                </li>
                                <li class="nav-item">
                                    `+op3+`
                                </li>
                                </ul>
                                <ul class="nav">
                                <li class="nav-item mr-2">
                                    d)&nbsp;&nbsp; <input type="radio" data="`+currentQestBtn+`" id="rad`+e.qid+`" name="answers`+e.qid+`" value="opt4" >
                                </li>
                                <li class="nav-item">
                                    `+op4+`
                                </li>
                                </ul>
                            </div>
                        </div>
                       
                        `;
                        }else{
                            var selected = '';
                            if(e.select == 'opt1'){
                                questions += `
                        <div class="card p-2 p-md-3 p-lg-4 border-dark rounded-lg d-none " data="`+currentQestBtn+`" id="qid`+currentQestBtn+`" data-qes="`+e.qid+`">
                            <div class="card-head d-flex">
                            <div class="flex-shrink-1">
                                <b>Q`+currentQestBtn+`.</b>&nbsp;</div>
                            <div>
                                `+quest1+`
                            </div>
                           
                            </div>    
                            <div class="card-body" >
                                <ul class="nav">
                                <li class="nav-item mr-2">
                                   a)&nbsp;&nbsp; <input checked type="radio" data="`+currentQestBtn+`" id="rad`+e.qid+`"  name="answers`+e.qid+`" value="opt1" >
                                </li>
                                <li class="nav-item">
                                    `+op1+`
                                </li>
                                </ul>
                                <ul class="nav">
                                <li class="nav-item mr-2">
                                    b)&nbsp;&nbsp; <input type="radio" data="`+currentQestBtn+`" id="rad`+e.qid+`" name="answers`+e.qid+`" value="opt2" >
                                </li>
                                <li class="nav-item">
                                    `+op2+`
                                </li>
                                </ul>
                                <ul class="nav">
                                <li class="nav-item mr-2">
                                    c)&nbsp;&nbsp;   <input type="radio" data="`+currentQestBtn+`" id="rad`+e.qid+`" name="answers`+e.qid+`" value="opt3" >
                                </li>
                                <li class="nav-item">
                                    `+op3+`
                                </li>
                                </ul>
                                <ul class="nav">
                                <li class="nav-item mr-2">
                                    d)&nbsp;&nbsp; <input type="radio" data="`+currentQestBtn+`" id="rad`+e.qid+`" name="answers`+e.qid+`" value="opt4" >
                                </li>
                                <li class="nav-item">
                                    `+op4+`
                                </li>
                                </ul>
                            </div>
                        </div>
                        `;
                            }
                            if(e.select == 'opt2'){
                                questions += `
                        <div class="card p-2 p-md-3 p-lg-4 border-dark rounded-lg d-none " data="`+currentQestBtn+`" id="qid`+currentQestBtn+`" data-qes="`+e.qid+`">
                            <div class="card-head d-flex">
                            <div class="flex-shrink-1">
                                <b>Q`+currentQestBtn+`.</b>&nbsp;</div>
                            <div>
                                `+quest1+`
                            </div>
                           
                            </div>    
                            <div class="card-body" >
                                <ul class="nav">
                                <li class="nav-item mr-2">
                                   a)&nbsp;&nbsp; <input type="radio" data="`+currentQestBtn+`" id="rad`+e.qid+`"  name="answers`+e.qid+`" value="opt1" >
                                </li>
                                <li class="nav-item">
                                    `+op1+`
                                </li>
                                </ul>
                                <ul class="nav">
                                <li class="nav-item mr-2">
                                    b)&nbsp;&nbsp; <input checked type="radio" data="`+currentQestBtn+`" id="rad`+e.qid+`" name="answers`+e.qid+`" value="opt2" >
                                </li>
                                <li class="nav-item">
                                    `+op2+`
                                </li>
                                </ul>
                                <ul class="nav">
                                <li class="nav-item mr-2">
                                    c)&nbsp;&nbsp;   <input type="radio" data="`+currentQestBtn+`" id="rad`+e.qid+`" name="answers`+e.qid+`" value="opt3" >
                                </li>
                                <li class="nav-item">
                                    `+op3+`
                                </li>
                                </ul>
                                <ul class="nav">
                                <li class="nav-item mr-2">
                                    d)&nbsp;&nbsp; <input type="radio" data="`+currentQestBtn+`" id="rad`+e.qid+`" name="answers`+e.qid+`" value="opt4" >
                                </li>
                                <li class="nav-item">
                                    `+op4+`
                                </li>
                                </ul>
                            </div>
                        </div>
                        `;
                            }
                            if(e.select == 'opt3'){
                                questions += `
                        <div class="card p-2 p-md-3 p-lg-4 border-dark rounded-lg d-none " data="`+currentQestBtn+`" id="qid`+currentQestBtn+`" data-qes="`+e.qid+`">
                            <div class="card-head d-flex">
                            <div class="flex-shrink-1">
                                <b>Q`+currentQestBtn+`.</b>&nbsp;</div>
                            <div>
                                `+quest1+`
                            </div>
                           
                            </div>    
                            <div class="card-body" >
                                <ul class="nav">
                                <li class="nav-item mr-2">
                                   a)&nbsp;&nbsp; <input type="radio" data="`+currentQestBtn+`" id="rad`+e.qid+`"  name="answers`+e.qid+`" value="opt1" >
                                </li>
                                <li class="nav-item">
                                    `+op1+`
                                </li>
                                </ul>
                                <ul class="nav">
                                <li class="nav-item mr-2">
                                    b)&nbsp;&nbsp; <input type="radio" data="`+currentQestBtn+`" id="rad`+e.qid+`" name="answers`+e.qid+`" value="opt2" >
                                </li>
                                <li class="nav-item">
                                    `+op2+`
                                </li>
                                </ul>
                                <ul class="nav">
                                <li class="nav-item mr-2">
                                    c)&nbsp;&nbsp;   <input checked type="radio" data="`+currentQestBtn+`" id="rad`+e.qid+`" name="answers`+e.qid+`" value="opt3" >
                                </li>
                                <li class="nav-item">
                                    `+op3+`
                                </li>
                                </ul>
                                <ul class="nav">
                                <li class="nav-item mr-2">
                                    d)&nbsp;&nbsp; <input type="radio" data="`+currentQestBtn+`" id="rad`+e.qid+`" name="answers`+e.qid+`" value="opt4" >
                                </li>
                                <li class="nav-item">
                                    `+op4+`
                                </li>
                                </ul>
                            </div>
                        </div>
                        `;
                            }
                            if(e.select == 'opt4'){
                                questions += `
                        <div class="card p-2 p-md-3 p-lg-4 border-dark rounded-lg d-none " data="`+currentQestBtn+`" id="qid`+currentQestBtn+`" data-qes="`+e.qid+`">
                            <div class="card-head d-flex">
                            <div class="flex-shrink-1">
                                <b>Q`+currentQestBtn+`.</b>&nbsp;</div>
                            <div>
                                `+quest1+`
                            </div>
                           
                            </div>    
                            <div class="card-body" >
                                <ul class="nav">
                                <li class="nav-item mr-2">
                                   a)&nbsp;&nbsp; <input type="radio" data="`+currentQestBtn+`" id="rad`+e.qid+`"  name="answers`+e.qid+`" value="opt1" >
                                </li>
                                <li class="nav-item">
                                    `+op1+`
                                </li>
                                </ul>
                                <ul class="nav">
                                <li class="nav-item mr-2">
                                    b)&nbsp;&nbsp; <input type="radio" data="`+currentQestBtn+`" id="rad`+e.qid+`" name="answers`+e.qid+`" value="opt2" >
                                </li>
                                <li class="nav-item">
                                    `+op2+`
                                </li>
                                </ul>
                                <ul class="nav">
                                <li class="nav-item mr-2">
                                    c)&nbsp;&nbsp;   <input type="radio" data="`+currentQestBtn+`" id="rad`+e.qid+`" name="answers`+e.qid+`" value="opt3" >
                                </li>
                                <li class="nav-item">
                                    `+op3+`
                                </li>
                                </ul>
                                <ul class="nav">
                                <li class="nav-item mr-2">
                                    d)&nbsp;&nbsp; <input checked type="radio" data="`+currentQestBtn+`" id="rad`+e.qid+`" name="answers`+e.qid+`" value="opt4" >
                                </li>
                                <li class="nav-item">
                                    `+op4+`
                                </li>
                                </ul>
                            </div>
                        </div>
                        `;
                            }
                            
                         

                        }

                        categories += `<div class="d-none bg-success p-2 text-center text-white rounded-lg "  id="cat`+currentQestBtn+`">`+e.category+`</div>`;
                  })

                  $('#QuestionNumBtns').append(buttons)
                    $('#questionCategories').append(categories);
                    $('#showQuestion').append(questions);
                    $("button[id^='qbtn']").removeClass('d-none').addClass('d-inline-block')
                  $('#qbtn1').removeClass('btn-primary').addClass('btn-success ')
                  $('#cat1').removeClass('d-none').addClass('d-block')
                  $('#qid1').removeClass('d-none').addClass('d-block ActiveButton')
                  $('#Nextdiv').removeClass('d-none').addClass('d-block')
                  $('#Submitdiv').removeClass('d-block').addClass('d-none')
                
                //   Set Active btn
                  $("button[id^='qbtn']").click(function(){
                    $("button[id^='qbtn']").removeClass('btn-success')
                    $('#qbtn1').addClass('btn-primary')
                    $(this).addClass('btn-success ')
                    let ids = parseInt($(this).attr('data'));
                 
                    if(ids == 1){
                        $('#Nextdiv').removeClass('d-none').addClass('d-block');
                        $('#Previousdiv').removeClass('d-block').addClass('d-none')
                        $('#Submitdiv').removeClass('d-block').addClass('d-none')
                    }else{
                        if(res.length > ids){
                        $('#Nextdiv').removeClass('d-none').addClass('d-block');
                        $('#Previousdiv').removeClass('d-none').addClass('d-block')
                        $('#Submitdiv').removeClass('d-block').addClass('d-none')
                    }
                    if(res.length == ids){
                        $('#Nextdiv').removeClass('d-block').addClass('d-none');
                        $('#Previousdiv').removeClass('d-none').addClass('d-block')
                        $('#Submitdiv').removeClass('d-none').addClass('d-block')
                    }
                   
                   
                    }
                    $("div[id^='qid']").removeClass('d-block ActiveButton').addClass('d-none')
                    $("div[id^='cat']").removeClass('d-block').addClass('d-none')
                    let currentQuestion = '#qid'+$(this).attr('data');
                    let currentCat  = '#cat'+$(this).attr('data');
                    $(currentCat).removeClass('d-none').addClass('d-block');
                    $(currentQuestion).removeClass('d-none').addClass('d-block ActiveButton');
                  });

                //   Next Button
              
                  $('#Next').click(function(){
                    var btnids =$("div").find('.ActiveButton').attr('data');
                     let nextid = parseInt(btnids)+1;
                     $("button[id^='qbtn']").removeClass('btn-success').addClass('btn-primary')
                     $("#qbtn"+nextid).addClass('btn-success')
                     $('#Submitdiv').removeClass('d-block').addClass('d-none')
                     if(res.length > nextid){
                        $("div[id^='qid']").removeClass('d-block ActiveButton').addClass('d-none')
                        $("div[id^='cat']").removeClass('d-block').addClass('d-none')
                        $('#Previousdiv').removeClass('d-none').addClass('d-block')
                        $('#qid'+nextid).removeClass('d-none').addClass('d-block ActiveButton');
                        $("#cat"+nextid).removeClass('d-none').addClass('d-block')
                        $('#qid'+nextid).removeClass('d-none').addClass('d-block ActiveButton');
                        $('#Submitdiv').removeClass('d-block').addClass('d-none')
                      
                     }
                     else if(res.length == nextid){
                        $('#Previousdiv').removeClass('d-none').addClass('d-block')
                        $("div[id^='qid']").removeClass('d-block ActiveButton').addClass('d-none')
                        $("div[id^='cat']").removeClass('d-block').addClass('d-none')
                        $('#qid'+nextid).removeClass('d-none').addClass('d-block ActiveButton');
                        $('#Nextdiv').removeClass('d-block').addClass('d-none')
                        $('#Submitdiv').removeClass('d-none').addClass('d-block')
                        $("#cat"+nextid).removeClass('d-none').addClass('d-block')
                     


                     }
                     return false;
                  })

                //   Previous Button
                // if($("input[id^='rad']").is(':checked')){
                        
                //     }
                $("input[id^='rad']").each(function(){
                     if($(this).is(':checked')){
                        $('#qbtn'+$(this).attr('data')).removeClass('btn-primary').addClass('btn-dark')
                     }
                    
                })
                $('#Previous').click(function(){
                    var btnids =$("div").find('.ActiveButton').attr('data');
                     let previousid = parseInt(btnids)-1;
                     $("button[id^='qbtn']").removeClass('btn-success').addClass('btn-primary')
                     $("#qbtn"+previousid).addClass('btn-success')
                    if(previousid == 1){
                        $('#Nextdiv').removeClass('d-none').addClass('d-block');
                        $('#Previousdiv').removeClass('d-block').addClass('d-none')
                        $('#Submitdiv').removeClass('d-block').addClass('d-none')
                        $("#cat"+previousid).removeClass('d-none').addClass('d-block')

                    }
                     if(res.length > previousid){
                        $('#Nextdiv').removeClass('d-none').addClass('d-block');
                        $("div[id^='qid']").removeClass('d-block ActiveButton').addClass('d-none')
                        $("div[id^='cat']").removeClass('d-block').addClass('d-none')
                        $('#qid'+previousid).removeClass('d-none').addClass('d-block ActiveButton');
                        $('#Submitdiv').removeClass('d-block').addClass('d-none')
                        $("#cat"+previousid).removeClass('d-none').addClass('d-block')
                     }
                     else if(res.length == previousid){
                        $('#Nextdiv').removeClass('d-none').addClass('d-block');
                        $("div[id^='qid']").removeClass('d-block ActiveButton').addClass('d-none')
                        $("div[id^='cat']").removeClass('d-block').addClass('d-none')
                        $('#qid'+previousid).removeClass('d-none').addClass('d-block ActiveButton');
                        $('#Nextdiv').removeClass('d-block').addClass('d-none')
                        $('#Submitdiv').removeClass('d-none').addClass('d-block')
                        $("#cat"+previousid).removeClass('d-none').addClass('d-block')

                     }
                  
                     return false;
                  })
                   
                        $("input[id^='rad']").click(function(){
                            var inputId = $(this).attr('data');
                            $('#qbtn'+inputId).removeClass('btn-success').addClass('btn-dark');
                          //  console.log($(this).attr('value'));
                            var choosenOption = $(this).attr('value');
                            var qids = $("div").find('.ActiveButton').attr('data-qes');
                            $.ajax({
                                type:'post',
                                url:"{{ url('student/storeeachQuestion') }}",
                                data:{qids:qids,user:user,subject:subject,choosenOption:choosenOption},
                                success:function(res){
                                   if(res.status == 0 ){
                                    swal({
                                        text: res.message,
                                        icon: "error",
                                        buttons: true,
                                        dangerMode: true,
                                        })
                                        .then(() => {
                                            window.location.href = "{{ url('studentLogin') }}";
                                        });
                                        return false;
                                   }
                                },
                                statusCode: {
                419: function() {
                    swal({
                                        text: 'Page expires please login again , and do not open any other tab while have exam',
                                        icon: "error",
                                        buttons: true,
                                        dangerMode: true,
                                        })
                                        .then(() => {
                                            window.location.href = "{{ url('studentLogin') }}";
                                        });
                                        return false;
                }
            }
                            })

                        })


                //   show Question

                
              

              

                $.ajax({
                type:'post',
                url:"{{ url('student/getfinalPaperRemainingTime') }}",
                data:{user:user,subject:subject},
                success:function(res){
                    timer2 = '60:00';
                    if(res !=  'NULL'){
                       // console.log('ok');
                         timer2 = res;
                    }
                    var interval = setInterval(function() {
                    var timer = timer2.split(':');
                    //by parsing integer, I avoid all extra string processing
                    var minutes = parseInt(timer[0], 10);
                    var seconds = parseInt(timer[1], 10);
                    --seconds;
                    minutes = (seconds < 0) ? --minutes : minutes;
                    if (minutes < 0) clearInterval(interval);
                    seconds = (seconds < 0) ? 59 : seconds;
                    seconds = (seconds < 10) ? '0' + seconds : seconds;
                    //minutes = (minutes < 10) ?  minutes : minutes;
                    if(minutes == 0 && seconds == 0){
                        
                        $('.countdown').html('00' + ':' + '00');
                        return false;
                    }
                    $('.countdown').html(minutes + ':' + seconds);
                    timer2 = minutes + ':' + seconds;
                        $('#timetaken').val(minutes+':'+seconds);
                    }, 1000);

                }

                 
       
            });
            
            function SendTime() {
            var user = "{{ $user }}";
            var subject = "{{ $subject }}";
            var time = $('#timetaken').val();
            console.log(time)
            if(time == '' || time == '0:01'){
               
                                    swal({
                                        text: 'Times limit over ',
                                        icon: "error",
                                        buttons: true,
                                        dangerMode: true,
                                        })
                                        .then(() => {
                                            $('#Submit').prop("type", "submit");
                                             $('#Submit').click();
                                        });
                                        return false;
                                   }
           
             //console.log('triggers');
            
            $.ajax({
                type:'post',
                url:"{{ url('student/getFinalTime') }}",
                data:{user:user,time:time,subject:subject},
                success:function(res){
                    if(res.status == 0)
                    swal({
                                        text: res.message,
                                        icon: "error",
                                        buttons: true,
                                        dangerMode: true,
                                        })
                                        .then(() => {
                                            window.location.href = "{{ url('studentLogin') }}";
                                        });
                                        return false;
                },
                statusCode: {
                419: function() {
                    swal({
                                        text: 'You are already logged in from another browser, please use one browser only',
                                        icon: "error",
                                        buttons: true,
                                        dangerMode: true,
                                        })
                                        .then(() => {
                                            window.location.href = "{{ url('studentLogin') }}";
                                        });
                                        return false;
                }
            }
            })
        }  
        setInterval(SendTime, 10000); 
                },
                complete: function(){
                    $('#preloader').fadeOut();
    }
            });
           
            })
         
        });
        $(document).on("contextmenu",function(){
            rightClick();
       return false;
    }); 
    $(document).bind('copy paste', function(e) {
        copyPaste();
        return false;
    });
    document.onkeydown=function(e)
        {
        if(e.which == 17)
        isCtrl=true;
        if(((e.which == 85) || (e.which == 117) || (e.which == 65) || (e.which == 97) || (e.which == 67) || (e.which == 99)) && isCtrl == true)
        {
            copyPaste();
        return false;
        }
        }
    $(window).blur(function(e) {
        tabchange();
        return false;
    });



        function rightClick(){
            $.ajax({
                type:'post',
                url:"{{ url('student/rightclickdisbled') }}",
                data:{event:true},
                success:function(res){
                   // console.log(res);
                }
            });
        }

        function copyPaste(){
            $.ajax({
                type:'post',
                url:"{{ url('student/copydisbled') }}",
                data:{event:true},
                success:function(res){
                  //  console.log(res);
                }
            });
        }
        function tabchange(){
            $.ajax({
                type:'post',
                url:"{{ url('student/tabdisabled') }}",
                data:{event:true},
                success:function(res){
                  //  console.log(res);
                }
            });
        }

</script>
</body>
</html>