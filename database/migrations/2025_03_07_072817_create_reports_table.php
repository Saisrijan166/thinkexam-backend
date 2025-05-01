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
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('email');
            $table->string('group');
            $table->integer('test_attempts');
            $table->integer('correct');
            $table->integer('incorrect');
            $table->integer('skipped');
            $table->integer('marks');
            $table->integer('rank');
            $table->decimal('credibility_score');
            $table->integer('total_ufm');
            $table->integer('suspended_count');
            $table->string('verified_image')->nullable();
            $table->string('candidate_image_1')->nullable();
            $table->string('candidate_image_2')->nullable();
            $table->string('test_end_by_proctor');
            $table->string('ip_address');
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
