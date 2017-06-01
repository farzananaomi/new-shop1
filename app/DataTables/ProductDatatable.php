<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 5/23/2017
 * Time: 4:21 PM
 */

namespace App\DataTables;

use App\Data\Repositories\ProductRepository;
use Illuminate\Contracts\view\Factory;
use Yajra\Datatables\Datatables;
use Yajra\Datatables\Services\DataTable;

class ProductDatatable extends DataTable
{
    /**
     * @var ProductRepository
     */
    protected $products;

    public function __construct(Datatables $datatables, Factory $viewFactory, ProductRepository $repo)
    {
        parent::__construct($datatables, $viewFactory);
        $this->products = $repo;
        $this->products->setEnableRawOutput(true);
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
            ->addColumn('action', function ($product) {
                return view('products.action', compact('product'))->render();
            })

            ->addColumn('category_id', function ($m) {
                return $m->category ? $m->category->name : '';
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
        $query = $this->products->search();

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
            [ 'name' => 'products.category_id', 'data' => 'category_id', 'title' => 'Category Name' ],
            [ 'name' => 'products.product_name', 'data' => 'product_name', 'title' => 'Product Name' ],
            [ 'name' => 'products.description', 'data' => 'description', 'title' => 'Product description' ],
            [ 'name' => 'products.size', 'data' => 'size', 'title' => 'Size' ],

        ];
    }
    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'product_' . time();
    }


}