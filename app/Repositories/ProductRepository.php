<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Throwable;

class ProductRepository
{
    public function store(array $data): Product
{
    $images = $data['images'] ?? [];

    unset($data['images']);

    $storedPaths = [];

    try {
        return DB::transaction(function () use ($data, $images, &$storedPaths) {
            $product = Product::create($data);

            foreach ($images as $image) {
                $path = $image->store('products', 'public');

                $storedPaths[] = $path;

                $product->images()->create([
                    'path' => $path,
                ]);
            }

            return $product;
        });
    } catch (Throwable $e) {
        foreach ($storedPaths as $path) {
            Storage::disk('public')->delete($path);
        }

        throw $e;
    }
}
    public function update(Product $product, array $data): bool
    {   
        return $product->update($data);
    }

    public function getQuery()
    {
        return Product::query()->with('images');
    }
    public function destroy(Product $product): bool
    {
        return $product->delete();
    }
}