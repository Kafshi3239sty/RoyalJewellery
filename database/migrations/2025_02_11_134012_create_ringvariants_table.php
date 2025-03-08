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
        Schema::create('ringvariants', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('RID');
            $table->unsignedInteger('size');
            $table->unsignedInteger('Stock_quantity');
            $table->unsignedInteger('price');
            $table->timestamps();

            $table->foreign('RID')->references('id')->on('rings');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ringvariants');
    }
};
