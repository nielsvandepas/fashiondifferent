<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElementsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('elements', function (Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->text('description');
			$table->integer('user_id')->unsigned()->nullable();
			$table->text('image');
			$table->string('type');
			$table->string('shop')->nullable();
			$table->timestamps();

			$table->foreign('user_id')
				->references('id')
				->on('users');

			$table->foreign('type')
				->references('type')
				->on('element_types');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('elements');
	}

}
