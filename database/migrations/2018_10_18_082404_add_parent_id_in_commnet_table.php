<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddParentIdInCommnetTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('post_comments', function (Blueprint $table) {
			$table->integer('parent_id')->unsigned();
			$table->foreign('parent_id')->references('id')->on('post_comments');
		});

		Schema::table('posts', function (Blueprint $table) {
			$table->string('ip_address')->nullable()->after('status');
			$table->enum('private_post', ['0', '1'])->default('0')->after('description');
			$table->text('address')->nullable()->after('private_post');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('post_comments', function (Blueprint $table) {
			$table->dropColumn('parent_id');
		});

		Schema::table('posts', function (Blueprint $table) {
			$table->dropColumn('ip_address');
			$table->dropColumn('private_post');
			$table->dropColumn('address');
		});
	}
}
