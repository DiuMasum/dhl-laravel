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
        Schema::create('fabric_infos', function (Blueprint $table) {
            $table->id();
            $table->string('order_no')->nullable(); // Nullable in case it's optional
            $table->date('order_date');
            $table->string('buyer_name');
            $table->string('style_number');
            $table->string('product_category');
            $table->text('product_description')->nullable(); // Allowing nulls if optional
            $table->integer('quantity');
            $table->decimal('target_price', 10, 2);
            $table->date('delivery_date');
            $table->string('fabric_type');
            $table->string('color')->nullable();
            $table->string('material_composition')->nullable();
            $table->string('quality_standards')->nullable();
            $table->string('testing_requirements')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fabric_infos');
    }
};
