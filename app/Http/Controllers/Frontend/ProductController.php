<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{

     public function show($slug)
     {
         $product = Product::with(['category', 'images'])
             ->where('slug', $slug)
             ->where('status', true)
             ->firstOrFail();

         return view('frontend.products.show', compact('product'));
     }
//    public function show($slug)
//    {
//        dd([
//            'slug_from_url' => $slug,
//            'product' => Product::where('slug', $slug)->first(),
//        ]);
//    }
}
