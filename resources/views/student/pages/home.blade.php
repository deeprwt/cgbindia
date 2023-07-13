@extends('student.layout.template')
@section('head')
    <title>Home </title>
@endsection
@section('main')

<div class="mdc-card">
    <section class="  ">
        <div class="container" >
        <br><br><br>
      <span class=" ">
        <h3 class="text-danger text-left" >
            Kindly Attention-
        </h4>
        <p>Those who were not able to submit their math papers on 23/01/2022, please email your details (Name, Registered Mobile number, Registered email id, School Name, City, State, School Code) at <a href="mailto:isfosupport@eupheus.in" class="text-primary">isfosupport@eupheus.in</a></p>
      </span>
       
    </div>
    </section><br><br>
   <div class="row px-3">
       <div class="col-8">
        <h4 class="card-title">Your Subjects </h4>
       </div>
       <div class="col-4">
        <h4 class="card-title">Your Grade : <b>{{ Auth::guard('student')->User()->class }}</b> </h4>
       </div>
   </div>
    <br>
    <ul class="" id="subject">

    </ul>

    
</div>

@endsection
@section('js')
<script>
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var roll_no = "{{ Auth::guard('student')->User()->roll_no }}"
$.ajax({
    type:'get',
    url:"{{ url('student/all-subject') }}",
    data:{roll_no:roll_no},
    success:function(res){
        $.each(res, function(i,e){
            let subject = e.subject;
           
            if(subject == 'GK') {
                subject = 'General Knowledge';
            }
            $('#subject').append(`
            <li class="text-capitalize">`+subject+`</li>
            `);
        });
    }
})
</script>
@endsection