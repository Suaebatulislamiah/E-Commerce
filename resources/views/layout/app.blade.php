
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>@yield ('titel', 'E-Commerce')</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

    

    <!-- Bootstrap core CSS -->
<link href="{{ asset ('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Suaebatul Store</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
  <div class="nav-item text-nowrap">
    <a class="nav-link px-3" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      Sign out
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>
  </div>
</div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('dashboard')}}">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          @if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('gudang'))
          <li class="nav-item">
            <a class="nav-link" href="{{ route ('kategori.index') }}">
              <span data-feather="file"></span>
              Kategori
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route ('produk.index') }}">
              <span data-feather="shopping-cart"></span>
              Products
            </a>
          </li>
          @endif
          @if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('pelanggan'))
          <li class="nav-item">
            <a class="nav-link" href="{{ route ('pesanan.index') }}">
              <span data-feather="bar-chart-2"></span>
              Pesanan
            </a>
          </li>
          @endif
          @if (auth()->user()->hasRole('admin'))
          <li class="nav-item">
            <a class="nav-link" href="{{ route ('pelanggan.index') }}">
              <span data-feather="users"></span>
              pelanggan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route ('users.index') }}">
              <span data-feather="layers"></span>
              Pengguna
            </a>
          </li>
          @endif
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Saved reports</span>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        </ul>
      </div>
    </nav>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      @yield('content')

    </main>
  </div>
</div>

      <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
      <script src= "{{ asset('assets/js/dashboard.js') }}"></script>  
    </body>
</html>
