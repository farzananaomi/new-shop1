<?php

namespace App\Http\Controllers;

use App\Data\Models\Invoice;
use App\Data\Repositories\CategoryRepository;
use App\Data\Repositories\InvoiceRepository;
use App\DataTables\InvoiceDatatable;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Redirect;

use PDF;
use Illuminate\Http\Request;



class InvoiceController extends Controller
{
    /**
     * @var \App\Data\Repositories\StockRepository
     */

    protected $invoices;
    protected $categories;

    public function __construct(InvoiceRepository $invoices, CategoryRepository $categories)
    {
        $this->invoices = $invoices;
        $this->categories = $categories;
    }

    public function index()
    {
        $invoices = Invoice::orderBy('created_at', 'desc')
            ->paginate(8);

        return view('invoices.index', compact('invoices'));
    }

    public function create()
    {
        return view('invoices.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        //  dd($data);
        $invoice = $this->invoices->store($data);

          return Redirect::to('invoices/'.$invoice->id.'/');

    }

    /* public function show($id)
     {
         $invoice = $this->invoices->find($id);

         return view('invoices.show', compact('invoice'));
     }*/
    public function show($id, Request $request)
    {
        $invoice = $this->invoices->find($id);

        if ($request->has('download')) {
            $pdf = PDF::loadView('invoices.export', compact('invoice'));
            return $pdf->download("invoice".$invoice->id.".pdf");
        }

        return view('invoices.show', compact('invoice'));
    }

    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
