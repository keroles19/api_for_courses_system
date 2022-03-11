<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoursesTable extends Migration {

	public function up()
	{
		Schema::create('courses', function(Blueprint $table) {
			$table->increments('id', true);
			$table->string('name');
			$table->string('url');
			$table->string('photo')->nullable();
			$table->integer('teacher_id')->unsigned();
			$table->integer('stage_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('courses');
	}
}