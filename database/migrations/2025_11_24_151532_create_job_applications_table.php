<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->string('position_name');
            $table->unsignedBigInteger('position_id')->nullable();
            $table->string('cv_path');
            $table->text('cover_letter')->nullable();
            $table->enum('status', ['pending', 'reviewed', 'contacted', 'rejected', 'hired'])->default('pending');
            $table->timestamps();
            
            $table->foreign('position_id')->references('id')->on('available_positions')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_applications');
    }
};
