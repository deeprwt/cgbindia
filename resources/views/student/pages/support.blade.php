@extends('student.layout.template')
@section('head')
    <title>Support </title>
@endsection
@section('main')

<div class="mdc-card">
    <h4 class="card-title">Support</h4>
    <div class="p-3">
        <form action="{{ url('student/support-store') }}" method="post">
        @csrf
    
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                  <label for="">Select Subject<sup class="text-danger">*</sup></label>
                    <select class="form-control" id="" name="subject" required >
                        <option value="">Select Subject</option>
                        <option value="Mathematics">Mathematics</option>
                        <option value="Science">Science</option>
                        <option value="English">English</option>
                        <option value="GK">GK</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Select Support type<sup class="text-danger">*</sup></label>
                      <select class="form-control" id="" name="type"  required>
                          <option value="" >Support type</option>
                          <option value="Re-test">Re-test</option>
                          <option value="Other">Other</option>
                      </select>
                  </div>
            </div>
            <div class="col-md-5">
                <label for="">Description<sup class="text-danger">*</sup></label>
                <textarea name="descritption" required placeholder="Feedback/Reason" class="form-control" id="" cols="30" rows="1"></textarea>
            </div>
        </div>

        <div class="text-right">
            <button class="btn btn-success" type="submit">Submit</button>
        </div>
    </form>
    </div>
</div>

@endsection
@section('js')
<script>
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
@endsection