<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <script async src=https://www.googletagmanager.com/gtag/js?id=G-CCKF5YW09C></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
  
    gtag('config', 'G-CCKF5YW09C');
  </script>
  
  <style>
    *{
      zoom: 1.01 !important;
    -moz-transform: scale(2);
    -moz-transform-origin: 0 0;
    }
    .fullSCreen{
      position: absolute !important;
        top: 0 !important;
        right: 0 !important;
        bottom: 0 !important;
        left: 0 !important;
        z-index: 999999  !important;
        height: auto !important;
        max-height: 100% !important;
        background-attachment: fixed !important;
        background-size: cover !important;
        background-color: white !important;
        overflow: scroll !important;
    }


  </style>
 <meta http-equiv='cache-control' content='no-cache'>
 <meta http-equiv='expires' content='0'>
 <meta http-equiv='pragma' content='no-cache'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
  
  <!-- plugins:css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="{{ url('assets/vendors/css/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ url('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
  <link rel="stylesheet" href="{{ url('assets/vendors/jvectormap/jquery-jvectormap.css') }}">
  <!-- End plugin css for this page -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="{{ url('assets/css/demo/style.css') }}">
  <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
  <link rel="icon" href="https://www.eupheus.in/wp-content/uploads/2019/09/cropped-FINAL-LOGO-01-32x32.png" sizes="32x32" />
  <link rel="icon" href="https://www.eupheus.in/wp-content/uploads/2019/09/cropped-FINAL-LOGO-01-192x192.png" sizes="192x192" />
  <link rel="apple-touch-icon" href="https://www.eupheus.in/wp-content/uploads/2019/09/cropped-FINAL-LOGO-01-180x180.png" />
  <meta name="msapplication-TileImage" content="https://www.eupheus.in/wp-content/uploads/2019/09/cropped-FINAL-LOGO-01-270x270.png" />
  {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"> --}}
  @yield('head')
</head>
<body>
<script src="{{ url('assets/js/preloader.js') }}"></script>
  <div class="body-wrapper">
    <!-- partial:partials/_sidebar.html -->
   @include('student.layout.nav.side')
    <!-- partial -->
    <div class="main-wrapper mdc-drawer-app-content">
      <!-- partial:partials/_navbar.html -->
   @include('student.layout.nav.top')
   <div class="page-wrapper mdc-toolbar-fixed-adjust">
     @include('flash_message.flash_message')
    <main class="content-wrapper">
     
        
      <!-- partial -->
      @yield('main')
    
    
</main>
<!-- partial:partials/_footer.html -->

</div>
      <footer>
        <div class="mdc-layout-grid">
          <div class="mdc-layout-grid__inner">
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
             
            </div>
           
          </div>
        </div>
      </footer>
      <!-- partial -->
    </div>
  </div>
  <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop d-flex justify-content-end">
    <span class="text-center text-sm-left d-block d-sm-inline-block tx-14">© Copyright 2021 Eupheus Learning | All Rights Reserved.</span>
  </div>
  <!-- plugins:js -->
  <script src="{{ url('assets/vendors/js/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="{{ url('assets/vendors/chartjs/Chart.min.js') }}"></script>
  <script src="{{ url('assets/vendors/jvectormap/jquery-jvectormap.min.js') }}"></script>
  <script src="{{ url('assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
  {{-- <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script> --}}
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{ url('assets/js/material.js') }}"></script>
  <script src="{{ url('assets/js/misc.js') }}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ url('assets/js/dashboard.js') }}"></script>
  <!-- End custom js for this page-->
  @yield('js')
</body>
</html> 
