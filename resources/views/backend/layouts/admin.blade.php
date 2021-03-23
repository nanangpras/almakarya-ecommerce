<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Admin Almakarya | Rekayasa Mesin Tepat Guna</title>
    <meta name="description" content="Droopy is a Dashboard & Admin Site Responsive Template by hencework." />
    <meta name="keywords"
        content="admin, admin dashboard, admin template, cms, crm, Droopy Admin, Droopyadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
    <meta name="author" content="hencework" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="frontend/img/frontend/img/frontend/img/favicon.ico">
    <link rel="icon" href="frontend/img/favicon.ico" type="image/x-icon">

    @include('backend.includes.style')
</head>

<body>
    <!-- Preloader -->
    {{-- <div class="preloader-it">
        <div class="la-anim-1"></div>
    </div> --}}
    <!-- /Preloader -->
    <div class="wrapper  theme-3-active pimary-color-green">
        <!-- Top Menu Items -->
        @include('backend.includes.topnavbar')
        <!-- /Top Menu Items -->

        <!-- Left Sidebar Menu -->
        @include('backend.includes.sidebar')
        <!-- /Left Sidebar Menu -->

        <!-- Right Sidebar Backdrop -->
        <div class="right-sidebar-backdrop"></div>
        <!-- /Right Sidebar Backdrop -->

        <!-- Main Content -->
        <div class="page-wrapper">
            {{-- content --}}
            @yield('content')

            <!-- Footer -->
            @include('backend.includes.footer')
            <!-- /Footer -->

        </div>
        <!-- /Main Content -->

    </div>
    <!-- /#wrapper -->

    <!-- JavaScript -->
    @stack('before-scripts')
    @include('backend.includes.scripts')
    @stack('after-scripts')
</body>

</html>
