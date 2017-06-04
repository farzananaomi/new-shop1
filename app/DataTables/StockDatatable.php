<?php

namespace App\DataTables;


use App\Data\Repositories\StockRepository;
use Illuminate\Contracts\View\Factory;
use Yajra\Datatables\Datatables;
use Yajra\Datatables\Services\DataTable;

class StockDatatable extends DataTable
{
    /**
     * @var StockRepository
     */
    protected $stocks;

    public function __construct(Datatables $datatables, Factory $viewFactory, StockRepository $repo)
    {
        parent::__construct($datatables, $viewFactory);
        $this->stocks = $repo;
        $this->stocks->setEnableRawOutput(true);
    }

    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', function ($stock) {
                return view('stocks.action', compact('stock'))->render();
            })

            ->addColumn('category_id', function ($m) {
                return $m->category ? $m->category->name : '';
            })
            ->addColumn('product_id', function ($m) {
                return $m->product ? $m->product->product_name : '';
            })
            ->make(true);

        /**
         * Get the query object to be processed by dataTables.
         *
         * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
         */
    }

    public function query()
    {
        $query = $this->stocks->search();

        return $this->applyScopes($query);
    }


    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->ajax('')
                    ->addAction([ 'className' => 'td-actions text-right' ])
                    ->parameters([
                        'dom'     => '<"top"lf<"clearfix">><"table-responsive"t><"bottom"<"clearfix">ip><"clearfix"r>',
                        'buttons' => [
                            'reload',
                        ],
                    ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            [ 'name' => 'stocks.category_id', 'data' => 'category_id', 'title' => 'Category' ],
            [ 'name' => 'stocks.product_id', 'data' => 'product_id', 'title' => 'Product' ],
            [ 'name' => 'stocks.buying_price', 'data' => 'buying_price', 'title' => 'Buy Price' ],
            [ 'name' => 'stocks.sell_price', 'data' => 'sell_price', 'title' => 'Sale Price' ],
            [ 'name' => 'stocks.profit_percent', 'data' => 'profit_percent', 'title' => 'Profit Percent' ],
            [ 'name' => 'stocks.vat_rate', 'data' => 'vat_rate', 'title' => 'Vat' ],
            [ 'name' => 'stocks.vat_total', 'data' => 'vat_total', 'title' => 'Vat Total' ],
            [ 'name' => 'stocks.sub_total', 'data' => 'sub_total', 'title' => 'Sub Total' ],
            [ 'name' => 'stocks.stock_in', 'data' => 'stock_in', 'title' => 'Stock In' ],
            [ 'name' => 'stocks.stock_out', 'data' => 'stock_out', 'title' => 'Stock Out' ],
            [ 'name' => 'stocks.stock_balance', 'data' => 'stock_balance', 'title' => 'Stock Balance' ],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'stock_' . time();
    }
}