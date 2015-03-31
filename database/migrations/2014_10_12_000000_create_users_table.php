<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_group_id')->unsigned()->default(0);
			$table->string('name');
			$table->string('email')->unique();
			$table->string('password', 60);
			$table->enum('status', array('active', 'frozen', 'disabled'))->default('active');
			$table->text('recent_items')->nullable();
			$table->softDeletes();
			$table->rememberToken();
			$table->timestamps();

			// $table->foreign('user_group_id')->references('id')->on('user_groups');
		});


	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
