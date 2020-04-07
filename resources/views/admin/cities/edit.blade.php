@extends('layouts.mtpro', (['title' => 'City List']))

@section('content')

{{-- Bread crumb and right sidebar toggle --}}
<x-bread-crumb title="Edit City">
    <x-bc-item field="Home" />
    <x-bc-item field="Data Location" />
    <x-bc-item field="Cities" />
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
                        Province:
                    </label>
                    <div class="col-lg-9 col-12">
                        <p class="form-control-static">
                            {{ $city->province['name'] }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="control-label">
                        City Name:
                    </label>
                    <div class="col-lg-9 col-12">
                        <p class="form-control-static">
                            {{ $city->name }}
                        </p>
                    </div>
                </div>
            </div>
        </form>
    </x-half-card>
    <x-half-card title="Edit Default Data">
        <hr class="mt-0">
        <form action="{{ route('admin.cities.update', $city->slug) }}" class="form-material" method="POST" role="form">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="province_id">Province</label>
                <select name="province_id" id="province_id" required
                    class="form-control {{ $errors->has('province_id') ? 'is-invalid':'' }}">
                    <option hidden></option>
                    @foreach ($provinces as $province)
                    <option value="{{ $province->id_province }}"
                        {{ $province->id_province == $city->province_id ? 'selected':'' }}>
                        {{ ucfirst($province->name) }}
                    </option>
                    @endforeach
                </select>
                <p class="text-danger">{{ $errors->first('province_id') }}</p>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="City Name" name="name" value="{{ $city->name }}">
            </div>
            <x-button type="primary pull-right" field="Submit" />
        </form>
    </x-half-card>
</div>

@endsection
