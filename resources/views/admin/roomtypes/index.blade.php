@extends('layouts.mtpro', (['title' => 'Room Type List']))

@section('content')

{{-- Bread crumb and right sidebar toggle --}}
<x-bread-crumb title="Data Room Types">
    <x-bc-item field="Home" />
    <x-bc-item field="Management Rooms" />
    <x-bc-item-active field="Room Types" />
    <x-slot name="button">
        <x-modal-button id="create" class="primary" icon="mdi mdi-plus" name="Create" />
        <x-modal id="create" class="primary" title="Create Room Type Data">
            <form role="form" action="{{ route('admin.roomtypes.store') }}" method="POST" class="form-material">
                @csrf
                <div class="form-group">
                    <select name="facility_id" id="facility_id" required class="form-control">
                        <option hidden>Facility</option>
                        @foreach ($facilities as $facility)
                        <option value="{{ $facility->id_facility }}">{{ ucfirst($facility->name) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <input name="name" type="text" class="form-control" placeholder="Room Type Name">
                </div>
                <x-button type="primary" field="Submit" />
            </form>
        </x-modal>
    </x-slot>
</x-bread-crumb>
{{-- End Bread crumb and right sidebar toggle --}}

{{-- Content --}}
<x-card-content title="Room Type List" subtitle="Data to Store Room Type in Room">
    <div class="table-responsive m-t-40">
        <table id="province-table" class="display nowrap table table-hover table-striped table-bordered text-center"
            cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th width="5%" class="text-center">No.</th>
                    <th width="25%" class="text-center">Facility</th>
                    <th width="50%" class="text-center">Room Type Name</th>
                    <th width=" 45%" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($types as $type)
                <tr>
                    <td>{{ ++$no }}.</td>
                    <td>{{ $type->facility['name'] }}</td>
                    <td>{{ $type->name }}</td>
                    <td>
                        <form action="{{ route('admin.cities.destroy', $type->slug) }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <x-a-button class="warning" :href="route('admin.cities.edit', $type->slug )">
                                Edit
                            </x-a-button>
                            <x-button type="danger" field="Delete" />
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">Data Room Type is Empty</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        {{ $types->links() }}
</x-card-content>
{{-- End of Content --}}
@endsection
