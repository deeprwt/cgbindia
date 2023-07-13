@extends('student.layout.template')
@section('head')
    <title>Live Test</title>
@endsection
@section('main')
<div class="mdc-card mb-4">
    <h4 class="card-title">Live Test</h4>
    
   <section class="py-4">
       <div class="row p-3">
           @if(isset($book))
           @foreach ($book as $item)
           
                  
           <div class="col-md-6 col-lg-6 col-xl-3 my-2 p-1 my-3 text-center">
               <div class="card my-3" >
                    <div class="card-img">
                        <img src="{{ url('assets/images/dashboard/'.$item['cover']) }}" class="w-100">
                    </div>
                    <div class="card-body py-2">
                       <div class="row">
                           <div class="col-md-12 col-lg-8 col-xl-8 pt-2">
                            <h3 class="card-title text-left">
                                {{ $item['subject'] }}
                            </h3>
                           </div>
                           <div class="col-md-12 col-lg-4 col-xl-4 p-2">
                                @if ($item['show'] == 0)
                                <form action="{{ url('student/checkuserdata') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="user" value="{{ Auth::guard('student')->User()->roll_no }}">
                                    <input type="hidden" name="subject" value="{{ $item['subject'] }}">
                                    <button type="submit" class="btn btn-info btn-sm">view Test</button>
                                </form>
                                @else
                                <form action="{{ url('student/checkuserdata') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="user" value="{{ Auth::guard('student')->User()->roll_no }}">
                                    <input type="hidden" name="subject" value="{{ $item['subject'] }}">
                                    <input type="hidden" name="class" value="{{ Auth::guard('student')->User()->class }}">
                                    <button type="submit" class="btn btn-sm btn-success">Continue Exam</button>
                                </form>
                                @endif
                           </div>
                       </div>
                    </div>
               </div>
           </div>
      
           
@endforeach
           @else
           <div class="jumbotron">
            <h1>You have  submitted your  exam </h1>
          </div>
           @endif
          
       </div>
   </section>
</div>


@endsection

