
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title')</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('back/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('back/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('back/css/vendor.bundle.addons.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('back/css/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('back/images/logo_2H_tech.png')}}" />
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
       
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{asset('back/js/vendor.bundle.base.js')}}"></script>
  <script src="{{asset('back/js/vendor.bundle.addons.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{asset('back/js/off-canvas.js')}}"></script>
  <script src="{{asset('back/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('back/js/template.js')}}"></script>
  <script src="{{asset('back/js/settings.js')}}"></script>
  <script src="{{asset('back/js/todolist.js')}}"></script>
  <script src="{{asset('back/js/bootbox.min.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->


        {{--SCRIPT DASHBORD--}}
        
              @yield('script')
              

  <!-- End custom js for this page-->
    <script>
      $(document).on("click", "#delete", function(e){
        e.preventDefault();
        var link = $(this).attr("href");
        bootbox.confirm("Voulez-vous vraiment supprimer?", function(confirmed){
          if(confirmed){
            window.location.href = link;
          };
        });
      });
    </script>

</body>

</html>

