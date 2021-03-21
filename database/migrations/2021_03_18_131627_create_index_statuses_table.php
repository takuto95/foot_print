<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndexStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('index_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('index_content_id')->unsigned();
            $table->string('status1');
            $table->string('status2');
            $table->string('status3');
            $table->timestamps();
            $table->foreign('index_content_id')->references('id')->on('index_contents');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('index_statuses');
    }
}
