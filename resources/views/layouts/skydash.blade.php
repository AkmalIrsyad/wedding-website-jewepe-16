<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('skydash/dist/assets/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('skydash/dist/assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('skydash/dist/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('skydash/dist/assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('skydash/dist/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <!-- endinject -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <!-- Plugin css for this page -->
    <!-- <link rel="stylesheet" href="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css"> -->
    <link rel="stylesheet" href="{{ asset('skydash/dist/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('skydash/dist/assets/js/select.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('skydash/dist/assets/css/style.css') }}">
    <!-- End plugin css for this page -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css" rel="stylesheet">
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('/skydash/dist/assets/css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('/skydash/dist/assets/images/favicon.png') }}" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <x-navbaradm/>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
      <x-sidebaradm/>
        <!-- partial -->
        @yield('contentadm')
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
            <x-footeradm/>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('skydash/dist/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('skydash/dist/assets/vendors/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('skydash/dist/assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <!-- <script src="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script> -->
   <script src="{{ asset('skydash/dist/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>
   <script src="{{ asset('skydash/dist/assets/js/dataTables.select.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('skydash/dist/assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('skydash/dist/assets/js/template.js') }}"></script>
<script src="{{ asset('skydash/dist/assets/js/settings.js') }}"></script>
<script src="{{ asset('skydash/dist/assets/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
<script src="{{ asset('skydash/dist/assets/js/jquery.cookie.js') }}"></script>
<script src="{{ asset('skydash/dist/assets/js/dashboard.js') }}"></script>
    <!-- <script src="assets/js/Chart.roundedBarCharts.js"></script> -->

    <!-- DataTables JS -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <!-- End custom js for this page-->
@stack('scripts')
  </body>
</html>
