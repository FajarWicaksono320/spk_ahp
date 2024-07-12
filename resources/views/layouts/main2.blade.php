<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="images\logoatas.png">
    <title>{{ $title }} | SPK Pemilihan Bantuan UMKM</title>

    <!-- Bootstrap core CSS -->
    @include('partials.includes.style')
  </head>
  <body>

	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		<div class="sidebar sidebar-light sidebar-main sidebar-expand-lg">

			@include('partials.sidebar2')
		</div>
		<!-- /main sidebar -->

		<!-- Main content -->
		<div class="content-wrapper bgBaru">

		    @include('partials.topbar2')
            @yield('content')
      <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <!-- jQuery -->
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- DataTables JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
		</div>
	</div>
  <!-- /main content -->
	<!-- /page content -->


        <!-- Script -->
    @stack('prepend-script')
    @include('partials.includes.script')
    @stack('addon-script')

    <script src="/assets/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/assets/js/script.js"></script>
    <script src="/assets/js/dashboard.js"></script>
    

    {{-- alert from session --}}
    @if (session()->has('success'))
      <script>
        Swal.fire({
          icon: 'success',
          title: 'Success',
          text: "{{ session('success') }}",
        });
      </script>
    @endif
    @if (session()->has('failed'))
      <script>
        Swal.fire({
          icon: 'error',
          title: 'Failed',
          text: "{{ session('failed') }}",
        });
      </script>
    @endif
    @if (isset($errors) && $errors->has('oldPassword') || $errors->has('password'))
      <script>
        const myModal = document.getElementById('modalUbahPassword');
        const modal = bootstrap.Modal.getOrCreateInstance(myModal);
        modal.show();
      </script>
    @endif
  </body>
</html>
