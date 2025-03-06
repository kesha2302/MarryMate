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
        Schema::create('user_table', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->bigInteger('contact');
            $table->string('address',600)->nullable();
            $table->enum('role_as', ["C","V","EM"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_tables');
    }
};
