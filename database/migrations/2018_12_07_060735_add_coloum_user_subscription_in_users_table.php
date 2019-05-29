<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColoumUserSubscriptionInUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::table('users', function (Blueprint $table) {
            $table->integer('user_subscription_id')->unsigned()->nullable();
            $table->foreign('user_subscription_id')->references('id')->on('user_subscription');
            $table->date('subscription_expiry_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('user_subscription_id');
            $table->dropColumn('subscription_expiry_date');
        });
        
    }
}
