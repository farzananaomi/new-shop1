<?php

namespace App\Data\Repositories;

use App\Data\Models\Invoice;
use App\Data\Models\Item;
use App\Data\Models\Customer;
use App\Data\Models\Product;
use App\Data\Models\Stock;
use App\Data\Models\User;
Use DB;
use App\Data\Repositories\Interfaces\PaginatedResultInterface;
use App\Data\Repositories\Interfaces\RawQueryBuilderOutputInterface;
use App\Data\Repositories\Traits\PaginatedOutputTrait;
use App\Data\Repositories\Traits\ProcessOutputTrait;
use App\Data\Repositories\Traits\RawQueryBuilderOutputTrait;

class InvoiceRepository implements PaginatedResultInterface, RawQueryBuilderOutputInterface
{
    use ProcessOutputTrait, PaginatedOutputTrait, RawQueryBuilderOutputTrait;

    public function search($filter = [])
    {
        $categories = Invoice::query();

        return $this->output($categories);
    }

    public function find($id)
    {
        return Invoice::find($id);
    }

    public function all()
    {
        return Invoice::all();
    }

    public function store($data)
    {

        $customer = new Customer();
        $customer->customer_name = sanitize(@$data['customer_name'], '');
        $customer->mobile_no = sanitize(@$data['mobile_no'], '');
        $customer->address = sanitize(@$data['address'], '');
        $customer->save();
        //var_dump($customer);
        $invoice = new Invoice();
        $invoice->customer_id = $customer->id;

     //   $invoice->invoice_no = $data['invoice_no'];
        $invoice->invoice_date =  $data['invoice_date']; //date('Y-m-d H:i:s');
        $invoice->vat_total = sanitize(@$data['vat_total'], 0);
        $invoice->sub_total = sanitize(@$data['sub_total'], 1);
        $invoice->discount = $data['discount'];
        $invoice->grand_total = sanitize(@$data['grand_total'], 0);
        $invoice->total_payable = sanitize(@$data['total_payable'], 0);

        $invoice->payment_type = $data['payment_type'];
        $invoice->card_type = sanitize(@$data['card_type'], 0);
        $invoice->bank_amount = sanitize(@$data['bank_amount'], 0);

        $invoice->cash_amount = $invoice->total_payable-$invoice->bank_amount;
        $invoice->payment_status = 1;//sanitize(@$data['payment_status'], 0);
        $invoice->status =1;// sanitize(@$data['status'], 1);
        $invoice->in_words = sanitize(@$data['in_words_h'], '');

        $invoice->save();

        $items = [];
        foreach ($data['items'] as $val) {
            $item = new Item();
            foreach ($val as $key => $value) {
                $item->$key = $value;

            }

            $stock_data=Stock::where('barcode_id',$item->product_id)->first();
            //$stock = new Stock();
            $stock=$stock_data;
            $stock->stock_out=$stock->stock_out+$item->quantity;
            $stock->stock_balance=$stock->stock_in-$stock->stock_out;
            $stock->save();
            $items[] = $item;
        }

        try {
            DB::beginTransaction();
            if ($invoice->save()) {
                $invoice->items()->saveMany($items);
                DB::commit();
               // var_dump($invoice);
                //return $submission;
            }
            DB::rollBack();
        } catch (Exception $ex) {
            Logger::debug($ex->getMessage());
            var_dump($ex->getMessage());

            DB::rollBack();
            foreach ($data['items'] as $val) {
                $item = new Item();
                foreach ($val as $key => $value) {
                    $item->$key = $value;

                }
                $stock_data=Stock::where('barcode_id',$item->product_id)->first();
                //$stock = new Stock();
                $stock=$stock_data;
                $stock->stock_out=$stock->stock_out-$item->quantity;
                $stock->stock_balance=$stock->stock_in-$stock->stock_out;
                $stock->save();
                $items[] = $item;
            }
            return false;
        }

        return $invoice;

    }

    public function storeItem($data)
    {
        $invoice = Invoice::find($data['id']);

        if (empty($invoice)) {
            return null;
        }

        $item = new Item();
        $item->product_id = $data['product_id'];
        $item->quantity = $data['quantity'];
        $item->unit_price = $data['unit_price'];
        $item->vat = $data['vat'];
        $item->discount = $data['discount'];


        $invoice->items()->save($item);

        return $item;
    }
}