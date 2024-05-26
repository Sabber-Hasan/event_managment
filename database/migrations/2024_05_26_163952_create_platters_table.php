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
        Schema::create('platters', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('merchant_id')->unsigned()->nullable();
            $table->foreign('merchant_id')->references('id')->on('merchants')->onDelete('cascade');
            $table->string('name');
            $table->float('price',10,2);
            $table->float('discount',10,2)->nullable()->default(null);
            $table->float('vat',10,2)->nullable();
            $table->string('image')->nullable()->default(null);
            $table->set('status',[1,0])->default(1);
            $table->set('hot',[1,0])->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('platters');
    }
};
