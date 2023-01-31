<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/sweetalert2/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/sweetalert2/sweetalert2.min.css') }}">
    <title>E-SPP Dashboard | {{ $title }}</title>
</head>

<body>
    <div class="layer"></div>
    <!-- ! Body -->
    <div class="page-flex">
        <!-- ! Sidebar -->
        @include('sweetalert::alert')
        @include('partials.sidebar')
        <div class="main-wrapper">
            <!-- ! Main nav -->
            @include('partials.navbar')
            <!-- ! Main -->
            <main class="main users chart-page" id="skip-target">
                @yield('content')
            </main>
            <!-- ! Footer -->
            @include('partials.footer')
        </div>
    </div>

  <!-- Chart library -->
  <script src="{{ asset('assets/plugins/chart.min.js') }}"></script>
  <!-- Icons library -->
  <script src="{{ asset('assets/plugins/feather.min.js') }}"></script>
  <!-- Custom scripts -->
  <script src="{{ asset('assets/js/script.js') }}"></script>
  <script src="{{ asset('assets/sweetalert2/sweetalert2.min.js') }}"></script>
  <script src="{{ asset('assets/js/jquery-3.6.3.slim.js') }}" integrity="sha256-DKU1CmJ8kBuEwumaLuh9Tl/6ZB6jzGOBV/5YpNE2BWc=" crossorigin="anonymous"></script>

</body>

<script>
     const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    function confirmDelete(e, elem) {
        e.preventDefault();
        swalWithBootstrapButtons.fire({
            title: 'Apakah Anda Yakin?',
            text: "Data Ini Tidak Dapat Di Kembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Hapus!',
            cancelButtonText: 'Batalkan!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                elem.closest('form').submit();
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire(
                    'Di Batalkan!',
                    'Data Anda Aman !',
                    'error'
                )
            }
        })
    }
</script>
</html>
