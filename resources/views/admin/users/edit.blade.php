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

<form role="form" action="{{ route('admin.users.update', $user->id_user) }}" method="POST" class="form-material">
    <div class="row">
        <x-half-card title="">
            @csrf
            @method('PUT')
            <div class="form-group">
                <input name="name" type="text" class="form-control" placeholder="Name"
                    value="{{ old('name', $user->name) }}">
            </div>
            <div class="form-group">
                <input name="username" type="text" class="form-control" placeholder="Username"
                    value="{{ old('name', $user->username) }}">
            </div>
            <div class="form-group">
                <input class="form-control" type="telp" id="telp" name="telp" placeholder="Phone Number"
                    value="{{ old('telp', $user->telp) }}">
            </div>
            <div class="form-group">
                <select class="form-control" name="roles[]">
                    <option hidden>Select Role</option>
                    @foreach ($roles as $role )
                    <option value="{{ $role->id }}" {{ $role ? 'selected':'' }}>
                        {{ ucfirst($role->name) }}
                    </option>
                    @endforeach
                </select>
            </div>
        </x-half-card>
        <x-half-card title="">
            <div class="form-group">
                <input type="email" id="email" name="email" class="form-control" placeholder="Email"
                    value="{{ old('email', $user->email) }}">
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
