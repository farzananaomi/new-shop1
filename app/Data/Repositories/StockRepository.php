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
        $stock = new Stock();
        $stock->user_id = $data['user_id'];
        $stock->buying_price = $data['buying_price'];
        $stock->sell_price = $data['sell_price'];
        $stock->profit_percent = $data['profit_percent'];
        $stock->discount_percent = $data['discount_percent'];
        $stock->flat_discount = $data['flat_discount'];
        $stock->vat_rate = $data['vat_rate'];
        $stock->vat_total = $data['vat_total'];
        $stock->sub_total = $data['sub_total'];
        $stock->stock_in = $data['stock_in'];
        $stock->stock_out = $data['stock_out'];
        $stock->stock_balance = $data['stock_balance'];

        $stock->save();

        return $stock;
    }


}