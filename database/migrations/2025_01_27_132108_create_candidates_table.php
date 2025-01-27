<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('profile_photo'); // Required

            // Nullable fields
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

            // File uploads
            $table->string('signature')->nullable();
            $table->string('id_proof')->nullable();
            $table->string('new_me')->nullable();
            $table->string('other_identification')->nullable();
            $table->string('other_identification2')->nullable();
            $table->string('other_identification3')->nullable();
            $table->string('other_identification4')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('candidates');
    }
};
