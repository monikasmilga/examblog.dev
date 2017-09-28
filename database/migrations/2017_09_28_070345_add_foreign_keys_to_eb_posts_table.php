<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEbPostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('eb_posts', function(Blueprint $table)
		{
			$table->foreign('user_id', 'fk_day_posts_day_users')->references('id')->on('eb_users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('eb_posts', function(Blueprint $table)
		{
			$table->dropForeign('fk_day_posts_day_users');
		});
	}

}
