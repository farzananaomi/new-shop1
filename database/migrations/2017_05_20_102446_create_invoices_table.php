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
            $table->unsignedInteger('customer_id');
            $table->string('invoice_no');
            $table->date('invoice_date');
            $table->string('product_name');
            $table->decimal('quantity', 5, 2);
            $table->decimal('unit_price',8,2);
            $table->decimal('net_price',8,2);
            $table->string('vat');
            $table->string('discount');
            $table->string('sub_total');
            $table->enum('status', ['cash', 'card', 'Other',]);

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
