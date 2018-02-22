<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProvinsiAndKodePosToListOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('list_orders', function (Blueprint $table) {
            $table->string('kode_pos')->nullable()->after('alamat_perusahaan');
            $table->string('provinsi')->nullable()->after('alamat_perusahaan');
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
            $table->dropColumn('kode_pos');
            $table->dropColumn('provinsi');
        });
    }
}
