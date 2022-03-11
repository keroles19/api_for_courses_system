<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCouponsTable extends Migration {

	public function up()
	{
		Schema::create('coupons', function(Blueprint $table) {
			$table->increments('id', true);
			$table->string('code');
			$table->datetime('start_date');
			$table->datetime('end_date');
			$table->integer('cource_id')->unsigned();
			$table->integer('timer')->unsigned();
			$table->timestamps();
			$table->integer('teacher_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('coupons');
	}
}
