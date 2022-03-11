<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTeachersTable extends Migration {

	public function up()
	{
		Schema::create('teachers', function(Blueprint $table) {
			$table->increments('id', true);
			$table->string('name')->unique();
			$table->string('password');
			$table->string('phone')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('teachers');
	}
}