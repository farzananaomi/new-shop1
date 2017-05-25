<?php

namespace App\Http\Controllers;

use App\Data\Repositories\CategoryRepository;
use App\Data\Repositories\InvoiceREpository;
use App\DataTables\InvoiceDatatable;
use Carbon\Carbon;
use DB;
use PDF;
use Illuminate\Http\Request;


class InvoiceController extends Controller
{
    /**
     * @var \App\Data\Repositories\StockRepository
     */

    protected $invoices;
    protected $categories;

    public function __construct(InvoiceRepository $invoices,CategoryRepository $categories)
    {
        $this->invoices = $invoices;
        $this->categories = $categories;
    }

    public function index(InvoiceDatatable $datatable)
    {
        $invoices = $this->invoices->all();
        return $datatable->render('invoices.index', compact('invoices'));
    }

    public function create()
    {
        return view('invoices.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $invoice = $this->invoices->store($data);
        return redirect()->route('invoices.index');
    }

   /* public function show($id)
    {
        $invoice = $this->invoices->find($id);

        return view('invoices.show', compact('invoice'));
    }*/
    public function show($id,Request $request)
    {   $category = $this->categories->find($id);

        if($request->has('download')){
            $now = Carbon::now()->toDateTimeString();
            $pdf = PDF::loadView('categories.export', compact('category'));
            return $pdf->download("invoice.pdf");
        }

        return view('categories.show', compact('category'));
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
