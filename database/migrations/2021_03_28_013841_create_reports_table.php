<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->increments('report_id');
            $table->integer('backlog_id')->unsigned();
            $table->string('report_code');
            $table->enum('state', array('por asignar', 'en proceso', 'en calidad', 'cerrado'));
            $table->enum('type', array('incidencia', 'soporte'));
            $table->text('observation')->nullable();
            $table->date('report_date');
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
