
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title')</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="back/css/themify-icons.css">
  <link rel="stylesheet" href="back/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="back/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="back/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="back/images/logo_2H_tech.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->


   {{--start content navbar1--}}
        @include('includes.navbar1')
   {{--end content navbar2--}}
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->

      {{--start content navbar2--}}
          @include('includes.navbar2')
      {{--start content navbar2--}}


      <!-- partial -->




              {{--start content dashbord--}}
              <div class="main-panel">
                <div class="content-wrapper">
                    @yield('admin')
                   
               </div>
                {{--start footeradmin --}}
                  @include('includes.footeradmin')
                {{--start footeradmin --}}

             </div>
               {{--end content dashbord--}}

        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a href="https://www.urbanui.com/" target="_blank">Urbanui</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="back/js/vendor.bundle.base.js"></script>
  <script src="back/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="back/js/off-canvas.js"></script>
  <script src="back/js/hoverable-collapse.js"></script>
  <script src="back/js/template.js"></script>
  <script src="back/js/settings.js"></script>
  <script src="back/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->


        {{--SCRIPT DASHBORD--}}
        
              @yield('script')
              

  <!-- End custom js for this page-->
</body>

</html>

