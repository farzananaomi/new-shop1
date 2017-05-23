<?php

namespace App\Data\Repositories;

use App\Data\Models\Category;
use App\Data\Repositories\Interfaces\PaginatedResultInterface;
use App\Data\Repositories\Interfaces\RawQueryBuilderOutputInterface;
use App\Data\Repositories\Traits\PaginatedOutputTrait;
use App\Data\Repositories\Traits\ProcessOutputTrait;
use App\Data\Repositories\Traits\RawQueryBuilderOutputTrait;


class CategoryRepository implements PaginatedResultInterface, RawQueryBuilderOutputInterface
{
    use ProcessOutputTrait, PaginatedOutputTrait, RawQueryBuilderOutputTrait;

    public function search($filter = [])
    {
        $categories = Category::query();

        return $this->output($categories);
    }
    public function lists()
    {
        return Category::pluck('name', 'id');
    }
    public function find($id)
    {
        return Category::find($id);
    }
    public function all()
    {
        return Category::all();
    }

    public function store($data)
    {
        $category             = new Category();
        $category->name      = $data['name'];
        $category->description = $data['description'];

        $category->save();

        return $category;
    }
}