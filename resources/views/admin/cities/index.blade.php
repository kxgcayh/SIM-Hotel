@extends('layouts.mtpro', (['title' => 'City List']))

@section('content')

{{-- Bread crumb and right sidebar toggle --}}
<x-bread-crumb title="Data Cities">
    <x-bc-item field="Home" />
    <x-bc-item field="Data Location" />
    <x-bc-item-active field="Cities" />
    <x-slot name="button">
        <x-modal-button id="create" class="primary" icon="mdi mdi-plus" name="Create" />
        <x-modal id="create" class="primary" title="Create City Data">
            <form role="form" action="{{ route('admin.cities.store') }}" method="POST" class="form-material">
                @csrf
                <div class="form-group">
                    <label for="province_id">Province</label>
                    <select name="province_id" id="province_id" required
                        class="form-control {{ $errors->has('province_id') ? 'is-invalid':'' }}">
                        <option value=""></option>
                        @foreach ($provinces as $province)
                        <option value="{{ $province->id_province }}">{{ ucfirst($province->name) }}</option>
                        @endforeach
                    </select>
                    <p class="text-danger">{{ $errors->first('province_id') }}</p>
                </div>
                <div class="form-group">
                    <input name="name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}"
                        placeholder="City Name">
                </div>
                <x-button type="primary" field="Submit" />
            </form>
        </x-modal>
    </x-slot>
</x-bread-crumb>
{{-- End Bread crumb and right sidebar toggle --}}

<x-card-content title="City List" subtitle="Data to Store City List">
    <div class="table-responsive m-t-40">
        <table id="province-table" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0"
            width="100%">
            <thead>
                <tr>
                    <th width="5%">No.</th>
                    <th width="25%">Province</th>
                    <th width="50%">City Name</th>
                    <th width=" 45%">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($cities as $city)
                <tr>
                    <td>{{ ++$no }}</td>
                    <td>{{ $city->province['name'] }}</td>
                    <td>{{ $city->name }}</td>
                    <td>
                        <form action="{{ route('admin.cities.destroy', $city->slug) }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <x-a-button class="warning" :href="route('admin.cities.edit', $city->slug )">
                                Edit
                            </x-a-button>
                            <x-button type="danger" field="Delete" />
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">Data City is Empty</td>
                </tr>
                @endforelse
            </tbody>
        </table>
</x-card-content>
@endsection
