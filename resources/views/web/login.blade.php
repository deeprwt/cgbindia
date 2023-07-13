@extends('web.layout.template')
@section('main')

<div class="section blog-standard-section py-5 ">
    <div class="container">
    <div class="row">
        <!-- <div class="col-md-4">
            <div class="card my-2 text-left">
              <div class="card-body">
                <h4 class="card-title">Exam Instructions</h4>
                <p class="card-text">
                    <a href="{{ url('exam/instruction.pdf') }}" class="nav-link">click to view instructions <i class="fa fa-angle-double-right"></i></a>
                </p>
              </div>
            </div>
            <div class="card my-2 text-left">
                <div class="card-body">
                  <h4 class="card-title">Exam Process</h4>
                  <p class="card-text">
                      <a href="{{ url('exam/login-process.pdf') }}" class="nav-link">click to view process <i class="fa fa-angle-double-right"></i></a>
                  </p>
                </div>
              </div>
        </div> -->
        
        <div class="col-md-4"></div>
        <div class="col-md-4 text-center">
            <div class="card ">
                <img class="card-img-top" src="{{ url('web/assets/images/stu.jpg') }}" alt="">
                <div class="card-body">
                    <a href="{{ url('studentLogin') }}"><button class="btn btn-danger mx-2"> Login </button></a>
                     <a href="{{ url('studnet-registration') }}"><button class="btn btn-danger mx-2"> Registration </button></a> 
                </div>
            </div>
           
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
</div>

@endsection