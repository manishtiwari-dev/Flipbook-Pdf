<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'FlipBook') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
 
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

    @include('common.styles')

</head>
<aside class="sidebar">
    <button type="button" class="sidebar-close-btn">
        <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
    </button>
    <div>
        <a href="{{url('/')}}" class="sidebar-logo">
           <h6 class="light-logo"> FlipBook </h6>
        </a>
    </div>

    @include('common.sidebar')
</aside>

<body class="">

    <!-- Page Content -->
    <main class="dashboard-main">
        @include('common.topbar')

        {{ $slot }}
        @include('common.footer')

    </main>

    <!--Script Section Start-->
    @include('common.script')
    <!--Script Section End-->
    @stack('scripts')
</body>

</html>
