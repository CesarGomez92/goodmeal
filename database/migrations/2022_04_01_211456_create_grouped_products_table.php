<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupedProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grouped_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_group');
            $table->unsignedBigInteger('id_product_found');
            $table->timestamps();
            $table->foreign('id_group')->references('id')->on('groups');
            $table->foreign('id_product_found')->references('id')->on('products_found');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grouped_products');
    }
}
