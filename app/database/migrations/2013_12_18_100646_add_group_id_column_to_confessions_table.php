<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGroupIdColumnToConfessionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('confessions', function(Blueprint $table)
		{
			$table->integer('group_id')->unsigned()->nullable()->after('user_id');

			$table->foreign('group_id')->references('id')->on('groups')->onDelete('set null')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('confessions', function(Blueprint $table)
		{
			$table->dropForeign('confessions_group_id_foreign');
			$table->dropColumn('group_id');
		});
	}

}
