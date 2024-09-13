<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Pendaftaran Pelatihan PPKDJP</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{asset('web/assets/css/bd-wizard.css')}}">
  <link rel="stylesheet" href="{{asset('web/assets/css/style.css')}}">
</head>
<body>
 <header>
  <nav class="navbar navbar-expand-sm navbar-light bg-white">
    <div class="container">
      <a class="navbar-brand mx-auto" href="https://ppkdjakpus.com/">
        <img src="{{asset('web/assets/images/logo_1.jpg')}}" alt="logo" style="height:100px">
      </a>
      <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
        aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
          {{-- <li class="nav-item">
            <a class="nav-link" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li> --}}
          <li class="nav-item">
            <a class="nav-link" href="https://g.co/kgs/PWVm4W7">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>

  {{-- <main class="d-flex align-items-center"> --}}
    @yield('content1')
  {{-- </main> --}}
  <div class="card-footer text-white" style="background-color: rgb(143, 143, 143)">
    <div class="copyright">
        &copy; Copyright <strong><span>PPKD</span></strong>. Pendaftaran Pelatihan <a href="https://g.co/kgs/7szJq5J">PPKD JP</a>
      </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="{{asset('web/assets/js/jquery.steps.min.js')}}"></script>
  <script src="{{asset('web/assets/js/bd-wizard.js')}}"></script>
</body>
</html>
