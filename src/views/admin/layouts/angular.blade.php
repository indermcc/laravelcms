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

        <link href="<?= url('/') ?>/css/angular/ladda-themeless.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?= url('/') ?>/css/angular/toaster.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?= url('/') ?>/css/angular/ngDialog.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?= url('/') ?>/css/angular/ngDialog-theme-default.min.css" rel="stylesheet" type="text/css"/>
        @yield('css')

        <base href="<?= url('/') ?>">
    </head>
    <body>


        <!--header-section-->
        @include('laravelcms::admin.layouts.header')


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
                            @include('laravelcms::admin.layouts.left-sidebar')

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

        @include('laravelcms::admin.layouts.footer')
        <script type="text/javascript">
        var APP_URL = {!! json_encode(url('/')) !!},
              ANGULAR_START_TAG = '<%',
                ANGULAR_END_TAG = '%>'
        ;
        function createUrl(url) {
          return APP_URL+url;
        }
        </script>
        <script src="<?= url('/') ?>/js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="<?= url('/') ?>/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?= url('/') ?>/js/tinymce/tinymce.min.js" type="text/javascript"></script>

        <script src="<?= url('/') ?>/js/angular/angular.min.js" type="text/javascript"></script>
        <script src="<?= url('/') ?>/js/angular/angular-resource.min.js" type="text/javascript"></script>
        <script src="<?= url('/') ?>/js/angular/angular-ui-router.min.js" type="text/javascript"></script>
        <script src="<?= url('/') ?>/js/angular/jcs-auto-validate.min.js" type="text/javascript"></script>
        <script src="<?= url('/') ?>/js/angular/spin.min.js" type="text/javascript"></script>
        <script src="<?= url('/') ?>/js/angular/angular-spinner.min.js" type="text/javascript"></script>
        <script src="<?= url('/') ?>/js/angular/ladda.min.js" type="text/javascript"></script>
        <script src="<?= url('/') ?>/js/angular/angular-ladda.min.js" type="text/javascript"></script>
        <script src="<?= url('/') ?>/js/angular/toaster.min.js" type="text/javascript"></script>
        <script src="<?= url('/') ?>/js/angular/angular-animate.min.js" type="text/javascript"></script>
        <script src="<?= url('/') ?>/js/angular/paging.min.js" type="text/javascript"></script>

        <script src="<?= url('/') ?>/js/ace.js" type="text/javascript"></script>
        <script src="<?= url('/') ?>/js/angular/ui-ace.js" type="text/javascript"></script>
        <!-- <script src="<?= url('/') ?>/js/require.js" type="text/javascript"></script> -->

        <script src="<?= url('/') ?>/js/angular/tinymce.js" type="text/javascript"></script>

        <script src="<?= url('/') ?>/js/angular/ngDialog.min.js" type="text/javascript"></script>

         @yield('scripts')
    </body>
</html>
