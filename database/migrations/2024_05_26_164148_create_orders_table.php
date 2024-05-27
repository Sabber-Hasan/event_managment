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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('merchant_id')->unsigned()->nullable();
            $table->foreign('merchant_id')->references('id')->on('merchants');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->float('total',10,2);
            $table->float('discount',10,2)->nullable()->default(null);
            $table->float('vat',10,2)->nullable();
            $table->string('method')->required();
            $table->string('transaction_id')->nullable(null);
            $table->string('comment')->nullable()->default(null);
            $table->set('status',['gt','st','dn'])->default('gt')->comment('Status of the entity: gt = get order, st = processing, dn = done');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
