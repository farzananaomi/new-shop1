<?php

namespace App\Http\Controllers;

use App\Data\Repositories\InvoiceREpository;
use App\Data\Repositories\ItemRepository;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    protected $invoices;
    protected $items;

    public function __construct(InvoiceRepository $invoices, ItemRepository $items)
    {
        $this->items = $items;
        $this->invoices = $invoices;
    }
    public function itemList($id, Request $request)
    {
        $data            = $request->all();
        $data['id']      = $id;


        $invoice = $this->invoices->storeItem($data);

        return back()->withInput();
    }
}
