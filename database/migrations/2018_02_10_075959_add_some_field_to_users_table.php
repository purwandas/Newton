<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSomeFieldToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('country')->nullable()->after('password');
            $table->string('state')->nullable()->after('password');
            $table->string('postcode')->nullable()->after('password');
            $table->string('city')->nullable()->after('password');
            $table->string('address')->nullable()->after('password');
            $table->string('company')->nullable()->after('password');
            $table->string('phone')->nullable()->after('password');
            $table->string('lastname')->nullable()->after('password');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('country');
            $table->dropColumn('state');
            $table->dropColumn('postcode');
            $table->dropColumn('city');
            $table->dropColumn('address');
            $table->dropColumn('company');
            $table->dropColumn('phone');
            $table->dropColumn('lastname');
        });
    }
}
