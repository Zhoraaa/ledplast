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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->integer('cost');
            $table->string('image');
            $table->foreignId('type')->constrained('product_types');
            // $table->string('model'), // модель
            // $table->string('producer'), // производитель
            // $table->string('light-lum'), // световой поток
            // $table->string('color-t'), // цветовая температура
            // $table->string('voltage'), // напряжние питания
            // $table->string('def-class'), // класс защиты
            // $table->string(''), //
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
