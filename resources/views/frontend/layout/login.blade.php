<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ansonika">
    <title>Almakarya | Rekayasa Mesin Tepat Guna</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="frontend/img/favicon2.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">
    @include('frontend.includes.style')

</head>

<body>

    <div id="page">

    {{-- @include('frontend.includes.altenativetopbar') --}}

        @yield('main')

        {{-- @include('frontend.includes.altenativefooter') --}}
    </div>
    <!-- page -->

    <div id="toTop"></div>
    <!-- Back to top button -->

    <!-- Script -->
    
    @stack('before-scripts')
    @include('frontend.includes.scripts') 
    @stack('after-scripts')
</body>

</html>