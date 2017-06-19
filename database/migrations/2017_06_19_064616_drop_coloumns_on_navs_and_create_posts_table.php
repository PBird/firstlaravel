<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropColoumnsOnNavsAndCreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('navs', function (Blueprint $table) {
                
                 $table->dropColumn(['title', 'content', 'imagepath']);


        });

        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nav_id')->nullable();
            $table->string('title');
            $table->text("content");
            $table->text('imagepath')->nullable();
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
        Schema::table('navs', function (Blueprint $table) {
            $table->string('name');
            $table->string('title');
            $table->text("content");
            $table->text('imagepath')->nullable();
            Schema::drop('posts');
        });
    }
}
