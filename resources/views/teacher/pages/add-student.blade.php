@extends('teacher.layout.template')
@section('head')
    <title>Add Student</title>
@endsection
@section('main')
<div class="mdc-card">
    <h4 class="card-title">Add Student </h4>
    <div class="container-fluid">
        <table class="table table-bordered w-100 text-left">
            <thead class="bg-primary text-white">
                <tr>
                    <th class="text-white text-left">Full Name of Student<sup class="text-danger">*</sup></th>
                    <th class="text-white text-left">Class<sup class="text-danger">*</sup></th>
                    <th class="text-white text-left">Subject<sup class="text-danger">*</sup></th>
                    <th class="text-white text-left">Email<sup class="text-danger">*</sup></th>
                    <th class="text-white text-left">Mobile<sup class="text-danger">*</sup></th>
                    <th class="text-white text-left">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <form id="form11">
                        <input type="hidden" value="{{ Auth::guard('teacher')->User()->school_code }}" name="code" id="">
                   <td>
                       <input type="text" name="name" class="form-control" id="" placeholder="student Name" required>
                   </td>
                   <td>
                    <input type="number" name="class" min="1" max="10" class="form-control" id="" placeholder="Class (only in number)" required>
                   </td>
                   <td>
                   <div class="py-1 text-center">
                    <input type="checkbox" name="subject[]" value="science" id="">Science&nbsp;&nbsp;
                    <input type="checkbox" name="subject[]" value="maths" id="">Maths&nbsp;&nbsp;
                    <input type="checkbox" name="subject[]" value="english" id="">English&nbsp;&nbsp;
                    <input type="checkbox" name="subject[]" value="gk" id="">GK&nbsp;&nbsp;
                   </div>
                   </td>
                   <td>
                    <input type="text" name="email" class="form-control" id="" placeholder="Email" required>
                   </td>
                   <td>
                    <input minlength="10" maxlength="10" type="text" name="phone" class="form-control" id="" placeholder="phone" required>
                   </td>
                   <td ><input type="submit" class="btn btn-success" value="Add ">
                    <button class="btn btn-danger" type="reset"> Reset</button>
                   </td>
                </form>
                </tr>
                <tr>
                    <form id="form12">
                        <input type="hidden" value="{{ Auth::guard('teacher')->User()->school_code }}" name="code" id="">
                  <td>
                       <input type="text" name="name" class="form-control" id="" placeholder="student Name" required>
                   </td>
                   <td>
                    <input type="number" name="class" min="1" max="10" class="form-control" id="" placeholder="Class (only in number)" required>
                   </td>
                   <td>
                   <div class="py-1 text-center">
                     <input type="checkbox" name="subject[]" value="science" id="">Science&nbsp;&nbsp;
                    <input type="checkbox" name="subject[]" value="maths" id="">Maths&nbsp;&nbsp;
                    <input type="checkbox" name="subject[]" value="english" id="">English&nbsp;&nbsp;
                    <input type="checkbox" name="subject[]" value="gk" id="">GK&nbsp;&nbsp;
                   </div>
                   </td>
                   <td>
                    <input type="text" name="email" class="form-control" id="" placeholder="Email" required>
                   </td>
                   <td>
                    <input minlength="10" maxlength="10" type="text" name="phone" class="form-control" id="" placeholder="phone" required>
                   </td>
                   <td><input type="submit" class="btn btn-success" value="Add ">
                    <button class="btn btn-danger" type="reset"> Reset</button>
                   </td>
                </form>
                </tr>
                <tr>
                    <form id="form13">
                  <td>
                       <input type="text" name="name" class="form-control" id="" placeholder="student Name" required>
                       <input type="hidden" value="{{ Auth::guard('teacher')->User()->school_code }}" name="code" id="">
                   </td>
                   <td>
                    <input type="number" name="class" min="1" max="10" class="form-control" id="" placeholder="Class (only in number)" required>
                   </td>
                   <td>
                   <div class="py-1 text-center">
                     <input type="checkbox" name="subject[]" value="science" id="">Science&nbsp;&nbsp;
                    <input type="checkbox" name="subject[]" value="maths" id="">Maths&nbsp;&nbsp;
                    <input type="checkbox" name="subject[]" value="english" id="">English&nbsp;&nbsp;
                    <input type="checkbox" name="subject[]" value="gk" id="">GK&nbsp;&nbsp;
                   </div>
                   </td>
                   <td>
                    <input type="text" name="email" class="form-control" id="" placeholder="Email" required>
                   </td>
                   <td>
                    <input minlength="10" maxlength="10" type="text" name="phone" class="form-control" id="" placeholder="phone" required>
                   </td>
                   <td><input type="submit" class="btn btn-success" value="Add ">
                    <button class="btn btn-danger" type="reset"> Reset</button>
                   </td>
                </form>
                </tr>
                <tr>
                    <form id="form14">
                  <td>
                       <input type="text" name="name" class="form-control" id="" placeholder="student Name" required>
                       <input type="hidden" value="{{ Auth::guard('teacher')->User()->school_code }}" name="code" id="">
                   </td>
                   <td>
                    <input type="number" name="class" min="1" max="10" class="form-control" id="" placeholder="Class (only in number)" required>
                   </td>
                   <td>
                   <div class="py-1 text-center">
                     <input type="checkbox" name="subject[]" value="science" id="">Science&nbsp;&nbsp;
                    <input type="checkbox" name="subject[]" value="maths" id="">Maths&nbsp;&nbsp;
                    <input type="checkbox" name="subject[]" value="english" id="">English&nbsp;&nbsp;
                    <input type="checkbox" name="subject[]" value="gk" id="">GK&nbsp;&nbsp;
                   </div>
                   </td>
                   <td>
                    <input type="text" name="email" class="form-control" id="" placeholder="Email" required>
                   </td>
                   <td>
                    <input minlength="10" maxlength="10" type="text" name="phone" class="form-control" id="" placeholder="phone" required>
                   </td>
                   <td><input type="submit" class="btn btn-success" value="Add ">
                    <button class="btn btn-danger" type="reset"> Reset</button>
                   </td>
                </form>
                </tr>
                <tr>
                    <form id="form15">
                  <td>
                       <input type="text" name="name" class="form-control" id="" placeholder="student Name" required>
                       <input type="hidden" value="{{ Auth::guard('teacher')->User()->school_code }}" name="code" id="">
                   </td>
                   <td>
                    <input type="number" name="class" min="1" max="10" class="form-control" id="" placeholder="Class (only in number)" required>
                   </td>
                   <td>
                   <div class="py-1 text-center">
                     <input type="checkbox" name="subject[]" value="science" id="">Science&nbsp;&nbsp;
                    <input type="checkbox" name="subject[]" value="maths" id="">Maths&nbsp;&nbsp;
                    <input type="checkbox" name="subject[]" value="english" id="">English&nbsp;&nbsp;
                    <input type="checkbox" name="subject[]" value="gk" id="">GK&nbsp;&nbsp;
                   </div>
                   </td>
                   <td>
                    <input type="text" name="email" class="form-control" id="" placeholder="Email" required>
                   </td>
                   <td>
                    <input minlength="10" maxlength="10" type="text" name="phone" class="form-control" id="" placeholder="phone" required>
                   </td>
                   <td><input type="submit" class="btn btn-success" value="Add ">
                    <button class="btn btn-danger" type="reset"> Reset</button>
                   </td>
                </form>
                </tr>
                <tr>
                    <form id="form16">
                  <td>
                       <input type="text" name="name" class="form-control" id="" placeholder="student Name" required>
                       <input type="hidden" value="{{ Auth::guard('teacher')->User()->school_code }}" name="code" id="">
                   </td>
                   <td>
                    <input type="number" name="class" min="1" max="10" class="form-control" id="" placeholder="Class (only in number)" required>
                   </td>
                   <td>
                   <div class="py-1 text-center">
                     <input type="checkbox" name="subject[]" value="science" id="">Science&nbsp;&nbsp;
                    <input type="checkbox" name="subject[]" value="maths" id="">Maths&nbsp;&nbsp;
                    <input type="checkbox" name="subject[]" value="english" id="">English&nbsp;&nbsp;
                    <input type="checkbox" name="subject[]" value="gk" id="">GK&nbsp;&nbsp;
                   </div>
                   </td>
                   <td>
                    <input type="text" name="email" class="form-control" id="" placeholder="Email" required>
                   </td>
                   <td>
                    <input minlength="10" maxlength="10" type="text" name="phone" class="form-control" id="" placeholder="phone" required>
                   </td>
                   <td><input type="submit" class="btn btn-success" value="Add ">
                    <button class="btn btn-danger" type="reset"> Reset</button>
                   </td>
                </form>
                </tr>
                <tr>
                    <form id="form17">
                  <td>
                       <input type="text" name="name" class="form-control" id="" placeholder="student Name" required>
                       <input type="hidden" value="{{ Auth::guard('teacher')->User()->school_code }}" name="code" id="">
                   </td>
                   <td>
                    <input type="number" name="class" min="1" max="10" class="form-control" id="" placeholder="Class (only in number)" required>
                   </td>
                   <td>
                   <div class="py-1 text-center">
                     <input type="checkbox" name="subject[]" value="science" id="">Science&nbsp;&nbsp;
                    <input type="checkbox" name="subject[]" value="maths" id="">Maths&nbsp;&nbsp;
                    <input type="checkbox" name="subject[]" value="english" id="">English&nbsp;&nbsp;
                    <input type="checkbox" name="subject[]" value="gk" id="">GK&nbsp;&nbsp;
                   </div>
                   </td>
                   <td>
                    <input type="text" name="email" class="form-control" id="" placeholder="Email" required>
                   </td>
                   <td>
                    <input minlength="10" maxlength="10" type="text" name="phone" class="form-control" id="" placeholder="phone" required>
                   </td>
                   <td><input type="submit" class="btn btn-success" value="Add ">
                    <button class="btn btn-danger" type="reset"> Reset</button>
                   </td>
                </form>
                </tr>
                <tr>
                    <form id="form18">
                  <td>
                       <input type="text" name="name" class="form-control" id="" placeholder="student Name" required>
                       <input type="hidden" value="{{ Auth::guard('teacher')->User()->school_code }}" name="code" id="">
                   </td>
                   <td>
                    <input type="number" name="class" min="1" max="10" class="form-control" id="" placeholder="Class (only in number)" required>
                   </td>
                   <td>
                   <div class="py-1 text-center">
                     <input type="checkbox" name="subject[]" value="science" id="">Science&nbsp;&nbsp;
                    <input type="checkbox" name="subject[]" value="maths" id="">Maths&nbsp;&nbsp;
                    <input type="checkbox" name="subject[]" value="english" id="">English&nbsp;&nbsp;
                    <input type="checkbox" name="subject[]" value="gk" id="">GK&nbsp;&nbsp;
                   </div>
                   </td>
                   <td>
                    <input type="text" name="email" class="form-control" id="" placeholder="Email" required>
                   </td>
                   <td>
                    <input minlength="10" maxlength="10" type="text" name="phone" class="form-control" id="" placeholder="phone" required>
                   </td>
                   <td><input type="submit" class="btn btn-success" value="Add ">
                    <button class="btn btn-danger" type="reset"> Reset</button>
                   </td>
                </form>
                </tr>
                <tr>
                    <form id="form19">
                  <td>
                       <input type="text" name="name" class="form-control" id="" placeholder="student Name" required>
                       <input type="hidden" value="{{ Auth::guard('teacher')->User()->school_code }}" name="code" id="">
                   </td>
                   <td>
                    <input type="number" name="class" min="1" max="10" class="form-control" id="" placeholder="Class (only in number)" required>
                   </td>
                   <td>
                   <div class="py-1 text-center">
                     <input type="checkbox" name="subject[]" value="science" id="">Science&nbsp;&nbsp;
                    <input type="checkbox" name="subject[]" value="maths" id="">Maths&nbsp;&nbsp;
                    <input type="checkbox" name="subject[]" value="english" id="">English&nbsp;&nbsp;
                    <input type="checkbox" name="subject[]" value="gk" id="">GK&nbsp;&nbsp;
                   </div>
                   </td>
                   <td>
                    <input type="text" name="email" class="form-control" id="" placeholder="Email" required>
                   </td>
                   <td>
                    <input minlength="10" maxlength="10" type="text" name="phone" class="form-control" id="" placeholder="phone" required>
                   </td>
                   <td><input type="submit" class="btn btn-success" value="Add ">
                    <button class="btn btn-danger" type="reset"> Reset</button>
                   </td>
                </form>
                </tr>
                <tr>
                    <form id="form10">
                  <td>
                       <input type="text" name="name" class="form-control" id="" placeholder="student Name" required>
                       <input type="hidden" value="{{ Auth::guard('teacher')->User()->school_code }}" name="code" id="">
                   </td>
                   <td>
                    <input type="number" name="class" min="1" max="10" class="form-control" id="" placeholder="Class (only in number)" required>
                   </td>
                   <td>
                   <div class="py-1 text-center">
                     <input type="checkbox" name="subject[]" value="science" id="">Science&nbsp;&nbsp;
                    <input type="checkbox" name="subject[]" value="maths" id="">Maths&nbsp;&nbsp;
                    <input type="checkbox" name="subject[]" value="english" id="">English&nbsp;&nbsp;
                    <input type="checkbox" name="subject[]" value="gk" id="">GK&nbsp;&nbsp;
                   </div>
                   </td>
                   <td>
                    <input type="text" name="email" class="form-control" id="" placeholder="Email" required>
                   </td>
                   <td>
                    <input minlength="10" maxlength="10" type="text" name="phone" class="form-control" id="" placeholder="phone" required>
                   </td>
                   <td><input type="submit" class="btn btn-success" value="Add ">
                    <button class="btn btn-danger" type="reset"> Reset</button>
                   </td>
                </form>
                </tr>
            </tbody>
        </table>
        <div class="text-right">
            <button onClick="window.location.reload();" class="btn btn-primary">Add More Students</button>
        </div>
        
    </div>
</div>
@endsection
@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  $( "form" ).each( function() {

/* addEventListener onsubmit each form */
$( this ).bind( "submit", function(event) {

    /* return false */
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    event.preventDefault();
    var data = $(this).serialize();
   // console.log(data);
   console.log( event )
   
    $.ajax({
        type:'post',
        url:"{{ route('adding.studnet.teacher') }}",
        data:data,
        beforeSend: function () {
            $(document.activeElement).addClass('spinner-border');
    },
    success: function (response) {
        $.each(response, function(i,e){
            $(document.activeElement).removeClass('spinner-border')
            $(document.activeElement).removeClass('bg-success').addClass('bg-danger')
            $(document.activeElement).val('Error')
            if(i == 'error'){
                Swal.fire({
                title: 'Error!',
                text: e,
                icon: 'error',
                confirmButtonText: 'Cool'
                })
            }
          
            if(i == 'success'){
                $(document.activeElement).removeClass('spinner-border')
                $(document.activeElement).removeClass('bg-danger').addClass('bg-success')
                $(document.activeElement).val('Added')
            }
        })
    },
    })
    /* display each props of forms */
  //  console.log($(this).serialize()   ); // object formHTML
 
    

} );

});
    </script>
@endsection