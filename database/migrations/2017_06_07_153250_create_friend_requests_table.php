<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFriendRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friend_requests', function (Blueprint $table) {
	        $table->engine = 'InnoDB';
            $table->increments('id');
	        $table->integer('from_user_id')->unsigned()->index();
	        $table->foreign('from_user_id')->references('id')->on('users')->onDelete('cascade');
	        $table->integer('to_user_id')->unsigned()->index();
	        $table->foreign('to_user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('friend_requests');
    }
}
