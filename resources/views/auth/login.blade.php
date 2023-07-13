<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="{{ url('auth/css/style.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/typicons/2.0.9/typicons.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
<title>Title</title>
<style>
  .alert{
    position: relative;
   display: inline-block;
    width: 350px;
    z-index: 11;
    
    overflow: auto;
  }
</style>
</head>
<body id="particles-js">
<div class="animated bounceInDown">
  @include('flash_message.flash_message')
  <div class="container">
    <span class="error animated tada" id="msg"></span>
    <form name="form1" class="box" action="{{ route('admin.login') }}" method="post">
      @csrf
        <img src="{{ url('logo/logo.png') }}" width="150px" class="py-3" alt="">
        <input type="text" name="email" placeholder="Email" autocomplete="off">
      
        <input type="password" name="password" placeholder="Passsword" id="pwd" autocomplete="off">
        <label>
          <input type="checkbox" name="remember_me">
          <span></span>
          <small class="rmb">Remember me</small>
        </label>
        <a href="#" class="forgetpass">Forget Password?</a>
        <input type="submit" value="Sign in" class="btn1">
      </form>
      
  </div> 
      
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
<script src="https://cldup.com/S6Ptkwu_qA.js"></script>
<script src="{{ url('auth/js/main.js') }}"></script>
</body>
</html>