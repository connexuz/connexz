<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColoumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('show_comment', ['0', '1'])->default('1');
            $table->enum('add_likes', ['0', '1'])->default('1');
            $table->enum('add_comment', ['0', '1'])->default('1');
            $table->enum('show_profile', ['0', '1'])->default('1');
            $table->enum('show_email', ['0', '1'])->default('1');
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
            $table->dropColumn('show_comment');
            $table->dropColumn('add_likes');
            $table->dropColumn('add_comment');
            $table->dropColumn('show_profile');
            $table->dropColumn('show_email');
        });
    }
}
