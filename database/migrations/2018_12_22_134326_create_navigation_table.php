<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNavigationTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('navigation', function (Blueprint $table) {
			$table->increments('navId');
			$table->string('pageCode', 75);
			$table->string('pageName', 75);
			$table->string('pageTitle', 75);
			$table->longText('pageDescription');
			$table->longText('pageKeywords');
			$table->tinyInteger('isEnable');
			$table->string('navLocation', 75);
			$table->longText('pageSettings');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('navigation');
	}
}
