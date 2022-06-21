<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <title>{{ $title . ' - ' . getSetting('web_name') }}</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="{{ getSetting('meta_description') }}">
    <meta name="keywords" content="{{ getSetting('meta_keyword') }}">
    <meta name="author" content="{{ getSetting('web_author') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('/') }}">
    <meta name="asset-url" content="{{ asset('/') }}">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon"
        href="{{ asset('storage/images/themes/' . getSetting('favicon')) }}" />

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/plugins/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/main.css?v=4.0') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}" />
</head>

<body>
    <main class="main">
        @yield('app')
    </main>
</body>

</html>
