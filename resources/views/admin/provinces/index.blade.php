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

<x-card-content title="Province List">
    <div class="table-responsive m-t-40">
        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0"
            width="100%">
            <thead>
                <tr>
                    <td>No.</td>
                    <td>Province Name</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
</x-card-content>
@endsection
