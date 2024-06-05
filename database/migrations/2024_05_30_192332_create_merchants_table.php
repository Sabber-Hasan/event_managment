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
        Schema::create('merchants', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('company_name', 80)->nullable;
            $table->string('phone', 15)->nullable;
            $table->string('trade_license', 20)->nullable;
            $table->string('account_type')->nullable;
            $table->string('account_num')->nullable;
            $table->string('address', 900)->nullable; // Fixed the typo from 'addres' to 'address'
            $table->string('city', 180)->nullable;
            $table->string('site_url', 180)->nullable();
            $table->string('logo')->nullable(); // Added logo field
            $table->set('status', [1, 0])->default(0); // Fixed the typo from 'stauts' to 'status'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('merchants');
    }
};
