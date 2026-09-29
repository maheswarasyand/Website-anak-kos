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
        Schema::create('budgets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->casecadeOnDelete();
            $table->integer('month');
            $table->integer('year');
            $table->decimal('total_budget', 12, 2);
            $table->decimal('saving_target', 12, 2)->default(0);
            $table->timestamps('created_at')->nullable();
            $table->timestamps('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budgets');
    }
};
