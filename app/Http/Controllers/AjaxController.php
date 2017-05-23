<?php

namespace App\Http\Controllers;

use App\Data\Repositories\CategoryRepository;
use App\Data\Repositories\ProductRepository;
use Illuminate\Http\Request;

class AjaxController extends Controller{

public function getCategory(CategoryRepository $repo){
    $_candidate = $repo->lists();
    $candidate = [];
    foreach ($_candidate as $key => $territory) {
        $candidate[] = (object) [
            'id' => $key,
            'text' => $territory,
        ];
    }

    return response()->json($candidate, 200);

}
    public function getEntity(ProductRepository $repo){
        $_candidate = $repo->lists();
        $candidate = [];
        foreach ($_candidate as $key => $territory) {
            $candidate[] = (object) [
                'id' => $key,
                'text' => $territory,
            ];
        }

        return response()->json($candidate, 200);

    }
}
