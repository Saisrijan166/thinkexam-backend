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
        Schema::create('teststables', function (Blueprint $table) {
            $table->integer('id')->nullable()->primary();
            $table->text('name');
            $table->date('start_date');
            $table->date('end_date');
            $table->text('status')->nullable()->default('Active');
            $table->integer('question');
            $table->text('level');
            $table->integer('candidate');
            $table->text('product');
            $table->text('category');
            $table->text('template');
            $table->text('version');
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teststables');
    }
};
