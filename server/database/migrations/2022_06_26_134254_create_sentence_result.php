<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSentenceResult extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sentence_results', function (Blueprint $table) {
            $table->id();
            $table->string('answer_en');
            $table->string('correct_en');
            $table->integer('score')->nullable();
            $table->foreignId('sentence_id')->constrained('sentences');
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
        Schema::dropIfExists('sentence_results');
    }
}
