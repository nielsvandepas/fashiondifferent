<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatMessagesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('chat_messages', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('from_id')->unsigned();
			$table->integer('to_id')->unsigned();
			$table->text('body');
			$table->timestamps();

			$table->foreign('from_id')
				->references('id')
				->on('users')
				->onDelete('cascade');

			$table->foreign('to_id')
				->references('id')
				->on('users')
				->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('chat_messages');
	}
}
