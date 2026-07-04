<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('borrowings', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete();

$table->foreignId('product_id')
    ->constrained('products')
    ->cascadeOnUpdate()
    ->restrictOnDelete();

$table->foreignId('approved_by')
    ->nullable()
    ->constrained('users')
    ->nullOnDelete();

$table->integer('quantity')->default(1);

$table->string('borrow_code')->unique();

$table->string('borrower_name');

$table->date('borrow_date');

$table->date('expected_return_date');

$table->date('actual_return_date')->nullable();

$table->enum('purpose',[
    'Operational',
    'Meeting',
    'Event',
    'Training',
    'Other'
])->default('Operational');

$table->enum('status',[
    'Pending',
    'Approved',
    'Rejected',
    'Returned'
])->default('Pending');

$table->text('notes')->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('borrowings');
    }
};