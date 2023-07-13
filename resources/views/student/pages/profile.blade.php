@extends('student.layout.template')
@section('main')
<div class="mdc-card">
   <div class="row">
       <div class="col-md-6 p-2">
        <h4 class="card-title">Your Subject</h4>
        <br>
       
            <ul class="list-group"  id="subject">
            
            </ul>
        </div>
        <div class="col-md-6 p-2">
            <h4 class="card-title text-info">Add Subject</h4>
            <br>
            <div class="p-2">
                <div class="form-group row">
                  <div class="col-8">
                    <label for="">Enter Subject Invitation Code </label>
                    <input type="text" name="" id="subjectCode" class="form-control" placeholder="Subject invitation code " >
                    <small id="helpId0" class="text-danger" ></small>
                  </div>
                  <div class="col-4 mt-2">
                      <br>
                      <button type="button" class="btn btn-info" id="AddSubjectCode">Add Subject</button>
                  </div>
                </div>
            </div>
        </div>
       </div>
   </div>
</div>
@endsection
@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
            if(subject.slice(-3) == 'ENG') {
                subject = 'English';
            }
            if(subject.slice(-3) == 'MAT') {
                subject = 'Maths';
            }
            if(subject.slice(-3) == 'SCI') {
                subject = 'Science';
            }
            if(subject.slice(-3) == 'GKN') {
                subject = 'GK';
            }
            $('#subject').append(`
            <li class="list-group-item border-0">`+subject+`</li>
            `);
        });
    }
})
$('#AddSubjectCode').click(function(){
    var code = $('#subjectCode').val();
    var id = "{{ Auth::guard('student')->User()->email }}"
    $.ajax({
        type: "post",
        url: "{{ url('student/add-subject') }}",
        data: { code:code,id:id},
      
        success: function (response) {
        $.each(response , function(i,e){
            if(i == 'error'){
                Swal.fire({
                icon: 'error',
                title: 'Error !',
                text: e,
               
                })
            }
            if(i == 'success'){
                Swal.fire({
                icon: 'success',
                title: 'Success :)',
                text: e,
               
                })
            }
        })
        }
    });
})
</script>
@endsection