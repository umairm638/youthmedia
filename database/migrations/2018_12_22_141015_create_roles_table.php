<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('roles', function (Blueprint $table) {
			$table->increments('roleId');
			$table->string('name', 75);
			$table->tinyInteger('dashboard');
			$table->tinyInteger('users');
			$table->tinyInteger('pages');
			$table->tinyInteger('websites');
			$table->tinyInteger('categories');
			$table->tinyInteger('posts');
			$table->tinyInteger('pending');
			$table->tinyInteger('subscription');
			$table->tinyInteger('permissions');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('roles');
	}
}
