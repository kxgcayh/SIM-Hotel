@extends('layouts.mtpro', (['title' => 'Facility List']))

@section('content')

{{-- Bread crumb and right sidebar toggle --}}
<x-bread-crumb title="Data Facilities">
    <x-bc-item field="Home" />
    <x-bc-item field="Management Rooms" />
    <x-bc-item-active field="Facilities" />
    <x-slot name="button">
        <x-modal-button id="create" class="primary" icon="mdi mdi-plus" name="Create" />
        <x-modal id="create" class="primary" title="Create Facility Data">
            <form role="form" action="{{ route('admin.facilities.store') }}" method="POST" class="form-material">
                @csrf
                <div class="form-group">
                    <input name="name" type="text" class="form-control" placeholder="Facility Name">
                </div>
                <x-button type="primary" field="Submit" />
            </form>
        </x-modal>
    </x-slot>
</x-bread-crumb>
{{-- End Bread crumb and right sidebar toggle --}}

<x-card-content title="Facility List" subtitle="Data to Store Facility in Room">
    <div class="table-responsive m-t-40">
        <table id="province-table" class="display nowrap table table-hover table-striped table-bordered text-center"
            cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th width="5%" class="text-center">No.</th>
                    <th width="50%" class="text-center">Facility Name</th>
                    <th width=" 45%" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($facilities as $facility)
                <tr>
                    <td>{{ ++$no }}</td>
                    <td>{{ $facility->name }}</td>
                    <td>
                        <form action="{{ route('admin.facilities.destroy', $facility->slug) }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <x-a-button class="warning" :href="route('admin.facilities.edit', $facility->slug )">
                                Edit
                            </x-a-button>
                            <x-button type="danger" field="Delete" />
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3">Facility is empty</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        {{ $facilities->links() }}
</x-card-content>
@endsection
