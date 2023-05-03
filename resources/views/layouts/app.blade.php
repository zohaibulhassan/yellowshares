<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    
    <script src="{{ asset('admin/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/jquery-validation/additional-methods.min.js') }}"></script>
     <!-- ChartJS -->
 <script src="{{ asset('admin/plugins/chart.js/Chart.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script> 
    <script type="text/javascript" src="{{ asset('admin/plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>

<!-- SweetAlert2 -->
<script src="{{ asset('admin/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- Parslry js -->
<script src="{{ asset('admin/plugins/parsley/parsley.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
{{-- <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
--}}
    {{-- <link rel="icon" href="{{ asset('images/logo-32x32.png') }}" /> --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">
 
    <link rel="stylesheet" href="{{ asset('admin/plugins/bs-stepper/css/bs-stepper.min.css') }}">
    <!-- Parsley css -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/parsley/parsley.css')}}">
    

    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

    {{-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> --}}

    
      <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
  
<script type="text/javascript">
    document.addEventListener("keyup", function (e) {
    var keyCode = e.keyCode ? e.keyCode : e.which;
            if (keyCode == 44) {
                stopPrntScr();
            }
        });
function stopPrntScr() {

            var inpFld = document.createElement("input");
            inpFld.setAttribute("value", ".");
            inpFld.setAttribute("width", "0");
            inpFld.style.height = "0px";
            inpFld.style.width = "0px";
            inpFld.style.border = "0px";
            document.body.appendChild(inpFld);
            inpFld.select();
            document.execCommand("copy");
            inpFld.remove(inpFld);
        }
       function AccessClipboardData() {
            try {
                window.clipboardData.setData('text', "Access   Restricted");
            } catch (err) {
            }
        }
        setInterval("AccessClipboardData()", 300);
    </script>
    <!-- Google Autocomplete -->
<script>
    function initAutocomplete() {
      var input = document.getElementById('autocomplete-input');
      var autocomplete = new google.maps.places.Autocomplete(input);
  
      autocomplete.addListener('place_changed', function() {
        var place = autocomplete.getPlace();
        if (!place.geometry) {
          window.alert("No details available for input: '" + place.name + "'");
          return;
        }
      });
  }
  </script>
</head>
<body>
    
	
	
    <!-- Header -->
		@include('layouts.header')
	<!-- Header end -->
	 
    <!-- Content section -->
        @yield('content')
	<!-- Content section end-->	 

    {{-- @include('layouts.blog-section') 
    @include('layouts.flipbanner') --}}


    <!-- Footer -->
		@include('layouts.footer')
	<!-- Footer end-->
	

</body>


<script type="text/javascript" src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>




<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>


{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script> --}}
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>


<script>
$(function(){   
  $(".select2").select2()    
  $(".select2bs4").select2({
    theme: "bootstrap4"
  });	
});
</script>


</html>
