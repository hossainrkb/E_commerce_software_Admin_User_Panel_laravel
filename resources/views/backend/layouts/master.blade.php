<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>rkb ECON</title>

  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('css/admin_style.css')}}">
  <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}">
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>
  <script>
  $(document).ready( function () {
    $('#data-table').DataTable();
} );
  </script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('backend.partials.nav')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
        @include('backend.partials.left_sidebar')
      <!-- partial -->

      @yield('content')

      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->


  <script src="{{asset('js/bootstrap.min.js')}}"></script>

  <!-- endinject -->
  <!-- Plugin js for this page-->

  <!-- Custom js for this page-->
  <script src="{{asset ('js/dashboard.js')}}"></script>

  <!-- End custom js for this page-->

</body>

</html>
