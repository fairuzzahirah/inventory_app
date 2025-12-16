<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void
{
    Schema::create('items', function (Blueprint $table) {
        $table->id();
        $table->string('name', 100);
        $table->string('code', 50)->unique();

        $table->foreignId('category_id')
              ->constrained('categories')
              ->cascadeOnDelete();

        $table->foreignId('unit_id')
              ->constrained('units')
              ->cascadeOnDelete();

        $table->enum('status', ['aktif','rusak','dipinjam','maintenance'])
              ->default('aktif');

        $table->text('description')->nullable();
        $table->timestamps();
    });
    }

    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
