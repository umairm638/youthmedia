<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralSettingTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('general_settings', function (Blueprint $table) {
			$table->increments('generalId');
			$table->string('webTitle');
			$table->longText('footerArea');
			$table->string('footerTextColor', 75);
			$table->longText('googleAnalytics');
			$table->longText('googleAnalyticsAdditional');
			$table->longText('fbAnalytics');
			$table->longText('otherSeo');
			$table->longText('otherAnalyticsHead');
			$table->longText('otherAnalyticsBody');
			$table->text('aboutUs');
			$table->string('contactAddress');
			$table->string('contactPhoneOne');
			$table->string('contactPhoneTwo');
			$table->string('contactEmail');

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('general_settings');
	}
}
