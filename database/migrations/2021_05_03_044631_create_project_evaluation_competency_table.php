<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectEvaluationCompetencyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_evaluation_competency', function (Blueprint $table) {
            $table->bigIncrements('id')->index();
            //Didn't add foreign keys in seperate migration
            $table->bigInteger('project_evaluation_id')->unsigned();
            $table->foreign('project_evaluation_id')->references('id')->on('project_evaluations');
            $table->bigInteger('competency_id')->unsigned();
            $table->foreign('competency_id')->references('id')->on('competencies');
            $table->boolean('status');
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
        Schema::dropIfExists('project_evaluation_competency');
    }
}
