
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Account Deactivated | phone number duplicate</title>

       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

	<link type="text/css" rel="stylesheet" href="{{ url('css/ban.css') }}" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	
</head>

<body>
	@isset($error)
	<div class="mb-3">
		<div class="alert text-left alert-danger alert-block w-100 ">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<strong>{{ $error }}</strong>
		</div>
	</div>
	@endisset
	@isset($error1)
	<div class="mb-3">
		<div class="alert text-left alert-danger alert-block w-100 ">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<strong>{{ $error1 }}</strong>
		</div>
	</div>
	@endisset
	@isset($error0)
	<div class="mb-3">
		<div class="alert text-left alert-danger alert-block w-100 ">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<strong>{{ $error0 }}</strong>
		</div>
	</div>
	@endisset
	<div id="notfound">
		<div class="notfound">
			<div class="notfound-404 mb-4">
				<h1 style="font-size:3rem">ACCOUNT Deactivatd</h1>
			</div>
			<h2><i> Oops!, your account has been temporary Deactivatd due to  <span style="color:red;text-decoration:underline">duplicate phone number</span></h2>
            <div>
			<div class="my-3">
				<h4 class="text-dark">Your existing phone number is : <span class="text-danger">{{ Auth::guard('student')->User()->phone }}</span></h4>
			</div>
			<div class="my-3">
				{{-- <p>enter other number</p> --}}
				<form class="notfound-search" action="{{ url('student/updatingPhone') }}" method="POST">
					@csrf
					
					<input type="hidden" name="id" value="{{ Auth::guard('student')->User()->roll_no }}">
					<input type="tel" required name="phone" pattern="[0-9]{10}" placeholder="enter other number ">
					<button type="submit">Update</button>
				</form>
			</div>
            <h4 class="mt-5">For any query please contact us </h4>
          </span>&nbsp;&nbsp;&nbsp;
                    	<i class="fa fa-phone text-white"></i>&nbsp;        <a href="tel:01141198254" style="color: black;">Call: 01141198254 for Tech Support </a> &nbsp;&nbsp;
<br><br>
 <i class="fa fa-envelope text-black"></i>&nbsp; 
						   <a href="mailto:isfosupport@eupheus.in" style="color: black; ">isfosupport@eupheus.in</a> &nbsp;&nbsp;
            </div>
            <br><br><br>
			<a href="{{ url('/') }}"><span class="arrow"></span>Return To home</a>
		</div>
	</div>

</body>

</html>
