<?php

use App\Models\Package;
use App\Models\Service;
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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Service::class)->constrained();
            $table->string('name');
            $table->integer('price');
            $table->integer('min_quantity')->default(0);
            $table->integer('max_quantity')->default(0);
            $table->text('note')->nullable();
            $table->string('status')->default(Package::ACTIVE);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');
    }
};
