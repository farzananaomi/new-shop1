<?php

namespace App\Http\Controllers;

use App\Data\Repositories\InvoiceREpository;
use App\DataTables\InvoiceDatatable;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * @var \App\Data\Repositories\StockRepository
     */

    protected $invoices;

    public function __construct(InvoiceRepository $invoices)
    {
        $this->invoices = $invoices;
    }
    public function index(InvoiceDatatable $datatable)
    {
        return $datatable->render('invoices.index');
    }

    public function create()
    {
        return view('invoices.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $invoice = $this->invoices->store($data);
        return redirect()->route('stocks.index');
    }

    public function show($id)
    {
        $invoice = $this->invoices->find($id);

        return view('invoices.show', compact('invoice'));
    }

    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
