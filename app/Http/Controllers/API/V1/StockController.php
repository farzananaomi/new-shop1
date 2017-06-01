<?php

namespace App\Http\Controllers\API\V1;

use App\Data\Repositories\InvoiceRepository;
use App\Data\Repositories\ItemRepository;
use App\Data\Repositories\StockRepositoy;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function stock (Request $request, ItemRepository $items)
    {
        $data = $request->all();
        $items->store($data);

        $response = new \stdClass();
        $error    = null;

        if ($error !== true) {
            $response->code         = 200;
            $response->app_message  = "Invoice saved";
            $response->user_message = 'Stock saved successfully!';
            $response->context      = 'registration';
        }

        return response()->json($response, $response->code);

    }
}
