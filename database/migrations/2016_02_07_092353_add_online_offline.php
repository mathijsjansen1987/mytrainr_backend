<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOnlineOffline extends Migration
{
	/**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{
		Schema::table('videos', function($table){
			$table->integer('online');
			$table->integer('offline');
		});
	}

	/**
     * Reverse the migrations.
     *
     * @return void
     */
	public function down()
	{
		Schema::table('videos', function($table){
			$table->dropColumn(array('online', 'offline'));
		});
	}
}
