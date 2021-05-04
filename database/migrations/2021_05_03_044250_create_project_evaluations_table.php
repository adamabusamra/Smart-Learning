<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_evaluations', function (Blueprint $table) {
            $table->bigIncrements('id')->index();
            //Didn't add foreign keys in seperate migration
            $table->bigInteger('submit_project_id')->unsigned();
            $table->foreign('submit_project_id')->references('id')->on('submit_projects');
            $table->text('message');
            $table->text('development_points');
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
        Schema::dropIfExists('project_evaluations');
    }
}
