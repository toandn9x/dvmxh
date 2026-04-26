<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('level')->default('member')->after('role'); // member, vip, collaborator
        });

        Schema::table('packages', function (Blueprint $table) {
            $table->double('price_vip', 15, 2)->default(0)->after('price');
            $table->double('price_collaborator', 15, 2)->default(0)->after('price_vip');
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
            $table->dropColumn('level');
        });

        Schema::table('packages', function (Blueprint $table) {
            $table->dropColumn(['price_vip', 'price_collaborator']);
        });
    }
};
