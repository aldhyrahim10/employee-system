<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Dashboard analytics - Vuexy - Bootstrap HTML admin template</title>
    <link rel="apple-touch-icon" href="{{ asset("app-assets/images/ico/apple-icon-120.png") }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset("app-assets/images/ico/favicon.ico") }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/vendors/css/vendors.min.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/vendors/css/charts/apexcharts.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/vendors/css/extensions/tether-theme-arrows.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/vendors/css/extensions/tether.min.css") }}">
     <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/vendors/css/tables/datatable/datatables.min.css")}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/css/bootstrap.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/css/bootstrap-extended.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/css/colors.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/css/components.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/css/themes/dark-layout.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/css/themes/semi-dark-layout.css") }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/css/core/menu/menu-types/vertical-menu.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/css/core/colors/palette-gradient.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/css/pages/dashboard-analytics.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/css/pages/card-analytics.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/css/plugins/tour/tour.css") }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/css/style.css") }}">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">

    <!-- BEGIN: Header-->
    @include("includes.navbar")
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    @include("includes.sidebar")
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            @yield("content")
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    @include("includes.footer")
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset("app-assets/vendors/js/vendors.min.js") }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset("app-assets/vendors/js/charts/apexcharts.min.js") }}"></script>
    <script src="{{ asset("app-assets/vendors/js/extensions/tether.min.js") }}"></script>
    <script src="{{ asset("app-assets/vendors/js/tables/datatable/pdfmake.min.js") }}"></script>
    <script src="{{ asset("app-assets/vendors/js/tables/datatable/vfs_fonts.js") }}"></script>
    <script src="{{ asset("app-assets/vendors/js/tables/datatable/datatables.min.js") }}"></script>
    <script src="{{ asset("app-assets/vendors/js/tables/datatable/datatables.buttons.min.js") }}"></script>
    <script src="{{ asset("app-assets/vendors/js/tables/datatable/buttons.html5.min.js") }}"></script>
    <script src="{{ asset("app-assets/vendors/js/tables/datatable/buttons.print.min.js") }}"></script>
    <script src="{{ asset("app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js") }}"></script>
    <script src="{{ asset("app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js") }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset("app-assets/js/core/app-menu.js") }}"></script>
    <script src="{{ asset("app-assets/js/core/app.js") }}"></script>
    <script src="{{ asset("app-assets/js/scripts/components.js") }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset("app-assets/js/scripts/pages/dashboard-analytics.js") }}"></script>
    <script src="{{ asset("app-assets/js/scripts/datatables/datatable.js") }}"></script>
    <!-- END: Page JS-->

    @yield('scripts')

</body>
<!-- END: Body-->

</html>