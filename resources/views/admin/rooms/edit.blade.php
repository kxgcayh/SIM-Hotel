@extends('layouts.mtpro', (['title' => 'Edit Room']))

@section('content')

{{-- Bread crumb and right sidebar toggle --}}
<x-bread-crumb title="Edit Data Room">
    <x-bc-item field="Home" />
    <x-bc-item field="Management Rooms" />
    <x-bc-item field="Data Rooms" />
    <x-bc-item-active field="Edit" />
    <x-slot name="button">
        <x-a-button class="info" :href="route('admin.roomtypes.index')">
            Back
        </x-a-button>
    </x-slot>
</x-bread-crumb>
{{-- End Bread crumb and right sidebar toggle --}}

{{-- Content --}}
<div class="row">
    <x-half-card title="Default Data">
        <hr class="mt-0">
        <form class="form-material" method="POST" role="form">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="control-label">
                        Hotel Name:
                    </label>
                    <div class="col-lg-9 col-12">
                        <p class="form-control-static">
                            {{ $room->hotel['name'] }}
                        </p>
                    </div>
                    <label class="control-label">
                        Room Type:
                    </label>
                    <div class="col-lg-9 col-12">
                        <p class="form-control-static">
                            {{ $room->type['name'] }}
                        </p>
                    </div>
                    <label class="control-label">
                        Room Name:
                    </label>
                    <div class="col-lg-9 col-12">
                        <p class="form-control-static">
                            {{ $room->name }}
                        </p>
                    </div>
                    <label class="control-label">
                        Price:
                    </label>
                    <div class="col-lg-9 col-12">
                        <p class="form-control-static">
                            {{ $room->price }}
                        </p>
                    </div>
                </div>
            </div>
        </form>
    </x-half-card>
    <x-half-card title="Edit Default Data">
        <hr class="mt-0">
        <form action="{{ route('admin.rooms.update', $room->slug) }}" class="form-material" method="POST" role="form">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="hotel_id">Hotel</label>
                <select name="hotel_id" id="hotel_id" required class="form-control">
                    <option hidden></option>
                    @foreach ($hotels as $hotel)
                    <option value="{{ $hotel->id_province }}" {{ $hotel->id_hotel == $room->hotel_id ? 'selected':'' }}>
                        {{ ucfirst($hotel->name) }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="room_type_id">Room Type</label>
                <select name="room_type_id" id="room_type_id" required class="form-control">
                    <option hidden></option>
                    @foreach ($types as $type)
                    <option value="{{ $type->id_province }}"
                        {{ $type->id_room_type == $room->room_type_id ? 'selected':'' }}>
                        {{ ucfirst($type->name) }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Room Name" name="name"
                    value="{{ old('name', $room->name) }}">
            </div>
            <div class="form-group">
                <input class="form-control" type="numeric" id="price" name="price" placeholder="Price"
                    value="{{ old('price', $room->price) }}">
            </div>
            <x-button type="primary pull-right" field="Submit" />
        </form>
    </x-half-card>
</div>
{{-- End of Content --}}
@endsection
