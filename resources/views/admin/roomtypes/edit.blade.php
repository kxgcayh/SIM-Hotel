@extends('layouts.mtpro', (['title' => 'Edit Room Type']))

@section('content')

{{-- Bread crumb and right sidebar toggle --}}
<x-bread-crumb title="Edit Data Room Types">
    <x-bc-item field="Home" />
    <x-bc-item field="Management Rooms" />
    <x-bc-item field="Data Rooms" />
    <x-bc-item-active field="Edit" />
    <x-slot name="button">
        <x-a-button class="info" :href="route('admin.roomtypes.index')">
            Back
        </x-a-button>
    </x-slot>
</x-bread-crumb>
{{-- End Bread crumb and right sidebar toggle --}}

{{-- Content --}}

{{-- End of Content --}}
@endsection
