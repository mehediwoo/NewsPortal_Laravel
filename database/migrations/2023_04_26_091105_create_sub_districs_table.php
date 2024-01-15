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
        Schema::create('sub_districs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('distric_id');
            $table->string('subDis_bn');
            $table->string('subDis_en');
            $table->string('soft_delete')->nullable()->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_districs');
    }
};
