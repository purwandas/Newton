<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('tipe_pelanggan', ['Individu', 'Perusahaan'])->nullable();
            $table->string('nama_perusahaan')->nullable();
            $table->string('alamat_perusahaan')->nullable();
            $table->string('telp')->nullable();
            $table->string('penanggung_jawab');
            $table->string('jabatan_penanggung_jawab')->nullable();
            $table->string('nip_penanggung_jawab')->nullable();
            $table->string('hp_penanggung_jawab');
            $table->string('email');
            $table->enum('jenis_server', ['Rack Mount', 'Tower'])->nullable();
            // $table->enum('ukuran_server', ['1U', '2U', '4U', 'Custom'])->nullable();
            $table->string('ukuran_server');//if custom ('custom|isi dari cusromnya apa')
            $table->date('rencana_pemasangan')->nullable();
            $table->enum('status', ['Survey', 'Job Order'])->nullable();
            $table->integer('jangka_waktu');
            $table->enum('installasi', ['Y', 'N'])->nullable();
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
        Schema::dropIfExists('list_orders');
    }
}
