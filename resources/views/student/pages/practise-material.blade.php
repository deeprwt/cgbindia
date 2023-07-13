@extends('student.layout.template')
@section('head')
    <title>Study Booklet</title>
@endsection
@section('main')
<div class="mdc-card">
    <h4 class="card-title">Study Booklet</h4>
    
   <section class="py-4">
       <div class="row p-3">
           @foreach ($book as $item)
               <div class="col-md-6 col-lg-4 col-xl-3 my-2 p-1">
                   <div class="card border-0  p-0  my-4" style="width: 250px;height:250px">
                    <a href="{{ url($item['book']) }}" class="nav-link text-dark">
                    <div class="text-center" >
                        <img src="{{ url('assets/images/dashboard/'.$item['cover']) }}" class="w-100 h-100" alt="">
                    </div>
                       <div class="card-body ">
                           <h5 class="card-title">{{ $item['subject'] }}</h5>
                           </a>
                       </div>
                   </div>
               </div>
           @endforeach
       </div>
   </section>
</div>

@endsection
