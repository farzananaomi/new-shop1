<?php

namespace App\Data\Repositories;

use App\Data\Models\Product;
use App\Data\Repositories\Interfaces\PaginatedResultInterface;
use App\Data\Repositories\Interfaces\RawQueryBuilderOutputInterface;
use App\Data\Repositories\Traits\PaginatedOutputTrait;
use App\Data\Repositories\Traits\ProcessOutputTrait;
use App\Data\Repositories\Traits\RawQueryBuilderOutputTrait;

class ProductRepository implements PaginatedResultInterface, RawQueryBuilderOutputInterface
{
    use ProcessOutputTrait, PaginatedOutputTrait, RawQueryBuilderOutputTrait;

    public function search($filter = [])
    {
        $products = Product::query();

        return $this->output($products);
    }

    public function find($id)
    {
        return Product::find($id);
    }

    public function lists()
    {
        return Product::pluck('product_name', 'id');
    }

    public function store($data)
    {
        $product = new Product();
        $product->category_id = $data['category_id'];
        $product->product_name = $data['product_name'];
        $product->description = $data['description'];
        $product->size = $data['size'];

        $product->save();

        return $product;
    }
}
