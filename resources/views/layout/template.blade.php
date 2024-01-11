<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Informasi Pegawai - @yield('title', 'Website')</title>
    <link href="/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
        <div class="container">
          <a class="navbar-brand" href="/">Sistem Informasi Pegawai</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Berita</a>
              </li>
              @auth
              <li class="nav-item">
                <a class="nav-link" href="/employees/data">Data Master</a>
              </li>
              @endauth
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <form action="/" class="d-flex" role="search">
                <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light" type="submit">Search</button>
              </form>
              @auth
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  {{ auth()->user()->name }}
                </a>
                <ul class="dropdown-menu">
                  <form action="/logout" method="post">
                    @csrf
                  <li>
                    <button type="submit" class="dropdown-item">Logout</button>
                  </li>
                  </form>

                </ul>
              </li>
              @else
              <li class="nav-item">
                <a class="nav-link" href="/login"><i class="bi bi-person-lock"></i> Login</a>
              </li>
              @endauth
            </ul>
          </div>
        </div>
      </nav>
      <marquee behavior="scroll" direction="left" style="color: white; font-size: 18px; padding: 10px; background-color: black;">
        Data rahasia dan sangat penting milik perusahaan - Data rahasia dan sangat penting milik perusahaan - Data rahasia dan sangat penting milik perusahaan
    </marquee>

      <div class="container my-2">
        @yield('content')
      </div>

      <div class="row bg-dark m-0 py-2 text-white">
        <div class="col-lg-4">

            <span class="d-block">Contact Person</span>
            <span class="d-block"><i class="bi bi-phone"></i> 082183854660</span>
            <span class="d-block"><i class="bi bi-envelope"></i> rizki211215@gmail.com</span>
        </div>

        <div class="col-lg-4">
            <span class="d-block">Media Sosial</span>
            <span class="d-block"><i class="bi bi-facebook"></i> Fb </span>
            <span class="d-block"><i class="bi bi-instagram"></i> IG </span>
            <span class="d-block"><i class="bi bi-twitter"></i> Twitter</span>
            <span class="d-block"><i class="bi bi-whatsapp"></i> whatsapp</span>
        </div>

        <div class="col-lg-4">
            <span class="d-block">Map</span>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127669.66532226301!2d101.47396681098633!3d0.48217111760757897!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5aebc95e69b9f%3A0x4cadfdbace5f2c0e!2sThe%20Premiere%20Hotel%20Pekanbaru!5e0!3m2!1sid!2sid!4v1687744226738!5m2!1sid!2sid" width="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>

    <script src="/bootstrap/bootstrap.bundle.min.js"></script>
  </body>
</html>
