<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 6/13/2017
 * Time: 3:54 PM
 */

namespace App\DataTables;


use App\Data\Repositories\CategoryRepository;
use Illuminate\Contracts\view\Factory;
use Yajra\Datatables\Datatables;
use Yajra\Datatables\Services\DataTable;

class CategoryDatatable extends DataTable
{
    /**
     * @var CategoryRepository
     */
    protected $categories;

    public function __construct(Datatables $datatables, Factory $viewFactory, CategoryRepository $repo)
    {
        parent::__construct($datatables, $viewFactory);
        $this->categories = $repo;
        $this->categories->setEnableRawOutput(true);
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
            ->addColumn('action', function ($category) {
                return view('categories.action', compact('category'))->render();
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
        $query = $this->categories->search();

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
           // [ 'name' => 'categories.category_id', 'data' => 'category_id', 'title' => 'Category Name' ],
            [ 'name' => 'categories.name', 'data' => 'name', 'title' => 'Product Name' ],
            [ 'name' => 'categories.description', 'data' => 'description', 'title' => 'Product description' ],
            [ 'name' => 'categories.parent_id', 'data' => 'parent_id', 'title' => 'Size' ],

        ];
    }
    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'category_' . time();
    }


}