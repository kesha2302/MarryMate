<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('adminpackage', function (Blueprint $table) {
            $table->id('ap_id');
            $table->unsignedBigInteger('service_id')->nullable();
            $table->foreign('service_id')->references('service_id')->on('services');
            $table->unsignedBigInteger('package_id')->nullable();
            $table->foreign('package_id')->references('package_id')->on('pre_packages');
            $table->string('package_name');
            $table->string('description',1000);
            $table->bigInteger('totalcost');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adminpackage');
    }
};
