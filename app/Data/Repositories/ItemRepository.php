<?php

namespace App\Data\Repositories;

use App\Data\Models\Item;


class ItemRepository
{
    public function find($id)
    {
        return Item::find($id);
    }
}