<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{-- Tell the browser to be responsive to screen width  --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    {{-- Header Script --}}
    @headerScript
    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o), m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-85622565-1', 'auto');
        ga('send', 'pageview');

    </script>
    {{-- End of Header Script --}}
</head>

<body class="fix-header">
    {{-- Preloader - style you can find in spinners.css --}}
    @preloader
    {{-- End of Preloader --}}

    {{-- Main wrapper - style you can find in pages.scss  --}}
    <div id="main-wrapper">
        {{-- Topbar header - style you can find in pages.scss  --}}
        <header class="topheader" id="top">
            <div class="fix-width">
                <nav class="navbar navbar-expand-md navbar-light p-l-0">
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                        data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                        aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                    {{-- Logo will be here  --}}
                    <a class="navbar-brand" href="#"><img src="{{ asset('images/landing/material-admin-logo.png') }}"
                            alt="admin template" /></a>
                    {{-- This is the navigation menu  --}}
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        @if (Route::has('login'))
                        <ul class="navbar-nav ml-auto stylish-nav">
                            @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/home') }}" target="_blank">Home</a>
                            </li>
                            @else
                            <li class="nav-item">
                                <a class="m-t-5 btn btn-info font-13" href="{{ route('login') }}"
                                    style="width:120px;">Log In</a>
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}" target="_blank">Register</a>
                            </li>
                            @endif
                            @endauth
                        </ul>
                        @endif
                    </div>
                </nav>
            </div>
        </header>
        {{-- Page wrapper   --}}
        <div class="page-wrapper">
            {{-- Container fluid   --}}
            <div class="container-fluid">

                {{-- Start Page Content  --}}
                @yield('content')
                {{-- End Page Content  --}}

                {{-- footer  --}}
                @footer
                {{-- End footer  --}}
            </div>
            {{-- End Container fluid   --}}
        </div>
        {{-- End Page wrapper   --}}
    </div>
    {{-- End Wrapper  --}}

    {{-- Footer Script --}}
    @footerScript
    {{-- End of Footer Script --}}
</body>

</html>
