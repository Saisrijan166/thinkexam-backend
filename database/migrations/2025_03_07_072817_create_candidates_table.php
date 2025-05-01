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
        Schema::create('candidates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('name')->nullable();
            $table->string('enrollment')->nullable();
            $table->date('date_of_registration')->nullable();
            $table->string('phone', 15)->nullable();
            $table->date('dob')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->string('school_name')->nullable();
            $table->integer('year')->nullable();
            $table->string('session')->nullable();
            $table->text('address')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('pincode', 10)->nullable();
            $table->string('group')->nullable();
            $table->string('other_selection')->nullable();
            $table->enum('status', ['active', 'inactive'])->nullable();
            $table->timestamps();

            $table->unique(['email'], 'candidates_email_unique_1');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
