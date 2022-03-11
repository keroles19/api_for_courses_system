<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExamesTable extends Migration {

	public function up()
	{
		Schema::create('exames', function(Blueprint $table) {
			$table->increments('id', true);
			$table->string('code');
			$table->integer('course_id')->unsigned();
			$table->integer('teacher_id')->unsigned();
			$table->string('url');
		});
	}

	public function down()
	{
		Schema::drop('exames');
	}
}