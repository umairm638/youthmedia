<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('comments', function (Blueprint $table) {
			$table->increments('commentId', 11)->unsigned();;
			$table->integer('userId')->unsigned();
			$table->integer('postId')->unsigned();
			$table->integer('parent');
			$table->longText('commentText');
			$table->string('website')->nullable();
			$table->date('createdAt');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('comments');
	}
}
