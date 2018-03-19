<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>{{ $page->title }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <!-- <link href="css/jquery.fancybox-buttons.css" rel="stylesheet" type="text/css" />
    <link href="css/jquery.fancybox.css" rel="stylesheet" type="text/css" />

    <link href="css/materialize.css" rel="stylesheet" type="text/css" />

    <link href="css/owl.carousel.css" rel="stylesheet" type="text/css" />
    <link href="css/owl.theme.css" rel="stylesheet" type="text/css" />
    <link href="css/owl.transitions.css" rel="stylesheet" type="text/css" /> -->

    <link href="css/index.css" rel="stylesheet" type="text/css" />

    <link href="css/responsive.css" rel="stylesheet" type="text/css" />

  </head>
  <body>
    @include('laravelcms::cms.pages.includes.header')
    @yield('content')
    @include('laravelcms::cms.pages.includes.footer')

    <script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>

    @yield('scripts')
  </body>
</html>
