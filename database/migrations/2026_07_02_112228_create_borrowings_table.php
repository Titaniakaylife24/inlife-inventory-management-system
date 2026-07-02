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
                'Borrowed',
                'Returned',
                'Late'
            ])->default('Borrowed');

            $table->text('notes')->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('borrowings');
    }
};