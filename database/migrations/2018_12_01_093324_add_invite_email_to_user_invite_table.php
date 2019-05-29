<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInviteEmailToUserInviteTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('user_invites', function (Blueprint $table) {
			$table->string('invite_email')->after('invite_user_id')->nullable();
			$table->enum('type', ['email', 'web'])->default('web')->after('invite_email_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('user_invites', function (Blueprint $table) {
			$table->dropColumn('invite_email');
			$table->dropColumn('type');
		});
	}
}
