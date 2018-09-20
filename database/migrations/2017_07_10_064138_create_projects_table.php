<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects',function (Blueprint $table){
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('name')->comment('project name');
            $table->string('owner')->comment('owner of the project');
            $table->text('yml')->comment('project setting file');
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
        Schema::drop('projects');
    }
}
