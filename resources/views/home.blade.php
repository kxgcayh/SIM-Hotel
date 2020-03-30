@extends('layouts.mtpro', (['title' => 'Home']))

@section('content')

{{-- Bread crumb and right sidebar toggle --}}
<x-bread-crumb title="Dashboard">
    <x-bc-item field="Home" />
    <x-bc-item-active field="Dashboard" />
    <x-slot name="button">
        {{-- How to Create Button
        <x-button type="primary" field="Create" />
        Uncoment this --}}
    </x-slot>
</x-bread-crumb>
{{-- End Bread crumb and right sidebar toggle --}}

<x-card-content title="Welcome Home" subtitle="This is a dashboard page">
    {{-- <p>Hello, <b>{{ Auth::user()->name }}</b>.<br>What you want to do right now?</p> --}}
</x-card-content>
@endsection
