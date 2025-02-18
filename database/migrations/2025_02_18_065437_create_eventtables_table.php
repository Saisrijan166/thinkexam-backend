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
        Schema::create('eventtables', function (Blueprint $table) {
            $table->increments('id');
            $table->string('event_name');
            $table->string('event_code');
            $table->string('exam_event_type');
            $table->string('event_type');
            $table->date('event_opening');
            $table->date('event_closing');
            $table->date('event_date');
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventtables');
    }
};
