@extends('layouts.mtpro', (['title' => 'Province List']))

@section('content')

{{-- Bread crumb and right sidebar toggle --}}
<x-bread-crumb title="Data Provinces">
    <x-bc-item field="Home" />
    <x-bc-item field="Data Location" />
    <x-bc-item-active field="Provinces" />
    <x-slot name="button">
        <x-modal-button id="create" class="primary" icon="mdi mdi-plus" name="Create" />
        <x-modal id="create" class="primary" title="Create Province Data">
            <form role="form" action="{{ route('admin.provinces.store') }}" method="POST" class="form-material">
                @csrf
                <div class="form-group">
                    <input name="name" type="text" id="id_province"
                        class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" placeholder="Province Name">
                </div>
                <x-button type="primary" field="Submit" />
            </form>
        </x-modal>
    </x-slot>
</x-bread-crumb>
{{-- End Bread crumb and right sidebar toggle --}}

<x-card-content title="Province List" subtitle="Data to Store City List">
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
                        <form action="{{ route('admin.provinces.destroy', $province->id_province) }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <x-a-button class="warning" :href="route('admin.provinces.edit', $province->slug )">
                                Edit
                            </x-a-button>
                            <x-button type="danger" field="Delete" />
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
</x-card-content>
@endsection
