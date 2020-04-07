@extends('layouts.mtpro', (['title' => 'Room List']))

@section('content')

{{-- Bread crumb and right sidebar toggle --}}
<x-bread-crumb title="Data Rooms">
    <x-bc-item field="Home" />
    <x-bc-item field="Management Rooms" />
    <x-bc-item-active field="Rooms" />
    <x-slot name="button">
        <x-modal-button id="create" class="primary" icon="mdi mdi-plus" name="Create" />
        <x-modal id="create" class="primary" title="Create Room Data">
            <form role="form" action="{{ route('admin.rooms.store') }}" method="POST" class="form-material">
                @csrf
                <div class="form-group">
                    <select name="hotel_id" id="hotel_id" required class="form-control">
                        <option hidden>Hotel</option>
                        @foreach ($hotels as $hotel)
                        <option value="{{ $hotel->id_hotel }}">{{ ucfirst($hotel->name) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <select name="room_type_id" id="room_type_id" required class="form-control">
                        <option hidden>Room Type</option>
                        @foreach ($types as $type)
                        <option value="{{ $type->id_room_type }}">{{ ucfirst($type->name) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <input name="name" type="text" class="form-control" placeholder="Room Name">
                </div>
                <div class="form-group">
                    <input class="form-control" type="numeric" id="price" name="price" placeholder="Price">
                </div>
                <x-button type="primary" field="Submit" />
            </form>
        </x-modal>
    </x-slot>
</x-bread-crumb>
{{-- End Bread crumb and right sidebar toggle --}}

{{-- Content --}}
<x-card-content title="Room List" subtitle="Data Room for Reservation">
    <div class="table-responsive m-t-40">
        <table id="province-table" class="display nowrap table table-hover table-striped table-bordered text-center"
            cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th width="5%" class="text-center">No.</th>
                    <th width="15%" class="text-center">Hotel</th>
                    <th width="15%" class="text-center">Room Type</th>
                    <th width="15%" class="text-center">Room Name</th>
                    <th width="10%" class="text-center">Price</th>
                    <th width="15%" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($rooms as $room)
                <tr>
                    <td>{{ ++$no }}.</td>
                    <td>{{ $room->hotel['name'] }}</td>
                    <td>{{ $room->type['name'] }}</td>
                    <td>{{ $room->name }}</td>
                    <td>{{ $room->price }}</td>
                    <td>
                        <form action="{{ route('admin.rooms.destroy', $room->slug) }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <x-a-button class="warning" :href="route('admin.rooms.edit', $room->slug )">
                                Edit
                            </x-a-button>
                            <x-button type="danger" field="Delete" />
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Data Room is Empty</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        {{ $rooms->links() }}
</x-card-content>
{{-- End of Content --}}
@endsection
