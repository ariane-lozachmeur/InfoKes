<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePivot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_commentaire', function(Blueprint $table) {
            $table->integer('article_id')->unsigned();
            $table->foreign('article_id')
                  ->references('id')
                  ->on('articles')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
            $table->integer('commentaire_id')->unsigned();
            $table->foreign('commentaire_id')
                  ->references('id')
                  ->on('commentaires')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    Schema::drop('article_commentaire');
    }
}
