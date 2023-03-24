<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <!-- plugins:css -->
    {!! Html::style('melody/vendors/iconfonts/font-awesome/css/all.min.css') !!}
    {!! Html::style('melody/vendors/css/vendor.bundle.base.css') !!}
    {!! Html::style('melody/vendors/css/vendor.bundle.addons.css') !!}

    <!--
  <link rel="stylesheet" href="melody/vendors/iconfonts/font-awesome/css/all.min.css">
  <link rel="stylesheet" href="melody/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="melody/vendors/css/vendor.bundle.addons.css">-->
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    {!! Html::style('melody/css/style.css') !!}
    <link href="{{ asset('css/sweetalert2.css') }}" rel="stylesheet">

    @yield('styles')
    <!--<link rel="stylesheet" href="css/style.css">-->
    <!-- endinject -->
    <link rel="shortcut icon" href="http://www.urbanui.com/" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="{{ route('home') }}"><img
                        src="{{ asset('image/logo/logo-panel1.png') }}" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="{{ route('home') }}"><img
                        src="{{ asset('image/logo/logo-panel.png') }}" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="fas fa-bars"></span>
                </button>
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item  dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                                {{ __('Salir') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>

                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="fas fa-bars"></span>
                </button>
            </div>
            

        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            <div class="theme-setting-wrapper">
                <div id="settings-trigger"><i class="fas fa-fill-drip"></i></div>
                <div id="theme-settings" class="settings-panel">
                    <i class="settings-close fa fa-times"></i>
                    <p class="settings-heading">Tema de la barra lateral</p>
                    <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                        <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
                    </div>
                    <div class="sidebar-bg-options" id="sidebar-dark-theme">
                        <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
                    </div>
                    <p class="settings-heading mt-2">Temas del encabezado</p>
                    <div class="color-tiles mx-0 px-4">
                        <div class="tiles primary"></div>
                        <div class="tiles success"></div>
                        <div class="tiles warning"></div>
                        <div class="tiles danger"></div>
                        <div class="tiles info"></div>
                        <div class="tiles dark"></div>
                        <div class="tiles default"></div>
                    </div>
                </div>
            </div>

            @yield('preference')
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            @include('layouts._nav')
            <!-- partial -->
            <div class="main-panel">
                @yield('content')
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-flex justify-content-center align-items-center">
                        <span class="text-muted text-center text.sm-left d-block d-sm">
                            Hecho por ®LEVP - Web Designers
                        </span>
                        <span class="d-inline-block">
                            <i class="fab fa-php"></i>
                        </span>
                    </div>
                </footer>
                
                <!-- partial -->
            </div>
            
            <!-- main-panel ends -->
        </div>

        <!-- page-body-wrapper ends -->
    </div>

    <!-- container-scroller -->

    <!-- plugins:js -->
    {!! Html::script('melody/vendors/js/vendor.bundle.base.js') !!}
    {!! Html::script('melody/vendors/js/vendor.bundle.addons.js') !!}
    <!--<script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/js/vendor.bundle.addons.js"></script>-->
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    {!! Html::script('melody/js/off-canvas.js') !!}
    {!! Html::script('melody/js/hoverable-collapse.js') !!}
    {!! Html::script('melody/js/misc.js') !!}
    {!! Html::script('melody/js/settings.js') !!}
    {!! Html::script('melody/js/todolist.js') !!}

    <!--<script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/misc.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>-->
    <!-- endinject -->
    <!-- Custom js for this page-->
    {!! Html::script('melody/js/dashboard.js') !!}
    {!! Html::script('js/deleteConfirm.js') !!}
    {!! Html::script('js/sweetalert2.js') !!}
    {!! Html::script('js/data-table.js') !!}

    {{--<script src="{{ asset('js/sweetalert2.js') }}"></script>--}}
    <!--<script src="js/dashboard.js"></script>-->
    <!-- End custom js for this page-->
    @yield('scripts')
</body>

</html>
