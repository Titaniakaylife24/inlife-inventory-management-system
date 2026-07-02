<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {

            $table->id();

            $table->foreignId('category_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('location_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->string('code',30)->unique();

            $table->string('serial_number')->nullable();

            $table->string('name');

            $table->string('brand')->nullable();

            $table->string('unit')->default('Unit');

            $table->text('description')->nullable();

            $table->string('image')->nullable();

            $table->unsignedInteger('stock')->default(0);

            $table->unsignedInteger('minimum_stock')->default(5);

            $table->enum('condition',[
                'Good',
                'Fair',
                'Damaged',
                'Lost'
            ])->default('Good');

            $table->enum('status',[
                'Available',
                'Borrowed',
                'Maintenance'
            ])->default('Available');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};