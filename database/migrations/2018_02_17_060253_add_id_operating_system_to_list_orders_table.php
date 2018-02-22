<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdOperatingSystemToListOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('list_orders', function (Blueprint $table) {
            $table->integer('id_operating_system')->nullable()->unsigned()->after('id_paket');
            $table->foreign('id_operating_system')->references('id')->on('operating_systems');
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
            $table->dropForeign(['id_operating_system']);
            $table->dropColumn('id_operating_system');
        });
    }
}
