<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 6/1/2017
 * Time: 3:41 PM
 */

namespace App\DataTables;


use App\Data\Repositories\UserRepository;
use Illuminate\Contracts\view\Factory;
use Yajra\Datatables\Datatables;
use Yajra\Datatables\Services\DataTable;

class UserDatatable extends DataTable
{
    protected $users;

    public function __construct(Datatables $datatables, Factory $viewFactory, UserRepository $users)
    {
        parent::__construct($datatables, $viewFactory);
        $this->users = $users;
        $this->users->setEnableRawOutput(true);
    }

    /**
     * Build DataTable class.
     *
     * @return \Yajra\Datatables\Engines\BaseEngine
     */
    public function dataTable()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', function ($user) {
                return view('users.action', compact('user'))->render();
            })
            ->make(true);
    }

    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $query = $this->users->search();

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
                        'dom'     => '<"top"lf<"clearfix">><"table-responsive table-full-width"t><"bottom"<"clearfix">ip><"clearfix"r>',
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
            [ 'name' => 'users.name', 'data' => 'name', 'title' => 'Name', ],
            [ 'name' => 'users.username', 'data' => 'username', 'title' => 'Username', ],
            [ 'name' => 'users.role', 'data' => 'role', 'title' => 'Super', ],
            [ 'name' => 'users.contact', 'data' => 'contact', 'title' => 'Operation' ],
            [ 'name' => 'users.email', 'data' => 'email', 'title' => 'Region' ],
            [ 'name' => 'users.address', 'data' => 'address', 'title' => 'Activity' ],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'user_' . time();
    }
}