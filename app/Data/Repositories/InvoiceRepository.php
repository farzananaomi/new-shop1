<?php

namespace App\Data\Repositories;

use App\Data\Models\Invoice;
use App\Data\Models\Item;
use App\Data\Models\Customer;
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

        $customer->customer_name = ['customer_name'];
        $customer->mobile_no =['mobile_no'];
        $customer->address =['address'];

        $customer->save();


        $invoice = new Invoice();
        $invoice->customer_id = $customer->id;
        $invoice->invoice_no=$data['invoice_no'];
        $invoice->invoice_date = date('Y-m-d H:i:s');
        $invoice->payment_type = 'Cash';
        $invoice->card_type = 'bank';
        $invoice->bank_amount ='1';
        $invoice->cash_amount = 2;
        $invoice->payment_status = 1;

        $item = new Item();
        $invoice->discount = $data['discount'];
        $invoice->vat_rate =$data['vat_rate'];
        $invoice->vat_total =$item->unit_price *($invoice->vat_rate/100);
        $invoice->ground_total =
        $invoice->round_total = sanitize(@$data['round_total'], 0);

        $invoice->save();

        $items = [];
        foreach ($data['items'] as $val) {
            $item = new Item();
            foreach ($val as $key => $value) {
                $item->$key = $value;
                $item->total=$item->quantity * $item->unit_price;
            }
            $items[] = $item;
        }

        try {
            DB::beginTransaction();
            if ($invoice->save()) {
                $invoice->items()->saveMany($items);
                DB::commit();
                var_dump($invoice);
                //return $submission;
            }
            DB::rollBack();
        } catch (Exception $ex) {
            Logger::debug($ex->getMessage());
            var_dump($ex->getMessage());

            DB::rollBack();

            return false;
        }

        return $invoice;

    }


}
