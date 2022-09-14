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
        Schema::create('responses', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('value',255);
            $table->unsignedBigInteger('questionId');
            $table->foreign('questionId')->references('id')->on('questions')->onDelete('cascade');
            $table->unsignedBigInteger('respondentId');
            $table->foreign('respondentId')->references('id')->on('respondents')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('responses');
    }
};
