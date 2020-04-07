<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{-- Tell the browser to be responsive to screen width --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="kautsaralbana">
    {{-- Header Script --}}
    @headerScript
    {{-- End of Header Script --}}
</head>

<body class="fix-header fix-sidebar card-no-border logo-center">
    {{-- Preloader - style you can find in spinners.css --}}
    @preloader
    {{-- Main wrapper - style you can find in pages.scss --}}
    <div id="main-wrapper">
        {{-- Topbar header - style you can find in pages.scss --}}
        @header
        {{-- End Topbar header --}}
        {{-- Left Sidebar - style you can find in sidebar.scss  --}}
        @leftSidebar
        {{-- End Left Sidebar - style you can find in sidebar.scss  --}}
        {{-- Sweet Alert --}}
        @include('sweetalert::alert')
        {{-- End of Sweet Alert --}}
        {{-- Page wrapper  --}}
        <div class="page-wrapper">
            {{-- Container fluid  --}}
            <div class="container-fluid">
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
    {{-- Footer Script --}}
    @footerScript
    {{-- End of Footer Script --}}
</body>

</html>
