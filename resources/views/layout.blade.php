<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <!-- Bootstrap core CSS -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <style>
      body {
        padding-top: 54px;
      }

      @media (min-width: 992px) {
        body {
          padding-top: 56px;
        }
      }

      .carousel-item {
        height: 65vh;
        min-height: 300px;
        background: no-repeat center center scroll;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
      }

      .portfolio-item {
        margin-bottom: 30px;
      }

      .main-content {
        min-height: 550px;
      }

      
    </style>

    <!-- Bootstrap core JavaScript -->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  </head>
  <body>
    @include('inc.navbar')
    @yield('content')
  </body>
  <footer class="py-5 bg-dark">
    @include('inc.footer')
  </footer>
</html>
