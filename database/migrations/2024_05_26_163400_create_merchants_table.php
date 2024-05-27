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
            $table->string('company_name', 80)->required();
            $table->string('phone', 15)->required();
            $table->string('trade_license', 20)->required();
            $table->bigInteger('account_number')->nullable()->default(null);
            $table->bigInteger('bkash_number')->nullable()->default(null);
            $table->bigInteger('nogod_number')->nullable()->default(null);
            $table->bigInteger('rocket_number')->nullable()->default(null);
            $table->bigInteger('upay_number')->nullable()->default(null);
            $table->string('addres', 900);
            $table->string('city', 180);
            $table->string('site_url', 180)->nullable();
            $table->set('stauts', [1, 0])->default(0);
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
