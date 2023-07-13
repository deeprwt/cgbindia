
    @if ($message = Session::get('error'))
    <div class="text-right m-1 ">
        <div class="alert text-left alert-danger alert-block ">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    </div>
    @endif
    
    @if ($message = Session::get('warning'))
    <div class="text-right m-1 ">
    <div class="alert text-left alert-warning alert-block ">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    </div>
    @endif
    
    @if ($message = Session::get('info'))
    <div class="text-right m-1 ">
    <div class="alert text-left alert-info alert-block ">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    </div>
    @endif
    
    @if ($message = Session::get('DelSuccess'))
    <div class="text-right m-1 ">
    <div class="alert text-left alert-info alert-block ">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    </div>
    @endif
    @if ($message = Session::get('success'))
    <div class="text-right m-1 ">
    <div class="alert text-left alert-info alert-block ">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    </div>
    @endif
    @isset($success)
    @if ($message = $success)
    <div class="alert text-left alert-info alert-block ">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif  
    @endisset
    @isset($error)
    @if ($message = $error)
    <div class="text-right m-1 ">
    <div class="alert text-left alert-danger alert-block ">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    </div>
    @endif  
    @endisset
    
    @if ($message = Session::get('DelError'))
    <div class="text-right m-1 ">
    <div class="alert text-left alert-info alert-block ">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    </div>
    @endif
    
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    
    <div class="text-right m-1 ">
    <div class="alert text-left alert-danger " style="display:inline-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ $error }}
    </div>
    </div>
      @endforeach
    
    @endif
   
    {{-- @if($errors->has())
    @foreach ($errors->all() as $error)
    <p class="yellow-text font lato-normal center">{{ $error }}</p>
    @endforeach
    @endif --}}
