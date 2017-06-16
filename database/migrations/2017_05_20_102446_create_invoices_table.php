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
            $table->integer('customer_id')->default(0)->nullable();
            $table->date('invoice_date')->default(date('Y-m-d H:i:s'))->nullable();
            $table->decimal('vat_rate', 15, 3)->default(0)->nullable();
            $table->decimal('vat_total', 15, 3)->default(0)->nullable();
            $table->decimal('sub_total', 15, 3)->default(0)->nullable();
            $table->decimal('discount', 15, 3)->default(0)->nullable();
            $table->decimal('ground_total', 15, 3)->default(0)->nullable();
            $table->decimal('round_total', 15, 3)->default(0)->nullable();
            $table->enum('payment_type', ['Cash', 'Card', 'both'])->nullable();
            $table->tinyInteger('status')->nullable()->default(0);
            $table->string('card_type')->nullable()->default('');
            $table->decimal('bank_amount', 15, 3)->default(0)->nullable();
            $table->decimal('cash_amount', 15, 3)->default(0)->nullable();
            $table->tinyInteger('payment_status')->default(0)->nullable();
            $table->string('in_words')->nullable()->default('');
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
