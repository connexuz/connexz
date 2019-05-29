<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToUsersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('users', function (Blueprint $table) {
			$table->timestamp('date_of_birth')->nullable();
			$table->tinyInteger('gender')->nullable();
			$table->string('city')->nullable();
			$table->integer('country')->nullable();
			$table->longText('about')->nullable();
			$table->string('university')->nullable();
			$table->timestamp('education_from_date')->nullable();
			$table->timestamp('education_to_date')->nullable();
			$table->longText('education_about')->nullable();
			$table->tinyInteger('graduted')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('users', function (Blueprint $table) {
			$table->dropColumn('date_of_birth');
			$table->dropColumn('gender');
			$table->dropColumn('city');
			$table->dropColumn('country');
			$table->dropColumn('about');
			$table->dropColumn('university');
			$table->dropColumn('education_from_date');
			$table->dropColumn('education_to_date');
			$table->dropColumn('education_about');
			$table->dropColumn('graduted');
		});
	}
}
