@extends('dashboard.master')

@section('content')

<div class="card">
    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0">Products</h5>

            <a href="{{ route('products.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i>
                Add Product
            </a>
        </div>

        <table class="table table-striped table-hover table-bordered" id="products-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>SKU</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Status</th>
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

        $('#products-table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,

            ajax: "{{ route('products.index') }}",

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
                    data: 'category',
                    name: 'category'
                },
                {
                    data: 'sku',
                    name: 'sku'
                },
                {
                    data: 'price',
                    name: 'price'
                },
                {
                    data: 'stock',
                    name: 'stock'
                },
                {
                    data: 'status',
                    name: 'status',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ]
        });

    });

    $('#products-table').on('click', '.delete', function (e) {
    e.preventDefault();

    let url = $(this).data('url');

    if (confirm('Are you sure you want to delete this product?')) {
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                _method: 'DELETE',
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                $('#products-table').DataTable().ajax.reload();
                alert('Product deleted successfully');
            },
            error: function (xhr) {
                alert('Something went wrong. Status: ' + xhr.status);
                console.log(xhr.responseText);
            }
        });
    }
});
</script>

@endpush