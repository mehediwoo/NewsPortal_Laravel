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
        Schema::create('namazs', function (Blueprint $table) {
            $table->id();
            $table->string('fazar');
            $table->string('johor');
            $table->string('asor');
            $table->string('magrib');
            $table->string('esa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('namazs');
    }
};
