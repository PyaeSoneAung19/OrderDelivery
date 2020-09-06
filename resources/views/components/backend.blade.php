<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title Page-->
    <title>Forms</title>

    <!-- Fontfaces CSS-->
    <link href="{{asset('Backend/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('Backend/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('Backend/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('Backend/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{asset('Backend/vendor/bootstrap/bootstrap.min.css')}}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{asset('Backend/vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('Backend/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('Backend/vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('Backend/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('Backend/vendor/slick/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('Backend/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('Backend/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">


    <link rel="stylesheet" type="text/css" href="{{asset('select2.min.css')}}">
    <link href="{{asset('datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

    <!-- Main CSS-->
    <link href="{{asset('Backend/css/theme.css')}}" rel="stylesheet" media="all">
    <style type="text/css">
        label {
            font-size: 20px;
            font-family: sans-serif;
        }
    </style>

    <!--  Multiple Image Upload & Preview CSS -->
       <link rel="stylesheet" type="text/css" 
       href="{{asset('multipleimageupload/image-uploader.min.css')}}">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="images/icon/logo.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                                                <li>
                            <a class="js-arrow" href="{{route('dashboard') }}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="{{route('orderlist')}}">
                                <i class="fas fa-desktop"></i>Order</a>
                        </li>
                        <li>
                            <a href="{{ route('cuisine.index')}}">
                                <i class="fas fa-chart-bar"></i> Restaurant Type </a>
                        </li>
                        <li>
                            <a class="js-arrow" href="{{ route('category.index')}}">
                                <i class="fas fa-copy"></i> Category
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('restaurant.index')}}">
                                <i class="fas fa-table"></i> Restaurant </a>
                        </li>
                        <li>
                            <a href="{{ route('township.index')}}">
                                <i class="far fa-check-square"></i> Township </a>
                        </li>
                        <li>
                            <a href="{{ route('menu.index')}}">
                                <i class="fas fa-calendar-alt"></i> Menu </a>
                        </li>
{{--                         <li>
                            <a href="map.html">
                                <i class="fas fa-map-marker-alt"></i>Customer</a>
                        </li> --}}
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="{{asset('Backend/images/icon/logo.png')}}" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a class="js-arrow" href="{{route('dashboard') }}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="{{route('orderlist')}}">
                                <i class="fas fa-desktop"></i>Order</a>
                        </li>
                        <li>
                            <a href="{{ route('cuisine.index')}}">
                                <i class="fas fa-chart-bar"></i> Restaurant Type </a>
                        </li>
                        <li>
                            <a class="js-arrow" href="{{ route('category.index')}}">
                                <i class="fas fa-copy"></i> Category
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('restaurant.index')}}">
                                <i class="fas fa-table"></i> Restaurant </a>
                        </li>
                        <li>
                            <a href="{{ route('township.index')}}">
                                <i class="far fa-check-square"></i> Township </a>
                        </li>
                        <li>
                            <a href="{{ route('menu.index')}}">
                                <i class="fas fa-calendar-alt"></i> Menu </a>
                        </li>
                        {{-- <li>
                            <a href="map.html">
                                <i class="fas fa-map-marker-alt"></i>Customer</a>
                        </li> --}}
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">{{ Auth::user()->name }} Account</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
{{--                                             <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="{{asset('Backend/images/icon/avatar-01.jpg')}}" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">{{ Auth::user()->name }} Accuont </a>
                                                    </h5>
                                                    <span class="email">johndoe@example.com</span>
                                                </div>
                                            </div> --}}
{{--                                             <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-money-box"></i>Billing</a>
                                                </div>
                                            </div> --}}
                                            <div class="account-dropdown__footer">
                                             <a class="dropdown-item" href="{{ route('logout') }}"
                                             onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                             {{ __('Logout') }}
                                         </a>

                                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->

            {{ $slot }}

            
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="{{asset('Backend/vendor/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap JS-->
    <script src="{{asset('Backend/vendor/bootstrap/popper.min.js')}}"></script>
    <script src="{{asset('Backend/vendor/bootstrap/bootstrap.min.js')}}"></script>
    <!-- Vendor JS       -->
    <script src="{{asset('Backend/vendor/slick/slick.min.js')}}">
    </script>
    <script src="{{asset('Backend/vendor/wow/wow.min.js')}}"></script>
    <script src="{{asset('Backend/vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{asset('Backend/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
    </script>
    <script src="{{asset('Backend/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('Backend/vendor/counter-up/jquery.counterup.min.js')}}">
    </script>
    <script src="{{asset('Backend/vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('Backend/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('Backend/vendor/chartjs/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('Backend/vendor/select2/select2.min.js')}}"></script>
    <script src="{{asset('Backend/js/main.js')}}"></script>
    <script src="{{asset('FoodOrder.js')}}"></script>
    {{-- <script src="{{asset('select2.min.js')}}"></script> --}}


      <script src="{{asset('datatables/jquery.dataTables.min.js')}}"></script>
      <script src="{{asset('datatables/dataTables.bootstrap4.min.js')}}"></script>

      <!-- Page level custom scripts -->
      <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
     <!-- multiple Image Upload & Preview JS -->

    <script src="{{asset('multipleimageupload/image-uploader.min.js')}}"></script>
    @yield("script_content");

</body>

</html>
<!-- end document-->
