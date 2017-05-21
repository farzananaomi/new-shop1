<?php

namespace App\Data\Repositories;

use App\Data\Models\Invoice;
use App\Data\Repositories\Interfaces\PaginatedResultInterface;
use App\Data\Repositories\Interfaces\RawQueryBuilderOutputInterface;
use App\Data\Repositories\Traits\PaginatedOutputTrait;
use App\Data\Repositories\Traits\ProcessOutputTrait;
use App\Data\Repositories\Traits\RawQueryBuilderOutputTrait;

class InvoiceREpository implements PaginatedResultInterface, RawQueryBuilderOutputInterface
{
    use ProcessOutputTrait, PaginatedOutputTrait, RawQueryBuilderOutputTrait;

    public function search($filter = [])
    {
        $categories = Invoice::query();

        return $this->output($categories);
    }

    public function find($id)
    {
        return Invoice::find($id);
    }

    public function store($data)
    {
        $invoice             = new Invoice();
        $invoice->title      = $data['title'];
        $invoice->desciption = $data['desciption'];

        $invoice->save();

        return $invoice;

    }
}