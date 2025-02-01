<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('candidate_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidate_id')->constrained('candidates')->onDelete('cascade');
            $table->string('profile_photo'); // Required field
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
        Schema::dropIfExists('candidate_files');
    }
};
