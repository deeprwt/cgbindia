<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
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
  <!-- End layout styles -->
  <link rel="shortcut icon" href="{{ url('assets/images/favicon.png') }}"/>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  @yield('head')
</head>
<body>
<script src="{{ url('assets/js/preloader.js') }}"></script>
  <div class="body-wrapper">
    <!-- partial:partials/_sidebar.html -->
   @include('teacher.layout.nav.side')
    <!-- partial -->
    <div class="main-wrapper mdc-drawer-app-content">
      <!-- partial:partials/_navbar.html -->
   @include('teacher.layout.nav.top')
   <div class="page-wrapper mdc-toolbar-fixed-adjust">
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
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop d-flex justify-content-end">
              <span class="text-center text-sm-left d-block d-sm-inline-block tx-14">© Copyright 2021 Eupheus Learning | All Rights Reserved.</span>
            </div>
          </div>
        </div>
      </footer>
      <!-- partial -->
    </div>
  </div>

  <!-- plugins:js -->
  <script src="{{ url('assets/vendors/js/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="{{ url('assets/vendors/chartjs/Chart.min.js') }}"></script>
  <script src="{{ url('assets/vendors/jvectormap/jquery-jvectormap.min.js') }}"></script>
  <script src="{{ url('assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
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