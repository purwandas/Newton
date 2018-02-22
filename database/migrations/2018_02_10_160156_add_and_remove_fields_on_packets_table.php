<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAndRemoveFieldsOnPacketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('packets', function (Blueprint $table) {
            $table->dropColumn('jenis_paket');

            $table->integer('service')->nullable()->after('harga');
            $table->integer('installasi')->nullable()->after('harga');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('packets', function (Blueprint $table) {
            $table->dropColumn('service');
            $table->dropColumn('installasi');

            $table->string('jenis_paket')->nullable()->after('size_server');
        });
    }
}
