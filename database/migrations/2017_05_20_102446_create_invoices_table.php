<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');

            $table->unsignedInteger('product_id');
            $table->string('invoice_no');
            $table->string('customer_name');
            $table->string('customer_address');
            $table->string('customer_contact');
            $table->date('invoice_date');
            $table->enum('status', ['Cash', 'Card', 'Others']);
            $table->string('quantity');
            $table->string('unit_price');
            $table->string('net_price');
            $table->string('vat');
            $table->string('discount');
            $table->string('total');
            $table->string('sub_total');

            $table->softDeletes();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
