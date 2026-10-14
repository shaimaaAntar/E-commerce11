<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    public function store(array $data): Category
    {
        return Category::create($data);
    }
    public function getQuery()
    {
        return Category::query();
    }
}