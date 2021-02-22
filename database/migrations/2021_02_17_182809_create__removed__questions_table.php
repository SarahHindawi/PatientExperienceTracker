<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRemovedQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('REMOVED_QUESTIONS', function (Blueprint $table) {
            $table->id();
            $table->date('DateRemoved');
            $table->string('SurveySource');
            $table->string('QuestionText');
            $table->json('Responses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('REMOVED_QUESTIONS');
    }
}
