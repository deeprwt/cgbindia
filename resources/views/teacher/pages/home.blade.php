@extends('teacher.layout.template')
@section('head')
    <title>Add Student</title>
@endsection
@section('main')
<div class="mdc-card">
    <h4 class="card-title">Registered Student</h4>
    <div class="container-fluid">
        <table class="table table-bordered w-100 text-left">
            <thead class="bg-info text-white">
                <tr>
                    <th class="text-white text-left">Name of Student</th>
                    <th class="text-white text-left">Roll no</th>
                    <th class="text-white text-left">Password</th>
                    <th class="text-white text-left">Class</th>
                   
                    <th class="text-white text-left">Email</th>
                    <th class="text-white text-left">Mobile</th>
                   
                </tr>
            </thead>
            <tbody id="students">
               
            </tbody>
        </table>
       
    </div>
</div>
@endsection
@section('js')
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script>
    var code = "{{ Auth::guard('teacher')->User()->school_code }}";
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $.ajax({
        type:'post',
        url:"{{ url('school/sendSchoolCode') }}",
        data:{code:code},
        success:function(res){
           $.each(res, function(i,e){
                $('#students').append(`
                    <tr>
                    <td class="text-left">`+e.name+`</td> 
                    <td class="text-left">`+e.roll_no+`</td>
                    <td class="text-left">eupheus</td> 
                    <td class="text-left">`+e.class+`</td>    
                   
                    <td class="text-left">`+e.email+`</td> 
                    <td class="text-left">`+e.phone+`</td> 
                   
                    </tr>
                `);
           });
        }

    })
     $(function () {
    
   
    
  });
</script>
@endsection