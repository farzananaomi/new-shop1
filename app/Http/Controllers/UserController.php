<?php

namespace App\Http\Controllers;

use App\Data\Repositories\UserRepository;
use App\DataTables\UserDatatable;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $users;

    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }


    public function index(UserDatatable $datatable)
    {
        return $datatable->render('users.index');
    }

    public function create()
    {
        return view('users.create');
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $user = $this->users->store($data);
        return redirect()->route('users.index');
    }

    /**
     * Display the specified Zone.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->users->find($id);

        return view('category.show', compact('user'));
    }


}
