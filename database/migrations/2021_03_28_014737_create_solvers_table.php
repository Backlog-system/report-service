<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solvers', function (Blueprint $table) {
            $table->increments('solver_id');
            $table->integer('report_id')->unsigned();
            $table->integer('user_id')->unsigned();

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
        Schema::dropIfExists('solvers');
    }
}
