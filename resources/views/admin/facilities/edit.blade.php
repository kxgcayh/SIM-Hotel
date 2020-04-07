@extends('layouts.mtpro', (['title' => 'Edit Facility']))

@section('content')

{{-- Bread crumb and right sidebar toggle --}}
<x-bread-crumb title="Edit Data Facility">
    <x-bc-item field="Home" />
    <x-bc-item field="Management Rooms" />
    <x-bc-item field="Data Rooms" />
    <x-bc-item-active field="Edit" />
    <x-slot name="button">
        <x-a-button class="info" :href="route('admin.facilities.index')">
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
                        Facility Name:
                    </label>
                    <div class="col-lg-9 col-12">
                        <p class="form-control-static">
                            {{ $facility->name }}
                        </p>
                    </div>
                </div>
            </div>
        </form>
    </x-half-card>
    <x-half-card title="Edit Default Data">
        <hr class="mt-0">
        <form action="{{ route('admin.facilities.update', $facility->slug) }}" class="form-material" method="POST"
            role="form">
            @csrf
            @method('PUT')
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Facility Name" name="name"
                    value="{{ old('name', $facility->name) }}">
            </div>
            <x-button type="primary pull-right" field="Submit" />
        </form>
    </x-half-card>
</div>
{{-- End of Content --}}
@endsection
