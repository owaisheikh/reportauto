<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('project_name');
            $table->text('project_description');
            $table->integer('owner_id');
            $table->smallInteger('no_of_hours_spend');
            $table->smallInteger('no_of_total_hours');
            $table->time('time_in');
            $table->time('time_out');
            $table->integer('no_of_hours_in_office');
            $table->integer('no_of_hour_out_of_office');
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
        Schema::dropIfExists('reports');
    }
}
