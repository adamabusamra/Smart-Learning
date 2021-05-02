<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id')->index();
            $table->string('title');
            $table->string('short_description');
            $table->string('long_description');
            $table->string('time_status')->default('due');
            $table->string('image');
            $table->string('resources')->nullable();
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            // $table->string('learning_methods');
            // $table->string('performance_criteria');
            // $table->string('assessment_methods');
            $table->string('deliverables');
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
        Schema::dropIfExists('projects');
    }
}
