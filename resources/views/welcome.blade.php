@extends('layouts.landing-page', (['title' => 'Welcome']))

@section('content')
<div class="fix-width">
    <div class="row banner-text">
        <div class="col-lg-5 m-t-20">
            <h1>Sistem Informasi &amp; Manajemen <span class="text-info">Pengelolaan Hotel</span> berbasis Web
                Framework Laravel</h1>
        </div>
        <div class="col-lg-7">
            <div class="hero-banner"> <img src="{{ asset('images/landing/banner.jpg')}}"
                    alt="Material Pro admin template" />
            </div>
        </div>
    </div>
</div>
@endsection
