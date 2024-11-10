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
        Schema::create('fabric_process_flows', function (Blueprint $table) {
            $table->id();
            // Basic Information Section
            $table->string('orderNo')->unique();
            $table->date('date');
            $table->string('buyer');

            // Fabric Details Section
            $table->string('fabricType');
            $table->string('color');
            $table->integer('gsm');
            $table->decimal('width', 8, 2);
            $table->integer('quantity');
            $table->string('supplier');

            // Quality Control Section
            $table->decimal('shrinkage', 5, 2);
            $table->integer('colorFastness');
            $table->text('defects')->nullable();

            // Process Status Section - Columns for each process step
            $table->string('fabric_inspection_status')->default('Pending');
            $table->date('fabric_inspection_date')->nullable();
            $table->text('fabric_inspection_remarks')->nullable();

            $table->string('relaxation_status')->default('Not Started');
            $table->date('relaxation_date')->nullable();
            $table->text('relaxation_remarks')->nullable();

            $table->string('cutting_status')->default('Not Started');
            $table->date('cutting_date')->nullable();
            $table->text('cutting_remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fabric_process_flows');
    }
};
