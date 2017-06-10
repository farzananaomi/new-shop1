<?php


namespace App\Data\Repositories;

use App\Data\Models\Stock;
use App\Data\Repositories\Interfaces\PaginatedResultInterface;
use App\Data\Repositories\Interfaces\RawQueryBuilderOutputInterface;
use App\Data\Repositories\Traits\PaginatedOutputTrait;
use App\Data\Repositories\Traits\ProcessOutputTrait;
use App\Data\Repositories\Traits\RawQueryBuilderOutputTrait;
use Illuminate\Support\Facades\Auth;

class StockRepository implements PaginatedResultInterface, RawQueryBuilderOutputInterface
{
    use ProcessOutputTrait, PaginatedOutputTrait, RawQueryBuilderOutputTrait;

    public function search($filter = [])
    {
        $stocks = Stock::query();

        return $this->output($stocks);
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

        $stock->product_id = $data['product_id'];
        $stock->category_id = $data['category_id'];
        $stock->supplier_id = $data['supplier_id'];
        $stock->created_by = Auth::id();
        $stock->buying_price = $data['buying_price'];
        $stock->profit_percent = $data['profit_percent'];
        $stock->sell_price = ($stock->buying_price *($stock->profit_percent/100))+$stock->buying_price;
        $stock->discount_percent = $data['discount_percent'];
        $stock->flat_discount = $data['flat_discount'];
        $stock->vat_rate = $data['vat_rate'];
        $stock->vat_total = $stock->sell_price *($stock->vat_rate/100);
        $stock->sub_total = $stock->vat_total + $stock->sell_price ;
        $stock->stock_in = $data['stock_in'];
        $stock->stock_out = 0;
        $stock->stock_balance = $stock->stock_in - $stock->stock_out;

        $stock->save();

        return $stock;
    }


}