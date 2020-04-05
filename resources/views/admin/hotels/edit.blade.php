@extends('layouts.mtpro', (['title' => 'Hotel List']))

@section('content')

{{-- Bread crumb and right sidebar toggle --}}
<x-bread-crumb title="Edit Hotel">
    <x-bc-item field="Home" />
    <x-bc-item-active field="Hotel List" />
    <x-bc-item-active field="Edit" />
    <x-slot name="button"></x-slot>
</x-bread-crumb>
{{-- End Bread crumb and right sidebar toggle --}}

<div class="row">
    <x-half-card title="Default Data">
        <hr class="mt-0">
        <form class="form-material" method="POST" role="form">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="control-label">
                        City:
                    </label>
                    <div class="col-lg-9 col-12">
                        <p class="form-control-static">
                            {{ $hotel->city['name'] }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="control-label">
                        Hotel Name:
                    </label>
                    <div class="col-lg-9 col-12">
                        <p class="form-control-static">
                            {{ $hotel->name }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="control-label">
                        Address:
                    </label>
                    <div class="col-lg-9 col-12">
                        <p class="form-control-static">
                            {{ $hotel->address }}
                        </p>
                    </div>
                </div>
            </div>
        </form>
    </x-half-card>
    <x-half-card title="Edit Default Data">
        <hr class="mt-0">
        <form action="{{ route('admin.hotels.update', $hotel->slug) }}" class="form-material" method="POST" role="form">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="city_id">City</label>
                <select name="city_id" id="city_id" class="form-control">
                    <option value=""></option>
                    @foreach ($cities as $city)
                    <option value="{{ $city->id_city }}" {{ $city->id_city == $hotel->city_id ? 'selected':'' }}>
                        {{ ucfirst($city->name) }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Hotel Name" name="name" value="{{ $hotel->name }}">
            </div>
            <div class="form-group">
                <textarea class="form-control" rows=" 5" name="address" id="address"
                    placeholder="Address">{{ $hotel->address }}</textarea>
            </div>
            <x-button type="primary pull-right" field="Submit" />
        </form>
    </x-half-card>
</div>

@endsection
