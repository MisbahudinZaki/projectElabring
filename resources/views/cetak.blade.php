<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak</title>
    <script src="https://api.opencagedata.com/geocode/v1/json?q=LATITUDE+LONGITUDE&key=YOUR_API_KEY"></script>
    <script src="https://maps.googleapis.com/maps/api/geocode/json?latlng=LATITUDE,LONGITUDE&key=YOUR_API_KEY"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="css/mystyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>

    <div class="container mt-5 main-content" id="main-content">

        @include('sweetalert::alert')
        @yield('isi')
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <!-- Include custom script -->
  <script src="{{ asset('js/jam.js') }}"></script>

  <script src="{{ asset('js/sidebar.js') }}"></script>

  <script src="{{ asset('js/date.js') }}"></script>

  <script src="{{ asset('js/location.js') }}"></script>

  <script src="{{ asset('js/exit.js') }}"></script>

  <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
 <script src="js/myscript.js"></script>
 <script src="bootstrap/js/bootstrap.min.js"></script>

<script>
    function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('main-content');
    sidebar.classList.toggle('open');
    mainContent.classList.toggle('open');
}

</script>

</body>
</html>
