 <!-- SCRIPTS -->
  <!-- Global Required Scripts Start -->
  <script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{asset('assets/js/popper.min.js')}}"></script>
  <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/js/perfect-scrollbar.js')}}">
  </script>
  <script src="{{asset('assets/js/jquery-ui.min.js')}}">
  </script>
  <!-- Global Required Scripts End -->
  <!-- Page Specific Scripts Start -->

  <script src="{{asset('assets/js/Chart.bundle.min.js')}}">
  </script>
  <script src="{{asset('assets/js/widgets.js')}}"> </script>
  <script src="{{asset('assets/js/clients.js')}}"> </script>
  <script src="{{asset('assets/js/Chart.Financial.js')}}"> </script>
  <script src="{{asset('assets/js/d3.v3.min.js')}}">
  </script>
  <script src="{{asset('assets/js/topojson.v1.min.js')}}">
  </script>
  <script src="{{asset('assets/js/datatables.min.js')}}">
  </script>
  <script src="{{asset('assets/js/data-tables.js')}}">
  </script>
  <!-- Page Specific Scripts Finish -->
  <!-- Costic core JavaScript -->
  <script src="{{asset('assets/js/framework.js')}}"></script>
  <!-- Settings -->
  <script src="{{asset('assets/js/settings.js')}}"></script>
  <script>
    var loadFile = function(event) {
      var image = document.getElementById('output');
      image.src = URL.createObjectURL(event.target.files[0]);
    };
    
    </script>

<script>
  $('#checkvalid').on('change', function(){
   this.value = this.checked ? 1 : 0;
   // alert(this.value);
}).change();
</script>
</body>


<!-- Mirrored from slidesigma.com/themes/html/costic/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 01 Feb 2020 13:05:48 GMT -->
</html>
