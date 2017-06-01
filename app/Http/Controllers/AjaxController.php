<?php

namespace App\Http\Controllers;

use App\Data\Repositories\CategoryRepository;
use App\Data\Repositories\ProductRepository;
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

    public function getEntity(ProductRepository $repo)
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
