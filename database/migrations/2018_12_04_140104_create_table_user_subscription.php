<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableUserSubscription extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('user_subscription', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
			$table->integer('subscription_id')->unsigned();
			$table->foreign('subscription_id')->references('id')->on('subscription');
			$table->string('payment_method')->nullable();
			$table->string('transaction_id')->nullable();
			$table->float('payment_amount')->nullable();
			$table->string('payment_ref_no')->nullable();
			$table->text('payment_response')->nullable();
			$table->string('payment_status')->nullable();
			$table->string('payment_date')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('user_subscription');
	}
}
