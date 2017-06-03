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
        $customer->customer_name = sanitize(@$data['customer_name'], '');
        $customer->mobile_no = sanitize(@$data['mobile_no'], '');
        $customer->address = sanitize(@$data['address'], '');
        $customer->save();
        //var_dump($customer);
        $invoice = new Invoice();
        $invoice->customer_id = $customer->id;
        $invoice->invoice_date = date('Y-m-d H:i:s');
        $invoice->payment_type = 'Cash';
        $invoice->card_type = 'bank';
        $invoice->bank_amount ='1';
        $invoice->cash_amount = 2;
        $invoice->payment_status = 1;//sanitize(@$data['payment_status'], 0);
        $invoice->status =1;// sanitize(@$data['status'], 1);
       // $invoice->quantity =$data ['quantity'];
       // $invoice->total =$data ['total'];
        $invoice->discount = sanitize(@$data['discount'], 0);
        $invoice->vat_rate = sanitize(@$data['vat_rate'], 0);
        $invoice->vat_total = sanitize(@$data['vat_total'], 0);
        $invoice->ground_total = sanitize(@$data['ground_total'], 0);
        $invoice->round_total = sanitize(@$data['round_total'], 0);

        $invoice->save();

        $items = [];
        foreach ($data['items'] as $val) {
            $item = new Item();
            foreach ($val as $key => $value) {
                $item->$key = $value;
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
