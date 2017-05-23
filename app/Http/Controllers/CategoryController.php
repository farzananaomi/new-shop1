<?php

namespace App\Http\Controllers;

use App\Data\Repositories\CategoryRepository;


use Illuminate\Http\Request;

class CategoryController extends Controller
{

    protected $categories;

    public function __construct(CategoryRepository $categories)
    {
        $this->categories = $categories;
    }

    /**
     * Display a listing of the Zone.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categories->all();

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $category = $this->categories->store($data);
        return redirect()->route('categories.index');
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
        $category = $this->categories->find($id);

        return view('category.show', compact('category'));
    }

   /* public function edit($id)
    {
        $category = $this->categories->find($id);

        return view('category.edit', compact('category'));
    }

    public function update($id, CategoryStoreRequest $request)
    {
        $data = $request->only(['name', 'description']);

        $category = $this->categories->update($id, $data);

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
