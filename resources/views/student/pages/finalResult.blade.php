@extends('student.layout.template')
@section('head')
    <title>Result  </title>
@endsection
@section('main')
<div class="container">
    <div class="mdc-card">
        <div class="row px-3">
            <div class="col-12">
             <h4 class="card-title">Result</h4>
            </div>
            <div class="col-12 my-4">
                <form action="{{ url('student/showresult') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <select name="subject" id="" class="form-control" required>
                                <option value="">Select Subject</option>
                                @foreach ($subject as $item)
                                <option value="{{ $item->subject }}">{{ $item->subject }}</option>
                                @endforeach
        
                            </select>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center ">
                                <button type="submit" class="btn btn-primary px-4">Submit</button>
                            </div>
                        </div>
                        <input type="hidden" name="user" value="{{ Auth::guard('student')->User()->roll_no }}">
                        <input type="hidden" name="class" value="{{ Auth::guard('student')->User()->class }}">
                    </div>
                   
                   
                </form>
            </div>
        </div>
     </div>
</div>


@endsection
