@extends('layouts.mtpro', (['title' => 'Province List']))

@section('content')

{{-- Bread crumb and right sidebar toggle --}}
<x-bread-crumb title="Data Provinces">
    <x-bc-item field="Home" />
    <x-bc-item field="Data Location" />
    <x-bc-item-active field="Provinces" />
    <x-slot name="button">
        <x-button type="primary" field="Create" />
    </x-slot>
</x-bread-crumb>
{{-- End Bread crumb and right sidebar toggle --}}

<x-card-content title="Province List">
    <div class="table-responsive m-t-40">
        <table id="province-table" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0"
            width="100%">
            <thead>
                <tr>
                    <th width="5%">No.</th>
                    <th width="50%">Province Name</th>
                    <th width=" 45%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($provinces as $province)
                <tr>
                    <td>{{ ++$no }}</td>
                    <td>{{ $province->name }}</td>
                    <td>
                        <x-button type="warning" field="Edit" />
                        <x-button type="danger" field="Delete" />
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
</x-card-content>
@endsection
