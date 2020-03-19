<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsModel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Applications', function (Blueprint $table) {
            $table->id('id');
            $table->string('name', 255)->unique();
            $table->string('description', 255);
            $table->string('hostname', 255);
            $table->string('path', 255);
            $table->enum('protocol', ['http', 'https']);

            $table->unique(['hostname', 'path']);
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
        Schema::dropIfExists('Applications');
    }
}
