<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BootstrapTestDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('events')) {
        Schema::create('events', function($table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
    }
if (!Schema::hasTable('workshops')) {
        Schema::create('workshops', function($table) {
            $table->increments('id');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->integer('event_id')->unsigned();
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->string('name');
            $table->timestamps();
        });
}

    if (!Schema::hasTable('menu_items')) {
        Schema::create('menu_items', function($table) {
            $table->increments('id');
            $table->string('name');
            $table->string('url');
            $table->integer('parent_id')->unsigned()->nullable();
            $table->foreign('parent_id')->references('id')->on('menu_items');
            $table->timestamps();
        });
    }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

          if (Schema::hasTable('workshops')) {
            Schema::dropIfExists('workshops');
          } 
          if (Schema::hasTable('events')) {
            Schema::dropIfExists('events');
         }
           if (Schema::hasTable('menu_items')) {
            Schema::dropIfExists('menu_items');
           }
    }
}
