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
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description', 255)->nullable();
            $table->text('meta_keywords',255)->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('status')->default(0)->comment('0 = inactive, 1 = active');
            $table->tinyInteger('is_delete')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_categories');
    }
};
