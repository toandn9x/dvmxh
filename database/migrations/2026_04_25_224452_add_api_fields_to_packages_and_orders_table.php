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
        Schema::table('packages', function (Blueprint $table) {
            $table->string('provider')->nullable()->after('status');
            $table->string('api_service_id')->nullable()->after('provider');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->string('api_order_id')->nullable()->after('status');
            $table->text('api_response')->nullable()->after('api_order_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->dropColumn(['provider', 'api_service_id']);
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['api_order_id', 'api_response']);
        });
    }
};
