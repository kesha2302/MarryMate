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
        Schema::create('pre_packages', function (Blueprint $table) {
            $table->id('package_id');
            $table->unsignedBigInteger('vendor_id');
            $table->foreign('vendor_id')->references('vendor_id')->on('vendors');
            $table->unsignedBigInteger('em_id')->nullable();
            $table->foreign('em_id')->references('em_id')->on('event_manager');
            $table->string('package_name');
            $table->string('service_types');
            $table->string('description');
            $table->bigInteger('price');
            $table->string('images',1000);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pre_packages');
    }
};
