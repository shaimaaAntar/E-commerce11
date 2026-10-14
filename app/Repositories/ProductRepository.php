<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    public function store(array $data): Product
    {
        return Product::create($data);
    } 
    public function update(Product $product, array $data): bool
    {
        return $product->update($data);
    }

    public function getQuery()
    {
        return Product::query();
    }
    public function destroy(Product $product): bool
    {
        return $product->delete();
    }
}