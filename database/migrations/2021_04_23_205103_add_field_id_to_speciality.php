<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldIdToSpeciality extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('specialities', function (Blueprint $table) {
            // They say this is equivilent to the bellow
            // $table->foreignId('field_id')->constrained();

            //**This worked for me so I had to make the foreign key bigint to be same as ID + not only that I also needed to make it unsigned to be the same as the ID or else you will get error(errno: 150 "Foreign key constraint is incorrectly formed")
            $table->bigInteger('field_id')->unsigned();
            $table->foreign('field_id')->references('id')->on('fields');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('speciality', function (Blueprint $table) {
            //
        });
    }
}
