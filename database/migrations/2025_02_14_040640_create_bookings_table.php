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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id('booking_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('user_table');
            $table->unsignedBigInteger('vendor_id');
            $table->foreign('vendor_id')->references('vendor_id')->on('vendors');
            $table->unsignedBigInteger('em_id')->nullable();
            $table->foreign('em_id')->references('em_id')->on('event_manager');
            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id')->references('service_id')->on('services');
            $table->unsignedBigInteger('package_id')->nullable();
            $table->foreign('package_id')->references('package_id')->on('pre_packages');
            $table->string('event_dates');
            $table->bigInteger('totalprice');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
