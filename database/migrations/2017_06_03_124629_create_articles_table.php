<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	
        Schema::create('articles', function (Blueprint $table) {
	        $table->engine = 'InnoDB';
            $table->increments('id');
	        $table->integer('category_id')->unsigned()->index()->nullable();;
	        $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
	        $table->integer('poster_user_id')->unsigned()->index()->nullable();
	        $table->foreign('poster_user_id')->references('id')->on('users')->onDelete('set null');
            $table->string('title');
            $table->mediumText('teaser');
            $table->text('content');
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
        Schema::dropIfExists('articles');
    }
}
