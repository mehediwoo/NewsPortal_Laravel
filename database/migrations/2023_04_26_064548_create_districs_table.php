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
        Schema::create('districs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('distric_bn');
            $table->string('distric_en');
            $table->string('soft_delete')->nullable()->default();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('districs');
    }
};
