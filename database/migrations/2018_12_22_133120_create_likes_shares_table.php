<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesSharesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('likes_shares', function (Blueprint $table) {
			$table->integer('postId')->unsigned();
			$table->integer('userId')->unsigned();
			$table->tinyInteger('liked');
			$table->tinyInteger('unliked');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('likes_shares');
	}
}
