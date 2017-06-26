<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFriendshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friendships', function (Blueprint $table) {
	        $table->engine = 'InnoDB';
            $table->increments('id');
	        $table->integer('user_1_id')->unsigned()->index();
	        $table->foreign('user_1_id')->references('id')->on('users')->onDelete('cascade');
	        $table->integer('user_2_id')->unsigned()->index();
	        $table->foreign('user_2_id')->references('id')->on('users')->onDelete('cascade');
	        
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
        Schema::dropIfExists('friendships');
    }
}
