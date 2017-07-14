<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hooks',function(Blueprint $table){
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('name')->comment('hook name');
            $table->string('description')->nullable();
            $table->string('parser')->comment('hook param parser');
            $table->string('rules')->comment('hook content rules');
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
        Schema::drop('hooks');
    }
}
