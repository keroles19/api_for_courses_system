<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStagesTable extends Migration {

	public function up()
	{
		Schema::create('stages', function(Blueprint $table) {
			$table->increments('id', true);
			$table->enum('name', array('primary', 'prep', 'secondary'));
			$table->string('photo')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('stages');
	}
}