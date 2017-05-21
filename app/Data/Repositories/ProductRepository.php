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

    public function store($data)
    {
        $product              = new Product();
        $product->category_id = $data['category_id'];
        $product->Product_code  = $data['Product_code'];
        $product->Product_name  = $data['Product_name'];
        $product->unit_price  = $data['unit_price'];


        $product->save();

        return $product;
    }
}
