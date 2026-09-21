@extends('dashboard.master')

@section('content')

<div class="card">
    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0">Categories</h5>

            <a href="{{ route('categories.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i>
                Add Category
            </a>
        </div>

        <table class="table table-striped table-hover table-bordered" id="categories-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody></tbody>
        </table>

    </div>
</div>

@endsection

@push('scripts')
<script>
    $(function () {

        $('#categories-table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,

            ajax: "{{ route('categories.index') }}",

            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'name',
                    name: 'name'
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