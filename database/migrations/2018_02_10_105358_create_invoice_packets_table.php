<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicePacketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_packets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_invoice')->unsigned();
            $table->foreign('id_invoice')->references('id')->on('invoices');
            $table->integer('id_paket')->unsigned();
            $table->foreign('id_paket')->references('id')->on('packets');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_packets');
    }
}
