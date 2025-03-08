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
        Schema::create('investment_opportunities', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->foreignId('category_id')->constrained('investment_categories')->onDelete('cascade');
            $table->string('image')->nullable();
            $table->text('project_features')->nullable();
            $table->text('project_products')->nullable();
            $table->text('production_process')->nullable();
            $table->text('required')->nullable();
            $table->text('project_ser')->nullable();
            $table->text('financial_indicators')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investment_opportunities');
    }
};
