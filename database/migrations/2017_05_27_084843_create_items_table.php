<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->unsignedInteger('invoice_id')->default(0)->nullable();
            $table->unsignedInteger('product_id')->default(0)->nullable();
            $table->integer('quantity')->default(0)->nullable();
            $table->decimal('unit_price',15,3)->default(0)->nullable();
            $table->decimal('vat_rate',15,3)->default(0)->nullable();
            $table->decimal('vat_total',15,3)->default(0)->nullable();
            $table->decimal('discount',15,3)->default(0)->nullable();
            $table->decimal('ground_total',15,3)->default(0)->nullable();

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
        Schema::dropIfExists('items');
    }
}
