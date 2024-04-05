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
        Schema::create('fruit_item', function (Blueprint $table) {
            $table->id();
            $table->Integer('category_id');
            $table->string('code');
            $table->string('name');
            $table->string('unit');
            $table->BigInteger('price');
            $table->BigInteger('stock')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fruit_item');
    }
};
