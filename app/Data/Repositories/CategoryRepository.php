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
    const DEFAULT_OPERATION_ID = 1;
    public function search($filter = [])
    {
        $categories = Category::query();

        return $this->output($categories);
    }
    public function lists()
    {
        return Category::where('parent_id',0)->pluck('name', 'id');
    }
    public function sub_lists($id)
    {
        return Category::where('parent_id',$id)->pluck('name', 'id');
    }
    public function find($id)
    {
        return Category::find($id);
    }
    public function all()
    {
        return Category::where('type', '=', 'main')
            ->with('subCategories')
            ->get();
    }
    public function listMainCategories()
    {
        return Category::where('type', '=', 'main')->pluck('name', 'id');
    }

    public function listSubCategories($id)
    {
        $category = Category::where('id', '=', $id)->pluck('name', 'id')->toArray();
        $subCategories = Category::where('parent_id', '=', $id)->pluck('name', 'id')->toArray();

        return $category + $subCategories;
    }

    public function store($data)
    {
        $parentId = sanitize(@$data['parent_id'], self::DEFAULT_OPERATION_ID);
        if (sanitize(@$data['type'], 'main') == 'main') {
            $parentId = self::DEFAULT_OPERATION_ID;
        } else {
            $parentId = $parentId;
        }

        $category              = new Category;
        $category->name        = $data['name'];
        $category->parent_id   = $parentId;
        $category->type        = $data['type']; 'main';
        $category->description = $data['description'];

        $category->save();

        return $category;
    }
}