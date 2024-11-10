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
        Schema::create('otherscosts', function (Blueprint $table) {
            $table->id();
            $table->date('costDate'); // Date
            $table->string('costType'); // Cost Type
            $table->decimal('amount', 10, 2); // Amount with 2 decimal places
            $table->string('currency', 3); // Currency code (e.g., USD, EUR, BDT)
            $table->string('department'); // Department
            $table->string('costCenter')->nullable(); // Cost Center (optional)
            $table->text('description'); // Description
            $table->string('invoiceNo')->nullable(); // Invoice No. (optional)
            $table->string('vendorName')->nullable(); // Vendor Name (optional)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('otherscosts');
    }
};
