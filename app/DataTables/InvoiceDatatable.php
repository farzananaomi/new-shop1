<?php

namespace App\DataTables;


use App\Data\Repositories\InvoiceRepository;
use Illuminate\Contracts\view\Factory;
use Yajra\Datatables\Datatables;
use Yajra\Datatables\Services\DataTable;

class InvoiceDatatable extends DataTable
{
    /**
     * @var InvoiceRepository
     */
    protected $invoices;

    public function __construct(Datatables $datatables, Factory $viewFactory, InvoiceRepository $repo)
    {
        parent::__construct($datatables, $viewFactory);
        $this->invoices = $repo;
        $this->invoices->setEnableRawOutput(true);
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
            ->addColumn('action', function ($invoice) {
                return view('invoices.action', compact('invoice'))->render();
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
        $query = $this->invoices->search();

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
            [ 'name' => 'invoices.product_id', 'data' => 'product_id', 'title' => 'Product ID' ],
            [ 'name' => 'invoices.quantity', 'data' => 'quantity', 'title' => 'Quantity' ],
            [ 'name' => 'invoices.unit_price', 'data' => 'unit_price', 'title' => 'Unit Price' ],
            [ 'name' => 'invoices.net_price', 'data' => 'net_price', 'title' => 'Net Price' ],
            [ 'name' => 'invoices.vat', 'data' => 'vat', 'title' => 'Vat' ],
            [ 'name' => 'invoices.discount', 'data' => 'discount', 'title' => 'Discount' ] ,
            [ 'name' => 'invoices.total', 'data' => 'total', 'title' => 'Total' ],
            [ 'name' => 'invoices.sub_total', 'data' => 'sub_total', 'title' => 'Subtotal' ]
        ];
    }
    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'invoice_' . time();
    }



}