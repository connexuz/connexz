<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSubscription extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('subscription', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name')->nullable();
			$table->integer('price')->default('50');
			$table->integer('no_of_days')->default('365');
			$table->integer('no_of_free_days')->default('60');
			$table->enum('status', ['0', '1'])->default('1');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('subscription');
	}
}
