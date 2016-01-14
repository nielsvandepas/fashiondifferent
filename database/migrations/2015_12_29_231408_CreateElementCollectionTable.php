<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElementCollectionTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('element_collections', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->string('name');
			$table->integer('top_id')->unsigned();
			$table->integer('trousers_id')->unsigned();
			$table->integer('shoes_id')->unsigned();
			$table->integer('accessory_id')->unsigned();
			$table->timestamps();

			$table->foreign('user_id')
				->references('id')
				->on('users')
				->onDelete('cascade');
			$table->foreign('top_id')
				->references('id')
				->on('elements');
			$table->foreign('trousers_id')
				->references('id')
				->on('elements');
			$table->foreign('shoes_id')
				->references('id')
				->on('elements');
			$table->foreign('accessory_id')
				->references('id')
				->on('elements');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('element_collections');
	}
}
