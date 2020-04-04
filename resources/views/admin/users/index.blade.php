@extends('layouts.mtpro', (['title' => 'User List']))

@section('content')

{{-- Bread crumb and right sidebar toggle --}}
<x-bread-crumb title="Data Users">
    <x-bc-item field="Home" />
    <x-bc-item field="Management Account" />
    <x-bc-item-active field="Users" />
    <x-slot name="button">
        <x-a-button class="primary" :href="route('admin.users.create')">
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
                    <th width="5%" class="text-center">No</th>
                    <th width="5%" class="text-center">Username</th>
                    <th width="25%" class="text-center">Name</th>
                    <th width="5%" class="text-center">Phone</th>
                    <th width="20%" class="text-center">Email</th>
                    <th width="5%" class="text-center">Level</th>
                    <th width="15%" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $user)
                <tr>
                    <td>{{ ++$no }}.</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->telp }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                        <label class="badge badge-success">{{ $v }}</label>
                        @endforeach
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('admin.users.destroy', $user->id_user) }}" method="POST">
                            @csrf
                            <x-a-button class="warning" :href="route('admin.users.edit', $user->id_user)">
                                <i class="fa fa-edit"></i>
                            </x-a-button>
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-danger" name="delete">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $data->links() }}
</x-card-content>
@endsection
