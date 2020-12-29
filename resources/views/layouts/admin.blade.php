<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ trans('panel.site_title') }}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />

    @stack('styles')

</head>

<body class="c-app">

    <div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">

        @include('common.sidebar')

        @include('common.navbar')

        <div id="app" class="c-body">

            <main class="c-main">

                @yield('content')

            </main>

            @include('common.footer')

        </div>

    </div>

    <script src="{{ asset('js/app.js') }}"></script>

    @stack('scripts')

</html>
