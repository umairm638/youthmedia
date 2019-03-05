<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('posts', function (Blueprint $table) {
			$table->increments('postId');
			$table->string('postTitle', 255);
			$table->text('postDescription');
			$table->string('postThumbnail', 255);
			$table->text('uniqueCustomKey');
			$table->integer('createdOn');
			$table->integer('websiteId')->unsigned();
			$table->integer('categoryId');
			$table->longText('post');
			$table->longText('postTags');
			$table->integer('userId')->unsigned();
			$table->tinyInteger('postStatus');
			$table->tinyInteger('isScrapped');
			$table->integer('postViewed');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('posts');
	}
}
