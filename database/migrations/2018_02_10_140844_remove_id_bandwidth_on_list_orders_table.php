<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveIdBandwidthOnListOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('list_orders', function (Blueprint $table) {
            $table->dropForeign(['id_bandwidth']);
            $table->dropColumn('id_bandwidth');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('list_orders', function (Blueprint $table) {
            $table->integer('id_bandwidth')->unsigned()->after('id');
            $table->foreign('id_bandwidth')->references('id')->on('bandwidths');
        });
    }
}
