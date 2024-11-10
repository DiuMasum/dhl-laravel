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
        Schema::create('trims', function (Blueprint $table) {
            $table->id();
            $table->string('trimId')->unique();
            $table->string('trimName');
            $table->string('category');
            $table->string('material')->nullable();
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->decimal('unitPrice', 10, 2);
            $table->integer('minStock');
            $table->integer('currentStock');
            $table->string('supplier');
            $table->integer('leadTime');
            $table->integer('moq');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trims');
    }
};
