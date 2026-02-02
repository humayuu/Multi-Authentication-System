<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Syndash - Bootstrap4 Admin Template</title>
    <!--favicon-->
    <link rel="icon" href="{{ asset('assets/images/favicon-32x32.png') }}" type="image/png" />
    <!-- Vector CSS -->
    <link href="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <!--plugins-->
    <link href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{ asset('assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('assets/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&family=Roboto&display=swap" />
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/icons.css') }}" />
    <!-- App CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/dark-sidebar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/dark-theme.css') }}" />
</head>

<body>
    <!-- wrapper -->
    <div class="wrapper">
        <!--sidebar-wrapper-->
        <div class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div class="">
                    <img src="{{ asset('') }}assets/images/logo-icon.png" class="logo-icon-2" alt="" />
                </div>
                <div>
                    <h4 class="logo-text">Syndash</h4>
                </div>
                <a href="javascript:;" class="toggle-btn ms-auto"> <i class="bx bx-menu"></i>
                </a>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon icon-color-1"><i class="bx bx-home-alt"></i>
                        </div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                    <ul>
                        <li> <a href="index.html"><i class="bx bx-right-arrow-alt"></i>Analytics</a>
                        </li>
                        <li> <a href="index2.html"><i class="bx bx-right-arrow-alt"></i>Sales</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!--end navigation-->
        </div>
        <!--end sidebar-wrapper-->

        <!--header-->
        <header class="top-header">
            <nav class="navbar navbar-expand">
                <div class="left-topbar d-flex align-items-center">
                    <a href="javascript:;" class="toggle-btn"> <i class="bx bx-menu"></i>
                    </a>
                </div>
                <div class="flex-grow-1 search-bar">
                    <div class="input-group">
                        <button class="btn btn-search-back search-arrow-back" type="button"><i
                                class="bx bx-arrow-back"></i></button>
                        <input type="text" class="form-control" placeholder="search" />
                        <button class="btn btn-search" type="button"><i class="lni lni-search-alt"></i></button>
                    </div>
                </div>
                <div class="right-topbar ms-auto">
                    <ul class="navbar-nav">
                        <li class="nav-item search-btn-mobile">
                            <a class="nav-link position-relative" href="javascript:;"> <i
                                    class="bx bx-search vertical-align-middle"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown dropdown-lg">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative"
                                href="javascript:;" data-bs-toggle="dropdown"> <span class="msg-count">6</span>
                                <i class="bx bx-comment-detail vertical-align-middle"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown dropdown-lg">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative"
                                href="javascript:;" data-bs-toggle="dropdown"> <i
                                    class="bx bx-bell vertical-align-middle"></i>
                                <span class="msg-count">8</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown dropdown-user-profile">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"
                                data-bs-toggle="dropdown">
                                <div class="d-flex user-box align-items-center">
                                    <div class="user-info">
                                        <p class="user-name mb-0">{{ Auth::guard('admin')->name }}</p>
                                        <p class="designattion mb-0">Available</p>
                                    </div>
                                    <img src="{{ asset('assets/images/avatars/avatar-1.png') }}" class="user-img"
                                        alt="user avatar">
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="{{ route('admin.profile') }}"><i
                                        class="bx bx-user"></i><span>Profile</span></a>
                                <div class="dropdown-divider mb-0"></div>
                                <form method="POST" action="{{ route('admin.logout') }}">
                                    @csrf
                                    <button class="dropdown-item" href="javascript:;"><i
                                            class="bx bx-power-off"></i><span>Logout</span></button>

                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!--end header-->

        <!--page-wrapper-->
        <div class="page-wrapper">
            <!--page-content-wrapper-->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <!-- Dashboard Content -->
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <div class="card radius-15 overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div>
                                            <p class="mb-0 font-weight-bold">Sessions</p>
                                            <h2 class="mb-0">501</h2>
                                        </div>
                                        <div class="ms-auto align-self-end">
                                            <p class="mb-0 font-14 text-primary"><i
                                                    class='bx bxs-up-arrow-circle'></i> <span>1.01% 31 days ago</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div id="chart1"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="card radius-15 overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div>
                                            <p class="mb-0 font-weight-bold">Visitors</p>
                                            <h2 class="mb-0">409</h2>
                                        </div>
                                        <div class="ms-auto align-self-end">
                                            <p class="mb-0 font-14 text-success"><i
                                                    class='bx bxs-up-arrow-circle'></i> <span>0.49% 31 days ago</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div id="chart2"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="card radius-15 overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div>
                                            <p class="mb-0 font-weight-bold">Page Views</p>
                                            <h2 class="mb-0">2,346</h2>
                                        </div>
                                        <div class="ms-auto align-self-end">
                                            <p class="mb-0 font-14 text-danger"><i
                                                    class='bx bxs-down-arrow-circle'></i> <span>130.68% 31 days
                                                    ago</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div id="chart3"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </div>
            <!--end page-content-wrapper-->
        </div>
        <!--end page-wrapper-->

        <!--start overlay-->
        <div class="overlay toggle-btn-mobile"></div>
        <!--end overlay-->

        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->

        <!--footer -->
        <div class="footer">
            <p class="mb-0">Syndash @2020 | Developed By : <a href="https://themeforest.net/user/codervent"
                    target="_blank">codervent</a>
            </p>
        </div>
        <!-- end footer -->
    </div>
    <!-- end wrapper -->

    <!-- JavaScript -->
    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/plugins/apexcharts-bundle/js/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/index.js') }}"></script>
    <!-- App JS -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
</body>

</html>
