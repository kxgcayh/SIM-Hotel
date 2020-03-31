@extends('layouts.mtpro', (['title' => 'Province List']))

@section('content')

{{-- Bread crumb and right sidebar toggle --}}
<x-bread-crumb title="Edit Province">
    <x-bc-item field="Home" />
    <x-bc-item field="Data Location" />
    <x-bc-item field="Provinces" />
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
                        Province Name:
                    </label>
                    <div class="col-lg-9 col-12">
                        <p class="form-control-static">
                            {{ $province->name }}
                        </p>
                    </div>
                </div>
            </div>
        </form>
    </x-half-card>
    <x-half-card title="Edit Default Data">
        <hr class="mt-0">
        <form action="{{ route('admin.provinces.update', $province->slug) }}" class="form-material" method="POST"
            role="form">
            @csrf
            @method('PUT')
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Province Name" name="name"
                    value="{{ $province->name }}">
            </div>
            <x-button type="primary pull-right" field="Submit" />
        </form>
    </x-half-card>
</div>

@endsection
