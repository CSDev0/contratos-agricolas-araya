<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContracts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('inscription_number', 255);
            $table->string('buyer_rut', 11);
            $table->string('buyer_name', 150);
            $table->string('seller_rut', 11);
            $table->string('seller_name', 150);
            $table->date('start_date');
            $table->date('end_date');
            $table->string('observations', 255)->nullable();
            $table->timeStamps();
            $table->bigInteger('file_id')->unsigned()->index();
        });
        Schema::table('contracts', function($table) {
            $table->foreign('file_id')->references('id')->on('files');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contracts');
    }
}
