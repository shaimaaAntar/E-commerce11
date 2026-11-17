<?php

namespace App\Http\Controllers;

use App\Models\Product;

class frontEndController extends Controller
{
    public function home()
    {
        $products = Product::with(['category', 'images'])
            ->where('status', true)
            ->where('stock', '>', 0)
            ->latest()
            ->take(8)
            ->get();

        return view('frontend.index', compact('products'));
    }
}