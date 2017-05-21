<?php

namespace App\Http\Controllers\API\V1;

use App\Data\Repositories\StockRepositoy;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function stock (Request $request, StockRepositoy $stocks)
    {
        $data = $request->all();
        $stocks->store($data);

        $response = new \stdClass();
        $error    = null;

        if ($error !== true) {
            $response->code         = 200;
            $response->app_message  = "Stock saved";
            $response->user_message = 'Stock saved successfully!';
            $response->context      = 'registration';
        }

        return response()->json($response, $response->code);

    }
}
