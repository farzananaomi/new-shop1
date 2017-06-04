<?php

namespace App\DataTables;

use App\Data\Repositories\UserRepository;
use Illuminate\Contracts\view\Factory;
use Yajra\Datatables\Datatables;
use Yajra\Datatables\Services\DataTable;

class UserDatatable extends DataTable
{
    /**
     * @var UserRepository
     */
    protected $users;

    public function __construct(Datatables $datatables, Factory $viewFactory, UserRepository $repo)
    {
        parent::__construct($datatables, $viewFactory);
        $this->users = $repo;
        $this->users->setEnableRawOutput(true);
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
            ->addColumn('action', function ($user) {
                return view('users.action', compact('user'))->render();
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
            [ 'name' => 'users.name', 'data' => 'name', 'title' => 'Name' ],
            [ 'name' => 'users.role', 'data' => 'role', 'title' => 'User Type' ],
            [ 'name' => 'users.username', 'data' => 'username', 'title' => 'Username' ],
            [ 'name' => 'users.contact', 'data' => 'contact', 'title' => 'Contact' ],
            [ 'name' => 'users.address', 'data' => 'address', 'title' => 'Address' ],
            [ 'name' => 'users.email', 'data' => 'email', 'title' => 'Email' ],

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
