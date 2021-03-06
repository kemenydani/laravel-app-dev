<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
	        $table->engine = 'InnoDB';
            $table->increments('id');
	        $table->integer('from_user_id')->unsigned()->index()->nullable();
	        $table->foreign('from_user_id')->references('id')->on('users')->onDelete('set null');
	        $table->integer('to_user_id')->unsigned()->index()->nullable();
	        $table->foreign('to_user_id')->references('id')->on('users')->onDelete('set null');
	        $table->mediumText('message');
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
        Schema::dropIfExists('messages');
    }
}
