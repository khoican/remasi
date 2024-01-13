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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categoryId')->index();
            $table->string('name', 255);
            $table->string('image', 255)->nullable();
            $table->text('description');
            $table->text('ingredients');
            $table->text('instructions');
            $table->text('nutritions');
            $table->string('slug', 255);
            $table->timestamps();

            $table->foreign('categoryId')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
