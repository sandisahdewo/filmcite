<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('film_id')->unsigned();
            $table->string('imdb_id');
            $table->string('slug')->unique();
            $table->string('language', 5)->nullable();
            $table->string('poster')->nullable();
            $table->string('title');
            $table->text('description');
            $table->string('status')->nullable();
            $table->float('vote')->default(0);
            $table->float('popularity')->default(0);
            $table->string('video')->nullable();
            $table->enum('type', ['movie', 'series'])->default('movie');
            $table->boolean('is_adult')->default(false);
            $table->date('released_at')->nullable();
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
        Schema::dropIfExists('films');
    }
}
