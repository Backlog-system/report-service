<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bases', function (Blueprint $table) {
            $table->increments('base_id');
            $table->integer('report_id')->unsigned();
            $table->string('system_process');
            $table->string('module');
            $table->text('problem_description');
            $table->string('affected_service');
            $table->enum('severity', array('bajo', 'medio', 'alto'));
            $table->enum('client_impact', array('bajo', 'medio', 'alto'));
            $table->string('ambience');
            $table->enum('report_medium', array('correo', 'telefono'));
            $table->string('client_name');
            $table->string('expected_solution_time');

            $table->foreign('report_id')->references('report_id')->on('reports');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bases');
    }
}
