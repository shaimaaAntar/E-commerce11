@extends('frontend.master')

@section('content')

<div class="container py-5">

    <div class="row">

        {{-- Product Image --}}
        <div class="col-md-6">
            @if ($product->images->isNotEmpty())
                <img
                    src="{{ asset('storage/' . $product->images->first()->path) }}"
                    alt="{{ $product->name }}"
                    class="img-fluid"
                >
            @else
                <p>No image available</p>
            @endif
        </div>

        {{-- Product Details --}}
        <div class="col-md-6">

            <h2>{{ $product->name }}</h2>

            <p>
                Category:
                {{ $product->category->name ?? 'Uncategorized' }}
            </p>

            <h4>
                @if ($product->discount_price &&
                     $product->discount_price < $product->price)

                    <span>
                        ${{ number_format($product->discount_price, 2) }}
                    </span>

                    <del>
                        ${{ number_format($product->price, 2) }}
                    </del>

                @else
                    ${{ number_format($product->price, 2) }}
                @endif
            </h4>

            <p>{{ $product->short_description }}</p>

            <div class="mt-3">
                {!! nl2br(e($product->description)) !!}
            </div>

            <p class="mt-3">
                Stock: {{ $product->stock }}
            </p>

            <button class="btn btn-primary" disabled>
                Add to Cart (Coming Soon)
            </button>

        </div>

    </div>

</div>

@endsection