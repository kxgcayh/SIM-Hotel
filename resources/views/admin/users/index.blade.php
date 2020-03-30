@extends('layouts.mtpro', (['title' => 'User List']))

@section('content')

{{-- Bread crumb and right sidebar toggle --}}
<x-bread-crumb title="Data Users">
    <x-bc-item field="Home" />
    <x-bc-item field="Management Account" />
    <x-bc-item-active field="Users" />
    <x-slot name="button">
        <x-button type="primary" field="Create" />
    </x-slot>
</x-bread-crumb>
{{-- End Bread crumb and right sidebar toggle --}}

<x-card-content title="List User" subtitle="User has been registered on Application">
    <div class="table-responsive m-t-40">
        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th width="100px">Action</th>
                </tr>
            </thead>
            <tbody>
                {{--  --}}
            </tbody>
        </table>
</x-card-content>
@endsection

@push('scripts')
<script type="text/javascript">
    $(function () {

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('users.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });

    });

</script>
@endpush
