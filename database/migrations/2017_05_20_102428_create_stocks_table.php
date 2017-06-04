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
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('supplier_id')->default(0)->nullable();
            $table->unsignedInteger('product_id')->default(0)->nullable();
            $table->string('barcode_id')->default('')->nullable();
            $table->decimal('buying_price', 15, 3)->default(0)->nullable();
            $table->decimal('sell_price', 15, 3)->default(0)->nullable();
            $table->decimal('profit_percent', 15, 3)->default(0)->nullable();
            $table->decimal('discount_percent', 15, 3)->default(0)->nullable();
            $table->decimal('flat_discount', 15, 3)->default(0)->nullable();
            $table->decimal('vat_rate', 15, 3)->default(0)->nullable();
            $table->decimal('vat_total', 15, 3)->default(0)->nullable();
            $table->decimal('sub_total',8, 2)->default(0)->nullable();
            $table->decimal('stock_in', 15, 3)->default(0)->nullable();//default stock_total=stock_balance
            $table->decimal('stock_out', 15, 3)->default(0)->nullable();//default stock_out 0.
            $table->decimal('stock_balance', 15, 3)->default(0)->nullable();

            $table->string('created_by')->default('')->nullable();
            $table->string('updated_by')->default('')->nullable();

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
