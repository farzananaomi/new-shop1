<?php


namespace App\Data\Repositories;

use App\Data\Models\Stock;
use App\Data\Repositories\Interfaces\PaginatedResultInterface;
use App\Data\Repositories\Interfaces\RawQueryBuilderOutputInterface;
use App\Data\Repositories\Traits\PaginatedOutputTrait;
use App\Data\Repositories\Traits\ProcessOutputTrait;
use App\Data\Repositories\Traits\RawQueryBuilderOutputTrait;

class StockRepository implements PaginatedResultInterface, RawQueryBuilderOutputInterface
{
    use ProcessOutputTrait, PaginatedOutputTrait, RawQueryBuilderOutputTrait;

    public function search($filter = [])
    {
        $drivers = Stock::query();

        return $this->output($drivers);
    }

    public function find($id)
    {
        return Stock::find($id);
    }
    public function all()
    {
        return Stock::all();
    }

    public function store($data)
    {
        $stock              = new Stock();
        $stock->category_id = $data['category_id'];
        $stock->product_id  = $data['product_id'];
        $stock->stock_in    = $data['stock_in'];
        $stock->sold        = $data['sold'];
        $stock->stock_out   = $data['stock_in']-$data['sold'];


        $stock->save();

        return $stock;
    }


}