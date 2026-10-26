@extends('dashboard.master')

@section('content')

<div class="card">
    <div class="card-body">

        <h5 class="card-title mb-4">Add Product</h5>

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Category --}}
            <div class="form-group mb-3">
                <label for="category_id">Category</label>

                <select name="category_id" id="category_id" class="form-control">
                    <option value="">Select Category</option>

                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>

                @error('category_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Name --}}
            <div class="form-group mb-3">
                <label for="name">Product Name</label>

                <input
                    type="text"
                    name="name"
                    id="name"
                    class="form-control"
                    value="{{ old('name') }}"
                >

                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        <div class="form-group mb-3">
            <label for="images">Product Images</label>

            <input
                type="file"
                name="images[]"
                id="images"
                class="form-control"
                accept="image/*"
                multiple
            >

            @error('images')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            @error('images.*')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

            {{-- Slug --}}
            <div class="form-group mb-3">
                <label for="slug">Slug</label>

                <input
                    type="text"
                    name="slug"
                    id="slug"
                    class="form-control"
                    value="{{ old('slug') }}"
                >

                @error('slug')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- SKU --}}
            <div class="form-group mb-3">
                <label for="sku">SKU</label>

                <input
                    type="text"
                    name="sku"
                    id="sku"
                    class="form-control"
                    value="{{ old('sku') }}"
                >

                @error('sku')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Short Description --}}
            <div class="form-group mb-3">
                <label for="short_description">Short Description</label>

                <textarea
                    name="short_description"
                    id="short_description"
                    class="form-control"
                    rows="3"
                >{{ old('short_description') }}</textarea>

                @error('short_description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Description --}}
            <div class="form-group mb-3">
                <label for="description">Description</label>

                <textarea
                    name="description"
                    id="description"
                    class="form-control"
                    rows="5"
                >{{ old('description') }}</textarea>

                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Price --}}
            <div class="form-group mb-3">
                <label for="price">Price</label>

                <input
                    type="number"
                    name="price"
                    id="price"
                    class="form-control"
                    step="0.01"
                    min="0"
                    value="{{ old('price') }}"
                >

                @error('price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Discount Price --}}
            <div class="form-group mb-3">
                <label for="discount_price">Discount Price</label>

                <input
                    type="number"
                    name="discount_price"
                    id="discount_price"
                    class="form-control"
                    step="0.01"
                    min="0"
                    value="{{ old('discount_price') }}"
                >

                @error('discount_price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Stock --}}
            <div class="form-group mb-3">
                <label for="stock">Stock</label>

                <input
                    type="number"
                    name="stock"
                    id="stock"
                    class="form-control"
                    min="0"
                    value="{{ old('stock', 0) }}"
                >

                @error('stock')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Status --}}
            <div class="form-group mb-4">
                <label for="status">Status</label>

                <select name="status" id="status" class="form-control">
                    <option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>
                        Active
                    </option>

                    <option value="0" {{ old('status') === '0' ? 'selected' : '' }}>
                        Inactive
                    </option>
                </select>

                @error('status')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                Save Product
            </button>

            <a href="{{ route('products.index') }}" class="btn btn-secondary">
                Cancel
            </a>

        </form>

    </div>
</div>

@endsection