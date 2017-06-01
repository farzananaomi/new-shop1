<?php
namespace App\Http\Controllers;
use App\Data\Repositories\CategoryRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;
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
    /*public function create()
    {
        return view('categories.create');
    }*/
    public function store(Request $request)
    {
        $data      = $request->only('name', 'description', 'type', 'parent_id');
        $category = $this->categories->store($data);
        if ($category) {
            if ($request->ajax()) {
                return response()->json([
                        'status'  => 'Ok',
                        'message' => 'Operation stored successfully!!',
                        'data'    => $category,
                    ]
                );
            }
            return redirect()->route('categories.index');
        }
    }
    public function show($id, Request $request)
    {
        $category = $this->categories->find($id);
        if ($request->input('action') == 'export') {
            $now = Carbon::now()->toDateTimeString();
            $pdf = PDF::loadView('categories.export', compact('category'))->setPaper('a4')
                ->setOption('footer-font-size', '9')
                ->setOption('footer-left', "This document was electronically generated.\nEmployee Information Form - Revision 3.0")
                ->setOption('footer-right', 'Timestamp: ' . $now)
                ->setOption('footer-center', '[page]');
            $pdf->snappy()->setTemporaryFolder(storage_path('app'));
            return $pdf->inline("{$category->category_id}.pdf");
            //return view('categories.export', compact('category'));
        }
        return view('categories.show', compact('category'));
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