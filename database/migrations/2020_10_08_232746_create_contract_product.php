<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('quantity');
            $table->bigInteger('product_id')->unsigned()->index();
            $table->bigInteger('contract_id')->unsigned()->index();
        });
        Schema::table('contract_product', function($table) {
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('contract_id')->references('id')->on('contracts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contract_product');
    }
}
