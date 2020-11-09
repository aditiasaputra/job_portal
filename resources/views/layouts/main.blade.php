<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>{{ $title }}</title>

    <!-- Fontfaces CSS-->
    <link href="{{ asset('css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('vendor/bootstrap/bootstrap.min.css') }}" rel="stylesheet" media="all">

    @yield('style')

    <!-- Vendor CSS-->
    <link href="{{ asset('vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/vector-map/jqvmap.min.css') }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet" media="all">

</head>

{{-- <body class="animsition"> --}}
<body>
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar2">
            <div class="logo">
                <a href="{{ route('dashboard') }}">
                    <img src="{{ asset('images/icon/logo-white.png') }}" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                    <div class="image img-cir img-120">
                        <img src="{{ asset('images/icon/avatar-big-01.jpg') }}" alt="{{ auth()->user()->name }}" />
                    </div>
                    <h4 class="name">{{ auth()->user()->name }}</h4>
                    <a href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">Sign out</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                </div>
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li class="{{ Request::segment(1) === strtolower($title) ? 'active' : '' }} has-sub">
                            <a href="{{ route('dashboard') }}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard
                            </a>
                        </li>
                        <li class="{{ Request::segment(1) === 'manage' ? 'active' : '' }} has-sub">
                            <a class="js-arrow {{ Request::segment(1) === 'manage' ? 'open' : '' }}" href="#">
                                <i class="fas fa-folder"></i>Manage
                                <span class="arrow {{ Request::segment(1) === 'manage' ? 'up' : '' }}">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list" style="display: {{ Request::segment(1) === 'manage' ? 'block' : 'none' }}" >
                                <li class="{{ Request::segment(2) === 'users' ? 'active' : '' }}">
                                    <a href="{{ route('users') }}">
                                        <i></i>Users</a>
                                </li>
                                <li class="{{ Request::segment(2) === 'employers' ? 'active' : '' }}">
                                    <a href="{{ route('employers') }}">
                                        <i></i>Employers</a>
                                </li>
                                <li class="{{ Request::segment(2) === 'jobseekers' ? 'active' : '' }}">
                                    <a href="{{ route('jobseekers') }}">
                                        <i></i>Job Seekers</a>
                                </li>
                            </ul>
                        </li>
                        <li class="{{ Request::segment(1) === 'job' ? 'active' : '' }} has-sub">
                            <a class="js-arrow {{ Request::segment(1) === 'job' ? 'open' : '' }}" href="#">
                                <i class="fas fa-tasks"></i>Job Attribute
                                <span class="arrow {{ Request::segment(1) === 'job' ? 'up' : '' }}">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list" style="display: {{ Request::segment(1) === 'job' ? 'block' : 'none' }}" >
                                <li class="{{ Request::segment(2) === 'job-type' ? 'active' : '' }}">
                                    <a href="{{ route('job-type') }}">
                                        <i></i>Job Type</a>
                                </li>
                                <li class="{{ Request::segment(2) === 'education' ? 'active' : '' }}">
                                    <a href="{{ route('education') }}">
                                        <i></i>Education</a>
                                </li>
                                <li class="{{ Request::segment(2) === 'employment' ? 'active' : '' }}">
                                    <a href="{{ route('employment') }}">
                                        <i></i>Employment Type</a>
                                </li>
                            </ul>
                        </li>
                        <li class="{{ Request::segment(2) === 'jobs' ? 'active' : '' }} has-sub">
                            <a href="{{ route('jobs') }}">
                                <i class="fas fa-file"></i>Job Posting</a>
                        </li>
                        <li class="{{ Request::segment(2) === 'industries' ? 'active' : '' }} has-sub">
                            <a href="{{ route('industries') }}">
                                <i class="fas fa-building"></i>Industries</a>
                        </li>
                        <li class="{{ Request::segment(2) === 'categories' ? 'active' : '' }} has-sub">
                            <a href="{{ route('categories') }}">
                                <i class="fas fa-list-alt"></i>Categories</a>
                        </li>
                        <li class="{{ Request::segment(1) === 'settings' ? 'active' : '' }} has-sub">
                            <a class="js-arrow {{ Request::segment(1) === 'settings' ? 'open' : '' }}" href="#">
                                <i class="fas fa-gear"></i>Settings
                                <span class="arrow {{ Request::segment(1) === 'settings' ? 'up' : '' }}">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list" style="display: {{ Request::segment(1) === 'settings' ? 'block' : 'none' }}" >
                                <li class="{{ Request::segment(2) === 'general' ? 'active' : '' }}">
                                    <a href="{{ route('general') }}">
                                        <i></i>General</a>
                                </li>
                                <li class="{{ Request::segment(2) === 'email-templates' ? 'active' : '' }}">
                                    <a href="{{ route('email-templates') }}">
                                        <i></i>Email Templates</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop2">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap2">
                            <div class="logo d-block d-lg-none">
                                <a href="#">
                                    <img src="{{ asset('images/icon/logo-white.png') }}" alt="CoolAdmin" />
                                </a>
                            </div>
                            <div class="header-button2">
                                <div class="header-button-item js-item-menu">
                                    <i class="zmdi zmdi-search"></i>
                                    <div class="search-dropdown js-dropdown">
                                        <form action="">
                                            <input class="au-input au-input--full au-input--h65" type="text" placeholder="Search for datas &amp; reports..." />
                                            <span class="search-dropdown__icon">
                                                <i class="zmdi zmdi-search"></i>
                                            </span>
                                        </form>
                                    </div>
                                </div>
                                <div class="header-button-item has-noti js-item-menu">
                                    <i class="zmdi zmdi-notifications"></i>
                                    <div class="notifi-dropdown js-dropdown">
                                        <div class="notifi__title">
                                            <p>You have 3 Notifications</p>
                                        </div>
                                        <div class="notifi__item">
                                            <div class="bg-c1 img-cir img-40">
                                                <i class="zmdi zmdi-email-open"></i>
                                            </div>
                                            <div class="content">
                                                <p>You got a email notification</p>
                                                <span class="date">April 12, 2018 06:50</span>
                                            </div>
                                        </div>
                                        <div class="notifi__item">
                                            <div class="bg-c2 img-cir img-40">
                                                <i class="zmdi zmdi-account-box"></i>
                                            </div>
                                            <div class="content">
                                                <p>Your account has been blocked</p>
                                                <span class="date">April 12, 2018 06:50</span>
                                            </div>
                                        </div>
                                        <div class="notifi__item">
                                            <div class="bg-c3 img-cir img-40">
                                                <i class="zmdi zmdi-file-text"></i>
                                            </div>
                                            <div class="content">
                                                <p>You got a new file</p>
                                                <span class="date">April 12, 2018 06:50</span>
                                            </div>
                                        </div>
                                        <div class="notifi__footer">
                                            <a href="#">All notifications</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="header-button-item mr-0 js-sidebar-btn">
                                    <i class="zmdi zmdi-menu"></i>
                                </div>
                                <div class="setting-menu js-right-sidebar d-none d-lg-block">
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-account"></i>Account</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-settings"></i>Setting</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                <i class="fas fa-sign-out-alt"></i>
                                                Sign Out
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <aside class="menu-sidebar2 js-right-sidebar d-block d-lg-none">
                <div class="logo">
                    <a href="#">
                        <img src="{{ asset('images/icon/logo-white.png') }}" alt="Cool Admin" />
                    </a>
                </div>
                <div class="menu-sidebar2__content js-scrollbar2">
                    <div class="account2">
                        <div class="image img-cir img-120">
                            <img src="{{ asset('images/icon/avatar-big-01.jpg') }}" alt="{{ auth()->user()->name }}" />
                        </div>
                        <h4 class="name">{{ auth()->user()->name }}</h4>
                        <a href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">Sign out</a>
                    </div>
                    <nav class="navbar-sidebar2">
                        <ul class="list-unstyled navbar__list">
                        <li class="{{ Request::segment(1) === strtolower($title) ? 'active' : '' }} has-sub">
                            <a href="{{ route('dashboard') }}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li class="{{ Request::segment(1) === 'manage' ? 'active' : '' }} has-sub">
                            <a class="js-arrow {{ Request::segment(1) === 'manage' ? 'open' : '' }}" href="#">
                                <i class="fas fa-folder"></i>Manage
                                <span class="arrow {{ Request::segment(1) === 'manage' ? 'up' : '' }}">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list" style="display: {{ Request::segment(1) === 'manage' ? 'block' : 'none' }}" >
                                <li class="{{ Request::segment(2) === 'users' ? 'active' : '' }}">
                                    <a href="{{ route('users') }}">
                                        <i></i>Users</a>
                                </li>
                                <li class="{{ Request::segment(2) === 'employers' ? 'active' : '' }}">
                                    <a href="{{ route('employers') }}">
                                        <i></i>Employers</a>
                                </li>
                                <li class="{{ Request::segment(2) === 'jobseekers' ? 'active' : '' }}">
                                    <a href="{{ route('jobseekers') }}">
                                        <i></i>Job Seeker</a>
                                </li>
                            </ul>
                        </li>
                        <li class="{{ Request::segment(2) === 'jobs' ? 'active' : '' }} has-sub">
                            <a href="{{ route('jobs') }}">
                                <i class="fas fa-building"></i>Job Posting</a>
                        </li>
                        <li class="{{ Request::segment(2) === 'industries' ? 'active' : '' }} has-sub">
                            <a href="{{ route('industries') }}">
                                <i class="fas fa-building"></i>Industries</a>
                        </li>
                        <li class="{{ Request::segment(2) === 'categories' ? 'active' : '' }} has-sub">
                            <a href="{{ route('categories') }}">
                                <i class="fas fa-list-alt"></i>Categories</a>
                        </li>
                    </ul>
                    </nav>
                </div>
            </aside>
            <!-- END HEADER DESKTOP-->

            <!-- BREADCRUMB-->
            <section class="au-breadcrumb m-t-75">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="au-breadcrumb-content">
                                    <div class="au-breadcrumb-left">
                                        <span class="au-breadcrumb-span">You are here:</span>
                                        <ul class="list-unstyled list-inline au-breadcrumb__list">
                                            <li class="list-inline-item active">
                                                <a href="#">{{ $title }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <button class="au-btn au-btn-icon au-btn--green" data-toggle="modal" data-target="#addUserModal">
                                        <i class="zmdi zmdi-plus"></i>add user</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->

            <!-- add user modal -->
			<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <form action="{{ route('add_user') }}" id="form-user">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addUserModalLabel">Add User</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="alert alert-danger print-error-msg d-none">
                                    <ul></ul>
                                </div>
                                <div class="alert alert-danger alert-dismissible fade" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="name" class=" form-control-label">Full Name *</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input class="au-input au-input--full" type="text" name="name" id="name" placeholder="Enter Fullname">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="username" class=" form-control-label">Username *</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input class="au-input au-input--full" type="text" name="username" id="username" placeholder="Enter Username">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="email" class=" form-control-label">Email *</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input class="au-input au-input--full" type="text" name="email" id="email" placeholder="Enter Email">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="password" class=" form-control-label">Password *</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input class="au-input au-input--full" type="password" name="password" id="password" placeholder="Enter Password">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="password_confirmation" class=" form-control-label">Confirmation Password *</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input class="au-input au-input--full" type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirmation Password">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="role" class=" form-control-label">Role *</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="role" id="role" class="form-control">
                                            <option value="">Select Role</option>
                                            <option value="admin">Admin</option>
                                            <option value="employer">Employer</option>
                                            <option value="jobseeker">Job Seeker</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary cancel" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
				</div>
			</div>
			<!-- end add user modal  -->

            <!-- MAIN CONTENT -->
            @yield('content')
            <!-- END MAIN CONTENT -->

            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="{{ asset('vendor/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset('vendor/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/bootstrap.min.js') }}"></script>

    @yield('script')

    <!-- Vendor JS       -->
    <script src="{{ asset('vendor/slick/slick.min.js') }}">
    </script>
    <script src="{{ asset('vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('vendor/animsition/animsition.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}">
    </script>
    <script src="{{ asset('vendor/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('vendor/counter-up/jquery.counterup.min.js') }}">
    </script>
    <script src="{{ asset('vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('vendor/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('vendor/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('vendor/vector-map/jquery.vmap.js') }}"></script>
    <script src="{{ asset('vendor/vector-map/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('vendor/vector-map/jquery.vmap.sampledata.js') }}"></script>
    <script src="{{ asset('vendor/vector-map/jquery.vmap.world.js') }}"></script>

    <!-- Main JS-->
    <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
<!-- end document--> 