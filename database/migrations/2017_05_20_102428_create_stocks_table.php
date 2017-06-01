<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->unsignedInteger('supplier_id')->nullable();
            $table->unsignedInteger('product_id')->nullable();
            $table->decimal('buying_price', 8, 2)->nullable();
            $table->decimal('sell_price', 8, 2)->nullable();
            $table->string('profit_percent')->nullable();
            $table->string('discount_percent')->nullable();
            $table->string('flat_discount')->nullable();
            $table->string('vat_rate')->nullable();
            $table->string('vat_total')->nullable();
            $table->decimal('sub_total', 5, 2)->nullable();
            $table->string('stock_in')->nullable();
            $table->string('stock_out')->nullable();
            $table->string('stock_balance')->nullable();

            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();

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
        Schema::dropIfExists('stocks');
    }
}
