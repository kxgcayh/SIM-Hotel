@extends('layouts.mtpro', (['title' => 'Create User']))

@section('content')

{{-- Bread crumb and right sidebar toggle --}}
<x-bread-crumb title="Create User">
    <x-bc-item field="Home" />
    <x-bc-item field="Management Account" />
    <x-bc-item field="Users" />
    <x-bc-item-active field="Create" />
    <x-slot name="button">
        <x-a-button class="info" :href="route('admin.users.index')">
            Back
        </x-a-button>
    </x-slot>
</x-bread-crumb>
{{-- End Bread crumb and right sidebar toggle --}}

<form role="form" action="{{ route('admin.users.store') }}" method="POST" class="form-material">
    <div class="row">
        <x-half-card title="">
            @csrf
            <div class="form-group">
                <input name="name" type="text" class="form-control" placeholder="Name">
            </div>
            <div class="form-group">
                <input name="username" type="text" class="form-control" placeholder="Username">
            </div>
            <div class="form-group">
                <input class="form-control" type="telp" id="telp" name="telp" placeholder="Phone Number">
            </div>
            <div class="form-group">
                <select class="form-control" name="roles[]">
                    <option hidden>Select Role</option>
                    @foreach ($levels as $role)
                    <option value="{{ $role->id }}">
                        {{ ucfirst($role->name) }}
                    </option>
                    @endforeach
                </select>
            </div>
        </x-half-card>
        <x-half-card title="">
            <div class="form-group">
                <input type="email" id="email" name="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="password" id="password" name="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="password" id="confirm-password" name="confirm-password" class="form-control"
                    placeholder="Confirm Password">
            </div>
            <div class="form-group">
                <x-button type="primary pull-right" field="Submit" />
            </div>
        </x-half-card>
    </div>
</form>
@endsection
