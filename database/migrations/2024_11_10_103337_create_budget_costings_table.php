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
        Schema::create('budget_costings', function (Blueprint $table) {
            $table->id();
            $table->string('style_no'); // Style No.
            $table->string('buyer'); // Buyer Name
            $table->string('season')->nullable(); // Season
            $table->string('product_type')->nullable(); // Product Type
            $table->decimal('target_price', 10, 2); // Target Price (USD)
            $table->integer('moq'); // MOQ (Pieces)
            $table->decimal('exchange_rate', 10, 2)->default(1.00); // Exchange Rate
            $table->decimal('fabric_cost', 10, 2); // Fabric Cost/Yard
            $table->decimal('consumption', 10, 2); // Consumption/Piece
            $table->decimal('trim_cost', 10, 2); // Trim Cost/Piece
            $table->decimal('cm_cost', 10, 2); // CM Cost/Piece
            $table->decimal('wash_cost', 10, 2)->default(0.00); // Wash Cost/Piece
            $table->decimal('overhead', 5, 2)->default(5.00); // Overhead %
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budget_costings');
    }
};
