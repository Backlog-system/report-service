<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dates', function (Blueprint $table) {
            $table->increments('date_id');
            $table->integer('report_id')->unsigned();
            $table->date('estimated_begin');
            $table->date('estimated_end');
            $table->date('reconsider_begin')->nullable();
            $table->date('reconsider_end')->nullable();
            $table->date('real_begin')->nullable();
            $table->date('real_end')->nullable();

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
        Schema::dropIfExists('dates');
    }
}
