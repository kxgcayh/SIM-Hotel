@extends('layouts.mtpro', (['title' => 'User List']))

@section('content')

{{-- Bread crumb and right sidebar toggle --}}
<x-bread-crumb title="Data Users">
    <x-bc-item field="Home" />
    <x-bc-item field="Management Account" />
    <x-bc-item-active field="Users" />
    <x-slot name="button">
        <x-a-button class="warning" :href="route('admin.users.create')">
            Create
        </x-a-button>
    </x-slot>
</x-bread-crumb>
{{-- End Bread crumb and right sidebar toggle --}}

<x-card-content title="List User" subtitle="User has been registered on Application">
    <div class="table-responsive m-t-40">
        <table id="province-table" class="display nowrap table table-hover table-striped table-bordered text-center"
            cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th width="100px">Action</th>
                </tr>
            </thead>
            <tbody>
                {{--  --}}
            </tbody>
        </table>
</x-card-content>
@endsection
