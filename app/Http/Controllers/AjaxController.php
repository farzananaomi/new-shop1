<?php

namespace App\Http\Controllers;

use App\Data\Repositories\CategoryRepository;
use App\Data\Repositories\ProductRepository;
use App\Data\Repositories\StockRepository;
use App\Data\Repositories\UserRepository;

use Illuminate\Http\Request;

class AjaxController extends Controller
{

    public function getCategory(CategoryRepository $repo)
    {
        $_candidate = $repo->lists();
        $candidate = [];
        foreach ($_candidate as $key => $territory) {
            $candidate[] = (object)[
                'id' => $key,
                'text' => $territory,
            ];
        }

        return response()->json($candidate, 200);

    }

    public function getSubCategory(CategoryRepository $repo)
    {
        $id = $_REQUEST['id'];
        $_candidate = $repo->sub_lists($id);
        $candidate = [];
        foreach ($_candidate as $key => $territory) {
            $candidate[] = (object)[
                'id' => $key,
                'text' => $territory,
            ];
        }

        return response()->json($candidate, 200);

    }
public function get_product_details(StockRepository $repo ,ProductRepository $prod)
{
    $id = $_REQUEST['id'];

    $data = $repo->get_product_details($id);
    $data->name=$prod->find($data->product_id)->product_name;

    return response()->json($data, 200);
}

    public function getEntity(ProductRepository $repo)
    {
        $id = $_REQUEST['id'];
        $_candidate = $repo->lists($id);
        $candidate = [];
        foreach ($_candidate as $key => $territory) {
            $candidate[] = (object)[
                'id' => $key,
                'text' => $territory,
            ];
        }

        return response()->json($candidate, 200);

    }

    public function getSupplier(UserRepository $repo)
    {
        $_candidate = $repo->supplier_lists();
        $candidate = [];
        foreach ($_candidate as $key => $territory) {
            $candidate[] = (object)[
                'id' => $key,
                'text' => $territory,
            ];
        }

        return response()->json($candidate, 200);

    }
}
