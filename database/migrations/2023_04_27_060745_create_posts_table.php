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
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cate_id');
            $table->integer('subcate_id');
            $table->integer('dist_id')->nullable();
            $table->integer('subdist_id')->nullable();
            $table->integer('user_id');
            $table->string('title_en');
            $table->string('title_bn');
            $table->string('image');
            $table->longText('desc_en');
            $table->longText('desc_bn');
            $table->string('tags_en');
            $table->string('tags_bn');
            $table->mediumText('headline')->nullable()->default('0');
            $table->string('first_section')->nullable()->default('0');
            $table->string('first_sec_thumbnail')->nullable()->default('0');
            $table->string('big_thumbnail')->nullable()->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
