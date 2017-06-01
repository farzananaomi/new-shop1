<?php

namespace App\Data\Repositories;

use App\Data\Models\User;
use App\Data\Repositories\Interfaces\PaginatedResultInterface;
use App\Data\Repositories\Interfaces\RawQueryBuilderOutputInterface;
use App\Data\Repositories\Traits\PaginatedOutputTrait;
use App\Data\Repositories\Traits\ProcessOutputTrait;
use App\Data\Repositories\Traits\RawQueryBuilderOutputTrait;


class UserRepository implements PaginatedResultInterface, RawQueryBuilderOutputInterface
{
    use ProcessOutputTrait, PaginatedOutputTrait, RawQueryBuilderOutputTrait;

    public function search($filter = [])
    {
        $users = User::query();

        return $this->output($users);
    }

    public function find($id)
    {
        return User::find($id);
    }

    public function store($data)
    {
        $user                   = new User();
        $user->name    = $data['name'];
        $user->role = $data['role'];
        $user->username = $data['username'];
        $user->contact       = $data['contact'];
        $user->additional_no     = $data['additional_no'];
        $user->address       = $data['address'];
        $user->email         = $data['email'];
       $user->password = bcrypt($data['password']);;

        $user->save();

        return $user;

    }

}