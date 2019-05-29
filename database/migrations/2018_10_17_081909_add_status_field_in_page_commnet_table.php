<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusFieldInPageCommnetTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('posts', function (Blueprint $table) {
			$table->enum('status', ['0', '1'])->default('1')->after('description');
		});

		Schema::table('post_comments', function (Blueprint $table) {
			$table->enum('status', ['0', '1'])->default('1')->after('description');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('posts', function (Blueprint $table) {
			$table->dropColumn('status');
		});

		Schema::table('post_comments', function (Blueprint $table) {
			$table->dropColumn('status');
		});
	}
}
