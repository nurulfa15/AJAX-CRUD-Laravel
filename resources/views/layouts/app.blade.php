<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Mengulang User</title>

<!-- _______________________-Bootstrep CSS-___________________________ -->
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">
  <!-- Datatables -->
  <link rel="stylesheet" href="{{ asset('assets/datatables/datatables.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/datatables/datatables.bootstrap4.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css')}}">
  <!-- Custom styles for laravel -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  @stack('styles')

  </head>

  <body>


      <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
        <div class="container">

          <a class="navbar-brand" href="#">Navbar</a>
          <div class="navbar-header">
          <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
          </button>
          </div>


          <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active"><a class="nav-link" href="#">Home </span></a></li>
              <li class="nav-item"><a class="nav-link" href="{{ route('user.index') }}">User</a></li>
          </div>

        </div>
      </nav>


    <!-- BODY -->
    <div class="container">
      @yield('content')
    </div>

 @include('layouts._modal')

      <!-- _______________________-Bootstrep Javascript-___________________________ -->

      <script src="{{ asset('assets/js/jquery.js') }}"></script>
      <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('assets/datatables/datatables.min.js') }}"></script>
      <script src="{{ asset('assets/sweetalert/sweetalert.js') }}"></script>

      <script src="{{ asset('app.js') }}"></script>

      @stack('script')



  </body>
</html>
