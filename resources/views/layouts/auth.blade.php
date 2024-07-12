<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="images\logoatas.png">
    <title>{{ $title }} | SPK Pemilihan Bantuan UMKM</title>

    <!-- Bootstrap core CSS -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.2.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->

    {{-- Assets Login --}}
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/assetsLogin/fonts/icomoon/style.css">

    <link rel="stylesheet" href="/assetsLogin/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assetsLogin/css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="/assetsLogin/css/new.css">

<!-- Custom styles for this template -->
  </head>
  <body class="text-center">
    @yield('content')
  </body>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  {{-- JS Assets Login --}}
  <script src="/assetsLogin/js/jquery-3.3.1.min.js"></script>
  <script src="/assetsLogin/js/popper.min.js"></script>
  <script src="/assetsLogin/js/bootstrap.min.js"></script>
  <script src="/assetsLogin/js/main.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.2.3/js/bootstrap.bundle.min.js"></script>

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
</html>
