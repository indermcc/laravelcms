<!DOCTYPE html>
<html>
    <head>
	<title>TODO supply a title</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="<?= url('/') ?>/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?= url('/') ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

        <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/> -->

        <link href="<?= url('/') ?>/css/jquery.fancybox-buttons.css" rel="stylesheet" type="text/css"/>
        <link href="<?= url('/') ?>/css/jquery.fancybox.css" rel="stylesheet" type="text/css"/>

        <link href="<?= url('/') ?>/css/owl.carousel.css" rel="stylesheet" type="text/css"/>
        <link href="<?= url('/') ?>/css/owl.theme.css" rel="stylesheet" type="text/css"/>
        <link href="<?= url('/') ?>/css/owl.transitions.css" rel="stylesheet" type="text/css"/>


        <link href="<?= url('/') ?>/css/index.css" rel="stylesheet" type="text/css"/>
        <base href="<?= url('/') ?>">
    </head>
    <body>


        <!--header-section-->
        @include('header')


        <!--dashboard-section-->
        <section id="dashboard-section">

            <div class="container-fluid">
                <!--main-col-->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dash-main-col">

                    <!--main-div-->
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dash-main-div">

                        <!--dashboard-div-->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dashboard-div">

                            <!--first-part-->
                            @include('left-sidebar')

                            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-10 sec-part">

                                <!--bread-crumb-div-->
                                @yield('breadcrumb')

                                @yield('content')

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('footer')
        <script type="text/javascript">
          var APP_URL = {!! json_encode(url('/')) !!};
          function createUrl(url) {
            return APP_URL+url;
          }
        </script>
        <script src="<?= url('/') ?>/js/jquery-3.1.1.min.js" type="text/javascript"></script>

        <script src="<?= url('/') ?>/js/bootstrap.min.js" type="text/javascript"></script>

        <script src="<?= url('/') ?>/js/jquery.fancybox.js" type="text/javascript"></script>
        <script src="<?= url('/') ?>/js/jquery.fancybox.pack.js" type="text/javascript"></script>
        <script src="<?= url('/') ?>/js/jquery.fancybox-buttons.js" type="text/javascript"></script>

        <script src="<?= url('/') ?>/js/owl.carousel.js" type="text/javascript"></script>
        <script src="<?= url('/') ?>/js/owl.carousel.min.js" type="text/javascript"></script>

	       <script src="<?= url('/') ?>/js/jquery.slimscroll.min.js" type="text/javascript"></script>

         @yield('scripts')
    </body>
</html>
