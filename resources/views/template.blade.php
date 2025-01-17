<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proto Elabring</title>
    <script src="https://api.opencagedata.com/geocode/v1/json?q=LATITUDE+LONGITUDE&key=YOUR_API_KEY"></script>
    <script src="https://maps.googleapis.com/maps/api/geocode/json?latlng=LATITUDE,LONGITUDE&key=YOUR_API_KEY"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="css/mystyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.sidebar {
    height: 100%;
    width: 250px;
    position: fixed;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
    transform: translateX(-100%);
}

.sidebar ul {
    list-style-type: none;
    padding: 0;
}

.sidebar ul li {
    padding: 8px 8px 8px 32px;
    text-align: left;
}

.sidebar ul li a {
    color: white;
    text-decoration: none;
    display: block;
}

.sidebar ul li a:hover {
    background-color: #575757;
}

.sidebar .close-btn {
    position: absolute;
    top: 10px;
    right: 25px;
    font-size: 36px;
    background: none;
    color: white;
    border: none;
    cursor: pointer;
}

.main-content {
    margin-left: 0;
    padding: 16px;
    transition: margin-left 0.5s;
}

.open-btn {
    font-size: 30px;
    cursor: pointer;
    background-color: #111;
    color: white;
    border: none;
    padding: 1px 2px;
    position: left;
}

.sidebar.open {
    transform: translateX(0);
}

.main-content.open {
    margin-left: 250px;
}

.list-menu{
    font-size: 22px;
    text-decoration: none;
    color: white;
    text-align: left;
}

    </style>
</head>
<body>
    <nav class="navbar bg-body-tertiary">

        <div class="container-fluid">
            <button class="open-btn" onclick="toggleSidebar()">☰</button>
          <a class="navbar-brand">Elektronik Absensi Daring</a>

          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </nav>

      <div class="sidebar" id="sidebar">
        <button class="close-btn" onclick="toggleSidebar()">×</button>

        <div class=" container" style="align-items: center;">
            <img src="gambar/Logo baznas.jpg" alt="Logo Baznas" height="200px" width="200px" style="align-content: center;">
        </div>
        <div class="container">
            <ul>
                <li></li>
            </ul>
        </div>
        <div class=" container list-menu">
           <ul>
            <li> <a href="{{ route('home') }}"><i class="fas fa-tachometer-alt"></i>  Home</a></li>
            <li></li>
            <li> <a href="{{ route('absen.index') }}"><i class="fas fa-border-all"></i> Absen</a></li>
            <li></li>
            <li> <a href="{{ route('user.index') }}"><i class="fas fa-user"></i> User</a></li>
            <li></li>
            <li> <a href="{{ route('cetak-pegawai-form') }}"><i class="fas fa-regular fa-print"></i> Cetak</a></li>
            <li></li>
            <li> <a href="{{ route('logout') }}"><i class="fas fa-power-off"> Logout</i></a></li>

           </ul>
        </div>

    </div>



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
