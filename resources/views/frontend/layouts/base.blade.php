<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <title>{{ $title . ' - ' . 'Mlijo Mart and Grocery' }}</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('storage/images/themes/icon.png') }}" />

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/plugins/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/main.css?v=4.0') }}" />
</head>

<body>
    <main class="main">
        @yield('app')
    </main>
</body>

</html>
