<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSomeFieldsToListOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('list_orders', function (Blueprint $table) {
            $table->dropColumn('jenis_server');
            $table->dropColumn('ukuran_server');
            $table->dropColumn('status');

            $table->string('rencana_survei')->nullable()->after('installasi');
            $table->string('status_survei')->nullable()->after('installasi');
            $table->text('new_file')->nullable()->after('installasi');
            $table->enum('service', ['Y', 'N'])->nullable()->after('installasi');
            $table->enum('pembayaran', ['Paid', 'Unpaid'])->nullable()->after('installasi');
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
            $table->enum('jenis_server', ['Rack Mount', 'Tower'])->nullable();
            $table->string('ukuran_server');//if custom ('custom|isi dari cusromnya apa')
            $table->enum('status', ['Survey', 'Job Order'])->nullable();

            $table->dropColumn('rencana_survei');
            $table->dropColumn('status_survei');
            $table->dropColumn('new_file');
            $table->dropColumn('service');
            $table->dropColumn('pembayaran');
        });
    }
}
