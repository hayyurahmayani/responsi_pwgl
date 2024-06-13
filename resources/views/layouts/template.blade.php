<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Leaflet CSS-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!--FontAwesome CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <title>{{ $title }}</title>
    <style>
    .modal-header {
      background-color: #FFD0D0; /* Ubah warna latar belakang sesuai keinginan Anda */
      color: white; /* Ubah warna teks jika perlu agar terlihat lebih baik */
    }
  </style>
    @yield('styles')
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="{{ asset('storage/disiar.png') }}" alt="Dashboard Logo" width="150" height="70" ></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('index') }}"><i class="fa-solid fa-map"></i> Map</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-table"></i>
            Table
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('table-point') }}">Disasters Table</a>
            <li><a class="dropdown-item" href="{{ route('table-polyline') }}">Faults Table</a>
            <li><a class="dropdown-item" href="{{ route('table-polygon') }}">Megathrusts Table</a>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#infoModal"><i class="fa-solid fa-circle-info"></i> Info</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('dashboard') }}"><i class="fa-solid fa-table-columns"></i> Dashboard</a>
        </li>

        @if (Auth::check())
        <form method="POST" action="{{ route('logout') }}">
        @csrf
        <li class="nav-item">
          <button class="nav-link text-danger" type="submit"><i class="fa-solid fa-right-from-bracket"></i> Logout</button>
        </li>
        </form>
        @else

        <li class="nav-item">
          <a class="nav-link text-primary" href="{{ route('login') }}"><i class="fa-solid fa-right-to-bracket"></i> Login</a>
        </li>

        @endif
      </ul>
    </div>
  </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="fa-solid fa-circle-info"></i> Info</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Nama: Hayyu Rahmayani Puspitasari</p>
        <p>NIM: 22/497739/SV/21157</p>
        <p>Kelas: PG Web: Lanjut A</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

    @yield('content')
    <!--Leaflet JS-->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <!--Bootstrap JS-->
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!--JQuery JS-->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    @include('components.toast')
    
    @yield('script')

</body>
</html>