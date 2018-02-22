<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RebuildPacketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('packets', function (Blueprint $table) {
            $table->dropColumn('harga_satuan');
            $table->dropColumn('lokasi');
            $table->dropColumn('volume');
            $table->dropColumn('satuan');
            
            $table->string('alamat')->default('Datacenter Indonesia')->after('nama_paket');
            $table->string('kecepatan_lokal')->nullable()->after('nama_paket');
            $table->string('kecepatan_internasional')->nullable()->after('nama_paket');
            $table->string('power')->nullable()->after('nama_paket');
            $table->string('size_server')->nullable()->after('nama_paket');
            $table->string('jenis_paket')->nullable()->after('nama_paket');//Setup/Instalasi/Service&Troubleshooting,   kalo null, berarti paket biasa
            $table->string('tax')->default('10%')->after('nama_paket');
            $table->integer('harga')->nullable()->after('nama_paket');
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
            $table->integer('harga_satuan');
            $table->string('lokasi');
            $table->integer('volume');
            $table->string('satuan');

            $table->dropColumn('alamat');
            $table->dropColumn('kecepatan_lokal');
            $table->dropColumn('kecepatan_internasional');
            $table->dropColumn('power');
            $table->dropColumn('size_server');
            $table->dropColumn('jenis_paket');
            $table->dropColumn('tax');
            $table->dropColumn('harga');
        });
    }
}
