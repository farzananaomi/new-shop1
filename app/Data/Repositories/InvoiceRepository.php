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
    public function all()
    {
        return Invoice::all();
    }

    public function store($data)
    {
        $invoice             = new Invoice();
        $invoice->customer_name      = $data['customer_name'];
        $invoice->customer_contact      = $data['customer_contact'];
        $invoice->customer_address    = $data['customer_address'];
        $invoice->invoice_no = $data['invoice_no'];
        $invoice->invoice_date      = $data['invoice_date'];
        $invoice->product_name = $data['product_name'];
        $invoice->quantity      = $data['quantity'];
        $invoice->status      = $data['status'];
        $invoice->unit_price = $data['unit_price'];
        $invoice->quantity = $data['quantity'];
        $invoice->net_price      = $data['unit_price']*$data['quantity'];
        $invoice->vat = $data['vat'];
        $invoice->discount = $data['discount'];
        $invoice->total = (($invoice->net_price) + ($data['vat']/100))-($data['discount']/100) ;
        $invoice->sub_total =$invoice-> sum('total');


        $invoice->save();

        return $invoice;

    }
}