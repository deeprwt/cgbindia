@extends('student.layout.template')
@section('head')
    <title>{{ $subject }} Practise Test</title>
    <link rel="stylesheet" type="text/css" href="{{ url('css/duDialog.min.css') }}">
  
@endsection
@section('main')
<div class="mdc-card" id="makeFullScreen">
   
    <div class="row">
        <div class="col-md-7">
            <h4 class="card-title">{{ $subject }} Practise Test</h4>
        </div>
       
        <div class="col-md-5 text-right d-none" id="startedTest">
           
           
            
            <button class="btn btn-lg btn-outline-danger text-dark " id="remaingTime" disabled>Time remaining : <span class="countdown"></span></button>
            <button class="btn bg-transparent" data-toggle="tooltip" title="full screen" id="fullscreenbtn">
                <i class="fas fa-expand-arrows-alt"></i>
            </button>
           
          
        </div>
        
    </div>
   <section class="py-4">
       <div class="row p-3">
            <div class="col-md-3">
                <div class="row" id="showButton">

                </div>
            </div>
            <div class="col-md-9 " >
                <div class="jumbotron" id="afterStartatest">
                      
                    <p class="lead text-center font-weight-bold">Click to Start Test </p>
                    <hr class="my-4">
                   <div class="text-center">
                      <button class="btn btn-success px-3" type="button" id="startTests">Start</button>
                   </div>
                </div>
              <form id="questionAnswerData" method="post" action="{{ route('practise-tests.store') }}">
                @csrf
                  <input type="hidden" name="user" value="{{ $user }}"> 
                  <input type="hidden" name="class" value="{{ Auth::guard('student')->User()->class }}"> 
                  <input type="hidden" name="subject" value="{{ $subject }}">
                  <input type="hidden" name="time" value="" id="timetaken">
                  {{-- <div id="starttest"></div> --}}
                 
                    <div class="" id="questionCategories"></div>
                    <div id="showQuestion"></div>
                 
                
            
                <div id="showQuestionButtons" class="d-none">
                    <div class="row my-3">
                        <div class="col-md-6 text-left">
                            <button type="button" class="btn btn-info" id="previous">Previous</button>
                        </div>
                        <div class="col-md-6 text-right">
                            <button type="button" class="btn px-4 btn-primary" id="next">Next</button>
                        </div>
                        </div>
                </div>
               
            </div>
           
       </div>
       <div class="col-12 mt-4">
        <div class="text-right d-none"id="showSubmit">
            <button type="button" id="submitTest" class="mdc-button mdc-button--unelevated">End Exam</button>
        </div>
    </div>
   
</form>

   </section>
</div>
<div id="confirm" class="modal">
    <div class="modal-body">
      Are you sure?
    </div>
    <div class="modal-footer">
      <button type="button" data-dismiss="modal" class="btn btn-primary" id="delete">Delete</button>
      <button type="button" data-dismiss="modal" class="btn">Cancel</button>
    </div>
  </div>
  
