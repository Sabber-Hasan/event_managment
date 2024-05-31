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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id')->unsigned()->nullable();
            $table->foreign('order_id')->references('id')->on('orders');
            $table->bigInteger('platter_id')->unsigned()->nullable();
            $table->foreign('platter_id')->references('id')->on('platters');
            $table->bigInteger('hall_id')->unsigned()->nullable();
            $table->foreign('hall_id')->references('id')->on('halls');
            $table->float('platter_price',10,2);
            $table->float('platter_discount',10,2)->nullable()->default(null);
            $table->float('platter_vat',10,2)->nullable();
            $table->float('platter_quantity',6,2);
            $table->float('hall_price',10,2);
            $table->float('hall_discount',10,2)->nullable()->default(null);
            $table->float('hall_vat',10,2)->nullable();
            $table->date('hall_booked_date');
            $table->string('transaction_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
