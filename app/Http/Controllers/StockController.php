<?php

namespace App\Http\Controllers;

use App\Data\Repositories\StockRepository;
use App\DataTables\BarcodeDatatable;
use App\DataTables\StockDatatable;
use Illuminate\Http\Request;
use PDF;
use DNS1D;
use DNS2D;
class StockController extends Controller
{
    /**
     * @var \App\Data\Repositories\StockRepository
     */

    protected $stocks;

    public function __construct(StockRepository $stocks)
    {
        $this->stocks = $stocks;
    }
    public function index(StockDatatable $datatable)
    {
        return $datatable->render('stocks.index');
    }
    public function printbarcode(BarcodeDatatable $datatable)
    {
        return $datatable->render('barcodes.index');
    }
    public function create()
    {
        return view('stocks.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['created_by'] =auth()->user()->id;
        $stock = $this->stocks->store($data);
      //  dd($stock);
        return redirect()->route('stocks.index');
    }

    public function show($id, Request $request)
    {
        $stock = $this->stocks->find($id);

        if ($request->has('download')) {
            $pdf = PDF::loadView('barcodes.export', compact('stock'));
            return $pdf->download("barcode".$stock->id.".pdf");
        }

        return view('stocks.show', compact('stock'));
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
