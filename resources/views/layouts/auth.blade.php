<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{-- Tell the browser to be responsive to screen width --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    {{-- Header Script --}}
    @headerScript
    {{-- End of Header Script --}}
</head>

<body>
    {{-- Preloader - style you can find in spinners.css --}}
    @preloader
    {{-- End of Preloader --}}

    {{-- Main wrapper - style you can find in pages.scss --}}
    <section id="wrapper" class="login-register login-sidebar"
        style="background-image:url({{ asset('images/background/login-register.jpg') }});">
        {{-- Content Section --}}
        @yield('content')
        {{-- End of Content Section --}}
    </section>
    {{-- End Wrapper --}}

    {{-- Footer Script --}}
    @footerScript
    {{-- End of Footer Script --}}
</body>

</html>
