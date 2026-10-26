<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\Category;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
class ProductController extends Controller
{ 
    private ProductRepository $repository;
    public function __construct(ProductRepository $repository)
    {
         $this->repository=$repository;
    }
    /**
     * Display a listing of the resource.
     */
   
public function index(Request $request)
{
    if ($request->ajax()) {
        return DataTables::of(Product::with(['category', 'images']))
            ->addIndexColumn()
            ->addColumn('images', function ($row) {
                if ($row->images->isEmpty()) {
                    return '<span class="text-muted">No images</span>';
                }

                $html = '';

                foreach ($row->images as $image) {
                    $url = asset('storage/' . $image->path);

                    $html .= '<img src="' . e($url) . '"
                        alt="' . e($row->name) . '"
                        width="50"
                        height="50"
                        style="object-fit: cover; margin: 2px; border-radius: 4px;">';
                }

                return $html;
            })
            ->addColumn('category', function ($row) {
                return $row->category->name ?? '-';
            })
            ->addColumn('status', function ($row) {
                return $row->status
                    ? '<span class="badge badge-success">Active</span>'
                    : '<span class="badge badge-secondary">Inactive</span>';
            })
            ->addColumn('action', function ($row) {
                return '
                    <a href="'.route('products.edit', $row->id).'"
                    class="btn btn-sm btn-primary">
                        Edit
                    </a>

                    <button type="button"
                            data-url="'.route('products.destroy', $row->id).'"
                            class="btn btn-sm btn-danger delete">
                        Delete
                    </button>
                ';
            })
            ->rawColumns(['images', 'status', 'action'])
            ->make(true);
    }

    return view('dashboard.products.index');
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $categories = Category::all();

    return view('dashboard.products.add', compact('categories'));
}
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $this->repository->store($request->validated());

        return redirect()
            ->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();

        return view('dashboard.products.edit', compact(
            'product',
            'categories'
        ));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request,Product $product) {
        $this->repository->update(
            $product,
        $request->validated()
    );

        return redirect()
            ->route('products.index')
            ->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
       $this->repository->destroy($product);
         return redirect()
        ->route('products.index')
        ->with('success', 'Product deleted successfully.');
    }
}
