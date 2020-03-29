@extends('layouts.mtpro', (['title' => 'Province List']))

@section('content')

{{-- Bread crumb and right sidebar toggle --}}
<x-bread-crumb title="Dashboard">
    <x-bc-item field="Home" />
    <x-bc-item-active field="Dashboard" />
    <x-slot name="button">
        <x-button type="primary" field="Create" />
    </x-slot>
</x-bread-crumb>
{{-- End Bread crumb and right sidebar toggle --}}

<x-card-content title="Welcome Home">
    <p>Hello, <b>{{ Auth::user()->name }}</b>.<br>What you want to do right now?</p>
</x-card-content>
@endsection
