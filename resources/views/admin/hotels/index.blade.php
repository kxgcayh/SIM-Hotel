@extends('layouts.mtpro', (['title' => 'Hotel List']))

@section('content')

{{-- Bread crumb and right sidebar toggle --}}
<x-bread-crumb title="Data Hotels">
    <x-bc-item field="Home" />
    <x-bc-item-active field="Hotel List" />
    <x-slot name="button">
        <x-modal-button id="create" class="primary" icon="mdi mdi-plus" name="Create" />
        <x-modal id="create" class="primary" title="Create Hotel Data">
            <form role="form" action="{{ route('admin.hotels.store') }}" method="POST" class="form-material">
                @csrf
                <div class="form-group">
                    <label for="city_id">City</label>
                    <select name="city_id" id="city_id" required class="form-control">
                        <option value=""></option>
                        @foreach ($cities as $city)
                        <option value="{{ $city->id_city }}">{{ ucfirst($city->name) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <input name="name" type="text" class="form-control" placeholder="City Name">
                </div>
                <x-button type="primary" field="Submit" />
            </form>
        </x-modal>
    </x-slot>
</x-bread-crumb>
{{-- End Bread crumb and right sidebar toggle --}}

<x-card-content title="Hotel List" subtitle="Data to Hotel City List">
    <div class="table-responsive m-t-40">
        <table id="province-table" class="display nowrap table table-hover table-striped table-bordered text-center"
            cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th width="5%" class="text-center">No.</th>
                    <th width="10%" class="text-center">City </th>
                    <th width="10%" class="text-center">Name Hotel</th>
                    <th width="15%" class="text-center">Address</th>
                    <th width="10%" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($hotels as $hotel)
                <tr>
                    <td>{{ ++$no }}</td>
                    <td>{{ $hotel->city['name'] }}</td>
                    <td>{{ $hotel->name }}</td>
                    <td>{{ $hotel->address }}</td>
                    <td>
                        <form action="{{ route('admin.hotels.destroy', $hotel->slug) }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <x-a-button class="warning" :href="route('admin.hotels.edit', $hotel->slug )">
                                Edit
                            </x-a-button>
                            <x-button type="danger" field="Delete" />
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">Data Hotel is Empty</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        {{ $hotels->links() }}
</x-card-content>
@endsection
