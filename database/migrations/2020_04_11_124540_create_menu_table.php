<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MenuEntries', function (Blueprint $table) {
            $table->id();
            $table->integer('application_id')->index();
            $table->integer('ranking')->index();
            $table->string('display_name');
            $table->timestamps();

            $table->foreign('application_id')->references('id')->on('Applications');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('MenuEntries');
    }
}
