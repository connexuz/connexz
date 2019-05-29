<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldReplyUserIdInCommentTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('post_comments', function (Blueprint $table) {
			$table->integer('reply_user_id')->nullable()->after('post_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('post_comments', function (Blueprint $table) {
			$table->dropColumn('reply_user_id');
		});
	}
}
