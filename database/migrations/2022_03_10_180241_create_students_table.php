<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentsTable extends Migration {

	public function up()
	{
		Schema::create('students', function(Blueprint $table) {
			$table->increments('id', true);
			$table->string('name')->unique();
			$table->string('password');
			$table->string('phone')->nullable();
			$table->integer('stage_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('students');
	}
}