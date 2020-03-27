<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{-- Tell the browser to be responsive to screen width --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    {{-- Favicon icon --}}
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset(images/favicon.png) }}">
    <title>{{ $title }}</title>
    {{-- Bootstrap Core CSS --}}
    <link href="{{ asset(plugins/bootstrap/css/bootstrap.min.css) }}" rel="stylesheet">
    {{-- chartist CSS --}}
    <link href="{{ asset(plugins/chartist-js/dist/chartist.min.css) }}" rel="stylesheet">
    <link href="{{ asset(plugins/chartist-js/dist/chartist-init.css) }}" rel="stylesheet">
    <link href="{{ asset(plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css) }}" rel="stylesheet">
    {{-- This page css - Morris CSS --}}
    <link href="{{ asset(plugins/c3-master/c3.min.css) }}" rel="stylesheet">
    {{-- Custom CSS --}}
    <link href="{{ asset(css/style.css) }}" rel="stylesheet">
    {{-- You can change the theme colors from here --}}
    <link href="{{ asset(css/colors/blue.css) }}" id="theme" rel="stylesheet">
    {{-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries --}}
    {{-- WARNING: Respond.js doesn't work if you view the page via file:// --}}
    {{-- [if lt IE --}}
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    {{-- [endif] --}}
</head>

<body class="fix-header fix-sidebar card-no-border logo-center">
    {{-- Preloader - style you can find in spinners.css --}}
    @include('layouts.preloader')

    {{-- Main wrapper - style you can find in pages.scss --}}
    <div id="main-wrapper">
        {{-- Topbar header - style you can find in pages.scss --}}
        @header
        {{-- End Topbar header --}}

        {{-- Left Sidebar - style you can find in sidebar.scss  --}}
        @leftSidebar
        {{-- End Left Sidebar - style you can find in sidebar.scss  --}}
        {{-- Page wrapper  --}}
        <div class="page-wrapper">
            {{-- Container fluid  --}}
            <div class="container-fluid">
                {{-- Bread crumb and right sidebar toggle --}}
                @rightSidebar
                {{-- End Bread crumb and right sidebar toggle --}}

                {{-- Start Page Content --}}
                @yield('content')
                {{-- End PAge Content --}}

                {{-- Service Panel --}}
                @servicePanel
                {{-- End Service Panel --}}
            </div>
            {{-- End Container fluid  --}}

            {{-- Footer --}}
            @footer
            {{-- End Footer --}}
        </div>
        {{-- End Page wrapper  --}}
    </div>
    {{-- End Wrapper --}}

    {{-- All Jquery --}}
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    {{-- Bootstrap tether Core JavaScript --}}
    <script src="{{ asset('plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    {{-- slimscrollbar scrollbar JavaScript --}}
    <script src="{{ asset('js/jquery.slimscroll.js') }}"></script>
    {{-- Wave Effects --}}
    <script src="{{ asset('js/waves.js') }}"></script>
    {{-- Menu sidebar --}}
    <script src="{{ asset('js/sidebarmenu.js') }}"></script>
    {{-- stickey kit --}}
    <script src="{{ asset('plugins/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
    <script src="{{ asset('plugins/sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('plugins/sparkline/jquery.sparkline.min.js') }}"></script>
    {{-- Custom JavaScript --}}
    <script src="{{ asset('js/custom.min.js') }}"></script>
    {{-- This page plugins --}}
    {{-- chartist chart --}}
    <script src="{{ asset('plugins/chartist-js/dist/chartist.min.js') }}"></script>
    <script src="{{ asset('plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js') }}"></script>
    {{-- c3 JavaScript --}}
    <script src="{{ asset('plugins/d3/d3.min.js') }}"></script>
    <script src="{{ asset('plugins/c3-master/c3.min.js') }}"></script>
    {{-- Chart JS --}}
    <script src="{{ asset('js/dashboard1.js') }}"></script>
    {{-- Style switcher --}}
    <script src="{{ asset('plugins/styleswitcher/jQuery.style.switcher.js') }}"></script>
</body>

</html>