@endsection
@section('js')
<script type="text/javascript" src="{{ url('js/duDialog.min.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function () {
            //  CONFIRM BUTTON
            $('#submitTest').click(function() {
              //  e.preventDefault();
                yesNoDlg.show()
            });
            yesNoDlg = duDialog(null, 'Are you sure want to submit all questions?', {
				init: true, dark: true, 
				buttons: duDialog.OK_CANCEL,
				okText: 'submit',
				callbacks: {
					okClick: function() {
                         $('#questionAnswerData').trigger('submit');
						// this.hide()
                        //console.log();
						console.log('Proceed clicked!')
					}	
				}
			}),
           


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // PAPER TIMER
            var user = "{{ $user }}";
            var subject = "{{ $subject }}";
            $.ajax({
                type:'post',
                url:"{{ url('student/getpractisePaperRemainingTime') }}",
                data:{user:user,subject:subject},
                success:function(res){
                    console.log(res);
                    //var timer2 = "60:01";
                    var timer2 = "00:10";
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
           


           $.ajax({
                type:'post',
                url:"{{ url('student/showPractiseQuestion') }}",
                data:{'user':user,'subject':subject},
                success:function(res){
                   // console.log(res);
                   
                    var buttons = '';
                        var html = '';
                        var categories = '';
                        let iterator = 1;
                    $.each(res,function(i,e){
                        //console.log(e);
                        if(e.error == '1'){
                            //console.log(e.message);
                            var newnumber = e.message;
                            var url = document.URL;
                            var segements = url.split("/");
                            segements[segements.length - 1] = "" + newnumber;
                            var newurl = segements.join("/");
                                console.log(newurl);
                            window.location.href = newurl;
                        }
                        if(e.class == 1){
                            var fontsize='2rem';
                        }
                        
                       
                        let idnumber = i+1;
                       
                        if(idnumber < 10){
                            idnumber = '0'+idnumber
                        }
                         buttons += `
                        <div class=" p-1">
                        <button class="mdc-button mdc-button--raised icon-button my-1" id="id`+idnumber+`" data="`+iterator+`">`+idnumber+`</button>    
                        </div>
                        `;
                        var quest1 = e.question;
                        var op1 = e.opt1;
                        var op2 = e.opt2;
                        var op3 = e.opt3;
                        var op4 = e.opt4;
                        console.log(quest1);
                     //   quest1 = quest1.replace(/\n/g, ' ');
                     
                        console.log(quest1.replace("<p>&nbsp;</p>/\n/g<p>&nbsp;</p>",""));
                     
                     //   quest1 = quest1.replace("<p>&nbsp;</p>\n<p>&nbsp;</p>",'');
                        op1 = op1.replace("<p>&nbsp;</p>", "");
                        op2 = op2.replace("<p>&nbsp;</p>", "");
                        op3 = op3.replace("<p>&nbsp;</p>", "");
                        op4 = op4.replace("<p>&nbsp;</p>", "");

                        html += `
                        
                        <div class="card p-2 p-md-3 p-lg-4 border-dark rounded-lg  d-none" id="qid`+iterator+`">
                            <div class="card-head">
                                <ul class="nav">
                                <li class="nav-item mr-2">
                                   <b>Q`+iterator+`.</b>  
                                </li>
                                <li class="nav-item">
                                    `+quest1+`
                                </li>
                                </ul>
                             
                            </div>    
                            <div class="card-body" >
                                <ul class="nav">
                                <li class="nav-item mr-2">
                                   a)&nbsp;&nbsp; <input type="radio" data="`+idnumber+`" id="rad`+e.qid+`"  name="answers`+e.qid+`" value="opt1" >
                                </li>
                                <li class="nav-item">
                                    `+op1+`
                                </li>
                                </ul>
                                <ul class="nav">
                                <li class="nav-item mr-2">
                                    b)&nbsp;&nbsp; <input type="radio" data="`+idnumber+`" id="rad`+e.qid+`" name="answers`+e.qid+`" value="opt2" >
                                </li>
                                <li class="nav-item">
                                    `+op2+`
                                </li>
                                </ul>
                                <ul class="nav">
                                <li class="nav-item mr-2">
                                    c)&nbsp;&nbsp;   <input type="radio" data="`+idnumber+`" id="rad`+e.qid+`" name="answers`+e.qid+`" value="opt3" >
                                </li>
                                <li class="nav-item">
                                    `+op3+`
                                </li>
                                </ul>
                                <ul class="nav">
                                <li class="nav-item mr-2">
                                    d)&nbsp;&nbsp; <input type="radio" data="`+idnumber+`" id="rad`+e.qid+`" name="answers`+e.qid+`" value="opt4" >
                                </li>
                                <li class="nav-item">
                                    `+op4+`
                                </li>
                                </ul>
                              
                               
                            </div>
                        </div>
                       
                        `;

                        categories += `<span class="d-none btn btn-success" id="cat`+iterator+`">`+e.category+`</span>`;

                      iterator++;
                    })
            $('#showButton').append(buttons).addClass('d-none');
           $('#questionCategories').append(categories);
            $('#showQuestion').append(html);


            $('#startTests').click(function(){
           
           $('#afterStartatest').addClass('d-none');
           $('#startedTest').removeClass('d-none').addClass('d-block');
           $('#showSubmit').removeClass('d-none').addClass('d-block');
           $('#showQuestionButtons').removeClass('d-none').addClass('d-block');
           $('#showButton').removeClass('d-none');
          
            $('#cat1').removeClass('d-none').addClass('d-block');
            $('#qid1').removeClass('d-none').addClass('d-block');
            $('#id01').addClass('filled-button--success ActiveButton');
            
    // function SendTime() {
    //         var user = "{{ $user }}";
    //         var time = $('#timetaken').val();

    //         console.log(user+':::'+time);
    //     }     
        setInterval(SendTime, 3000);  
        function SendTime() {
            var user = "{{ $user }}";
            var subject = "{{ $subject }}";
            var time = $('#timetaken').val();
            if(time == ''){
            
             $('#submitTest').prop("type", "submit");
             $('#submitTest').click();
             //console.log('triggers');
            }
            $.ajax({
                type:'post',
                url:"{{ url('student/getTimeFromTestPaper') }}",
                data:{user:user,time:time,subject:subject},
                success:function(res){
                    console.log(res);
                }
            })
        }     
        
       })

       
      
        

                    $("button[id^='id']").click(function(){
                        console.log('btn clicked');
                            var qid = $(this).attr('data');
                            $("button[id^='id']").removeClass('filled-button--success ActiveButton');

                            $(this).addClass('filled-button--success ActiveButton')
                        $("div[id^='qid']").removeClass('d-block').addClass('d-none');
                        $("span[id^='cat']").removeClass('d-block').addClass('d-none');
                        $('#qid'+qid).removeClass('d-none').addClass('d-block');
                        $('#cat'+qid).removeClass('d-none').addClass('d-block');

                            
                        })
                      
                    $('#next').click(function(){

                        var btnids =$("#showButton").find('.ActiveButton').attr('data');
                        var btnid =$("#showButton").find('.ActiveButton').attr('id');
                        //console.log(btnid)
                        var newid = parseInt(btnids)+1;
                        var qids = parseInt(btnids)+1;
                        if(res.length >= newid ){
                            $('#'+btnid).removeClass('filled-button--success ActiveButton');

                        
                            if(newid < 10){
                                newid = '0'+newid
                            }
                            $('#id'+newid).addClass('filled-button--success ActiveButton');
                            $("div[id^='qid']").removeClass('d-block').addClass('d-none');
                            $('#qid'+qids).removeClass('d-none').addClass('d-block');
                            $("span[id^='cat']").removeClass('d-block').addClass('d-none');
                            $('#cat'+qids).removeClass('d-none').addClass('d-block');
                        }else{
                            
                        }

                      
                        //console.log(newid); 
                        // $('#qid'+newid).removeClass('d-none').removeClass('d-block').addClass('d-block');
                        
                    })
                   
                    $('#previous').click(function(){
                        var checkprbtn =$("#showButton").find('.ActiveButton').attr('data');
                        var getprid = parseInt(checkprbtn);
                        if(getprid != 1){

                            var btnids =$("#showButton").find('.ActiveButton').attr('data');
                        var btnid =$("#showButton").find('.ActiveButton').attr('id');
                        //console.log(btnid)
                        $('#'+btnid).removeClass('filled-button--success ActiveButton');
                        var newid = parseInt(btnids)-1;
                        var qids = parseInt(btnids)-1;
                        
                        if(newid < 10){
                            newid = '0'+newid
                        }
                        $('#id'+newid).addClass('filled-button--success ActiveButton');
                        $("div[id^='qid']").removeClass('d-block').addClass('d-none');
                        $('#qid'+qids).removeClass('d-none').addClass('d-block');
                        $("span[id^='cat']").removeClass('d-block').addClass('d-none');
                        $('#cat'+qids).removeClass('d-none').addClass('d-block');  
                            }
                           
                             
                        //console.log(newid); 
                        // $('#qid'+newid).removeClass('d-none').removeClass('d-block').addClass('d-block');
                        
                    })
                       
                         $("input[id^='rad']").click(function(){
                            var inputId = $(this).attr('data');
                            $('#id'+inputId).removeClass('filled-button--success').addClass('filled-button--dark');
                            
                            return true;

                        })
                }
           })
         
           $('#fullscreenbtn').click(function () {
            $('#fullscreenClose').toggleClass('mdc-drawer--open')
            $("#makeFullScreen").toggleClass("fullSCreen");
            
           });

        });
        $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js

    });
    document.addEventListener('contextmenu', event => event.preventDefault());
    document.onkeydown = function(e) {
        if (e.ctrlKey && 
            (e.keyCode === 67 || 
             e.keyCode === 86 || 
             e.keyCode === 85 || 
             e.keyCode === 117)) {
           Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Not Allowed',
  
})
            return false;
        } else {
            return true;
        }
       
};
$(document).bind('keydown', function(e) {
  if(e.ctrlKey && (e.which == 83)) {
    e.preventDefault();
   Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Not Allowed',
  
})
    return false;
  }
});
$(document).on('keydown', function(e) { 
    if((e.ctrlKey || e.metaKey) && (e.key == "p" || e.charCode == 16 || e.charCode == 112 || e.keyCode == 80) ){
     Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Not Allowed',
  
})
        e.cancelBubble = true;
        e.preventDefault();

        e.stopImmediatePropagation();
    }  
});

       
      
       
       
      
      // alert( $('input[name="answers"]:checked').val());
        // $('#submitTest').click(function(){
            
        //     console.log($('#questionAnswerData').serialize());
        // })

       
    </script>
@endsection
