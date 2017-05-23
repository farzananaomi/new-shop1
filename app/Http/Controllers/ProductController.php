<?php

namespace App\Http\Controllers;

use App\Data\Repositories\ProductRepository;
use App\DataTables\ProductDatatable;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $products;

    public function __construct(ProductRepository $products)
    {
        $this->products = $products;
    }


    public function index(ProductDatatable $datatable)
    {
        return $datatable->render('products.index');
    }

    public function create()
    {
        return view('products.create');
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $category = $this->products->store($data);
        return redirect()->route('products.index');
    }

    /**
     * Display the specified Zone.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = $this->products->find($id);

        return view('category.show', compact('category'));
    }

    /* public function edit($id)
     {
         $category = $this->products->find($id);

         return view('category.edit', compact('category'));
     }

     public function update($id, CategoryStoreRequest $request)
     {
         $data = $request->only(['name', 'description']);

         $category = $this->products->update($id, $data);

         return redirect()->route('category.index');
     }

     /**
      * Remove the specified Zone from storage.
      *
      * @param  int $id
      *
      * @return \Illuminate\Http\Response
      */
    /* public function destroy($id)
     {
         //
     }*/
}
