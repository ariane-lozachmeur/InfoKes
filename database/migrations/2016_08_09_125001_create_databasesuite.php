<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatabasesuite extends Migration
{
    public function up()
    {
        Schema::create('newskes', function(Blueprint $table) {
            $table->increments('id');
            $table->string('auteur');
            $table->string('titre');
            $table->text('contenu');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
            $table->timestamps('published_at');
            $table->boolean('relu');

        });
        Schema::create('commentaires', function(Blueprint $table) {
            $table->increments('id');
            $table->string('auteur');
            $table->text('contenu');
            $table->integer('like');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
            $table->timestamps('created_at');
        });
        Schema::create('article_cat', function(Blueprint $table) {
            $table->integer('article_id')->unsigned();
            $table->foreign('article_id')
                  ->references('id')
                  ->on('articles')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
            $table->integer('cat_id')->unsigned();
            $table->foreign('cat_id')
                  ->references('id')
                  ->on('cat')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
        });
    }

    public function down()
    {
        Schema::drop('cat');
        Schema::drop('article_cat');
        Schema::drop('commentaires');
        Schema::drop('newskes');


    }
}
