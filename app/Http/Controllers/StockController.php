<?php

namespace App\Http\Controllers;

use App\Data\Repositories\StockRepository;
use App\DataTables\StockDatatable;
use Illuminate\Http\Request;

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

    public function create()
    {
        return view('stocks.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $stock = $this->stocks->store($data);
        return redirect()->route('stocks.index');
    }

    public function show($id)
    {
        $stock = $this->stocks->find($id);

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
