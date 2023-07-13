@extends('admin.layout.template')
@section('main')
<div class="row">
    
    <div class="col-12 col-lg-12 col-xl-12">
        <div class="card radius-15">
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <input type="text" class="form-control" id="schoolCheckInput" placeholder="enter school code.." >
                    </div>
                    <div class="col-4"><button type="button" id="schoolCheck" class="btn btn-warning px-4">Check</button></div>
                </div>
                <div class="my-3">
                    <div id="ajax"></div>
                </div>
            </div>
            
    </div>
</div>
<!--end row-->
@endsection
@section('js')

<script>
   
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
   $('#schoolCheck').click(function(){
       var code = $('#schoolCheckInput').val();
       $.ajax({
           type:'POST',
           url:"{{ url('api/admin/checkSchool') }}",
           data:{code:code},
            success:function(res){
                
              $.each(res,function(i,e){
               if(i == 'error1'){
                Swal.fire({
                title: 'Error!',
                text: e,
                icon: 'error',
                confirmButtonText: 'X'
                })
               }
               if(i == 'error2'){
                Swal.fire({
                title: 'Error!',
                text: 'No School Found',
                icon: 'error',
                confirmButtonText: 'X'
                })
               }
               else{
                $('#ajax').html(
                    `
                <div class="card radius-15" style="width:500px">
                <div class="card-body">
                    <h5 class="card-title">`+e.school_name+`</h5>
                    <h6 class="card-subtitle mb-2">school Code : `+e.school_code+`</h6>
                    <h6 class="card-subtitle mb-2">school City : `+e.city_name+`</h6>
                    <h6 class="card-subtitle mb-2">school CRM ID : `+e.crm_id+`</h6>
                </div>
            </div>
                `
                );
               }
              });
            }
       })
   })
</script>
@endsection