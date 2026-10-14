<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\CategoryRepository;
use App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller
{

     private CategoryRepository $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    /**
     * Display a listing of the resource.
     */
  
        public function index(Request $request)
    {
        if ($request->ajax()) {

            $categories = $this->categoryRepository->getQuery();

            return DataTables::of($categories)
                ->addIndexColumn()
                ->addColumn('action', function ($category) {

                    return '
                        <a href="' . route('categories.edit', $category->id) . '"
                        class="btn btn-sm btn-primary">
                            Edit
                        </a>

                        <form action="' . route('categories.destroy', $category->id) . '"
                            method="POST"
                            style="display:inline-block">

                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '

                            <button type="submit"
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm(\'Are you sure?\')">
                                Delete
                            </button>
                        </form>
                    ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('dashboard.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.categories.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $this->categoryRepository->store($request->validated());

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
